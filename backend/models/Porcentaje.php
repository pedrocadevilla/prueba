<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "porcentaje".
 *
 * @property integer $id_porcentaje
 * @property integer $tipo
 * @property string $descripcion
 * @property integer $porcentaje
 *
 * @property DetallePorcentaje[] $detallePorcentajes
 */
class Porcentaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'porcentaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'descripcion', 'porcentaje'], 'required'],
            [['tipo', 'porcentaje'], 'integer'],
            [['descripcion'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_porcentaje' => 'Nº de Referencia',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
            'porcentaje' => 'Porcentaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallePorcentajes()
    {
        return $this->hasMany(DetallePorcentaje::className(), ['id_porcentaje' => 'id_porcentaje']);
    }
}
