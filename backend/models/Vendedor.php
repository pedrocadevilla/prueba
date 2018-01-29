<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "vendedor".
 *
 * @property integer $id_vendedor
 * @property string $nombre
 * @property string $apellido
 * @property integer $cedula
 *
 * @property Cotizacion[] $cotizacions
 */
class Vendedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'cedula'], 'required'],
            [['cedula'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_vendedor' => 'ID Vendedor',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'cedula' => 'Cedula',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacions()
    {
        return $this->hasMany(Cotizacion::className(), ['id_vendedor' => 'id_vendedor']);
    }
}
