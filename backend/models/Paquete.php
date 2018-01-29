<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "paquete".
 *
 * @property integer $id_paquete
 * @property integer $id_cotizacion
 *
 * @property Cotizacion $idCotizacion
 */
class Paquete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paquete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cotizacion'], 'required'],
            [['id_cotizacion'], 'integer'],
            [['id_cotizacion'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['id_cotizacion' => 'id_cotizacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_paquete' => 'Nº de Referencia',
            'id_cotizacion' => 'Referencia de Cotizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCotizacion()
    {
        return $this->hasOne(Cotizacion::className(), ['id_cotizacion' => 'id_cotizacion']);
    }
}
