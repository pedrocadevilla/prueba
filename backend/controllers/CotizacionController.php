<?php

namespace backend\controllers;

use Yii;
use backend\models\Cotizacion;
use backend\models\DetalleProducto;
use backend\models\Producto;
use backend\models\DetallePorcentaje;
use backend\models\Porcentaje;
use yii\helpers\ArrayHelper;
use backend\models\Model;
use backend\models\CotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * CotizacionController implements the CRUD actions for Cotizacion model.
 */
class CotizacionController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cotizacion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cotizacion();
        $detalle = [new DetalleProducto];
        $porcentaje = [new DetallePorcentaje];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $detalle = Model::createMultiple(DetalleProducto::classname());
            Model::loadMultiple($detalle, Yii::$app->request->post());
            $porcentaje = Model::createMultiple(DetallePorcentaje::classname());
            Model::loadMultiple($porcentaje, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($detalle) && $valid;
            $valid = Model::validateMultiple($porcentaje) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($detalle as $detpro) {
                            $detpro->id_cotizacion = $model->id_cotizacion;
                            if (! ($flag = $detpro->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($porcentaje as $detpor) {
                            $detpor->id_cotizacion = $model->id_cotizacion;
                            if (! ($flag = $detpor->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_cotizacion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'detalle' => (empty($detalle)) ? [new Producto] : $detalle,
                'porcentaje' => (empty($porcentaje)) ? [new Porcentaje] : $porcentaje,
            ]);
        }
    }

    /**
     * Updates an existing Cotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {   

        $model = $this->findModel($id);
        $detalle = $model->detalleProductos;
        $porcentaje = $model->detallePorcentajes;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $oldIDs = ArrayHelper::map($detalle, 'id_cotizacion', 'id_cotizacion');
            $detalle = Model::createMultiple(DetalleProducto::classname(), $detalle);
            Model::loadMultiple($detalle, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($detalle, 'id_cotizacion', 'id_cotizacion')));
            $oldIDs = ArrayHelper::map($porcentaje, 'id_cotizacion', 'id_cotizacion');
            $porcentaje = Model::createMultiple(DetallePorcentaje::classname(), $porcentaje);
            Model::loadMultiple($porcentaje, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($porcentaje, 'id_cotizacion', 'id_cotizacion')));

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($detalle) && $valid;
            $valid = Model::validateMultiple($porcentaje) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            DetalleProducto::deleteAll(['id_cotizacion' => $deletedIDs]);
                            
                        }
                        foreach ($detalle as $det) {
                            $det->id_cotizacion = $model->id_cotizacion;
                            if (! ($flag = $det->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        foreach ($porcentaje as $por) {
                            $por->id_cotizacion = $model->id_cotizacion;
                            if (! ($flag = $por->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id_cotizacion]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'detalle' => (empty($detalle)) ? [new Producto] : $detalle,
                'porcentaje' => (empty($porcentaje)) ? [new Porcentaje] : $porcentaje,
            ]);
        }
    }

    /**
     * Deletes an existing Cotizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cotizacion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
