<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cotizacion;
use backend\models\Producto;

/**
 * CotizacionSearch represents the model behind the search form about `backend\models\Cotizacion`.
 */
class CotizacionSearch extends Cotizacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion', 'id_cliente', 'id_vendedor'], 'integer'],
            [['ruc'], 'safe'],
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
        $query = Cotizacion::find();

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
            'id_cotizacion' => $this->id_cotizacion,
            'id_cliente' => $this->id_cliente,
            'id_vendedor' => $this->id_vendedor,
        ]);

        $query->andFilterWhere(['like', 'ruc', $this->ruc]);


        return $dataProvider;
    }
}
