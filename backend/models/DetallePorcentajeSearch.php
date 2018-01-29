<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\DetallePorcentaje;

/**
 * DetallePorcentajeSearch represents the model behind the search form about `backend\models\DetallePorcentaje`.
 */
class DetallePorcentajeSearch extends DetallePorcentaje
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detalle_porcentaje', 'montopor', 'id_cotizacion', 'id_porcentaje'], 'integer'],
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
        $query = DetallePorcentaje::find();

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
            'id_detalle_porcentaje' => $this->id_detalle_porcentaje,
            'montopor' => $this->montopor,
            'id_cotizacion' => $this->id_cotizacion,
            'id_porcentaje' => $this->id_porcentaje,
        ]);

        return $dataProvider;
    }
}
