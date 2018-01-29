<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetalleProducto;

/**
 * DetalleProductoSearch represents the model behind the search form about `backend\models\DetalleProducto`.
 */
class DetalleProductoSearch extends DetalleProducto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalle_producto', 'cantidad', 'id_producto', 'id_cotizacion', 'total'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = DetalleProducto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_detalle_producto' => $this->id_detalle_producto,
            'cantidad' => $this->cantidad,
            'id_producto' => $this->id_producto,
            'id_cotizacion' => $this->id_cotizacion,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
