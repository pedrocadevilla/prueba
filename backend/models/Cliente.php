<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id_cliente
 * @property string $nombre
 * @property string $apellido
 * @property string $ruc
 *
 * @property Cotizacion[] $cotizacions
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_cliente', 'nombre', 'apellido', 'ruc'], 'required'],
            [['id_cliente'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 45],
            [['ruc'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cliente' => 'Cedula',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'ruc' => 'RUC',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['id_cliente' => 'id_cliente']);
    }
}
