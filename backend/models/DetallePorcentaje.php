<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_porcentaje".
 *
 * @property integer $id_detalle_porcentaje
 * @property integer $montopor
 * @property integer $id_cotizacion
 * @property integer $id_porcentaje
 *
 * @property Porcentaje $idPorcentaje
 * @property Cotizacion $idCotizacion
 */
class DetallePorcentaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_porcentaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['montopor', 'id_porcentaje'], 'required'],
            [['montopor', 'id_cotizacion', 'id_porcentaje'], 'integer'],
            [['id_porcentaje'], 'exist', 'skipOnError' => true, 'targetClass' => Porcentaje::className(), 'targetAttribute' => ['id_porcentaje' => 'id_porcentaje']],
            [['id_cotizacion'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['id_cotizacion' => 'id_cotizacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detalle_porcentaje' => 'Nº Referencia',
            'montopor' => 'Porcentaje',
            'id_cotizacion' => 'Referencia Cotizacion',
            'id_porcentaje' => 'Referencia Porcentaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPorcentaje()
    {
        return $this->hasOne(Porcentaje::className(), ['id_porcentaje' => 'id_porcentaje']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCotizacion()
    {
        return $this->hasOne(Cotizacion::className(), ['id_cotizacion' => 'id_cotizacion']);
    }
}
