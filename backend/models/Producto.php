<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property integer $id_producto
 * @property integer $tipo
 * @property integer $precio
 * @property string $nombre
 *
 * @property DetalleProducto[] $detalleProductos
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo', 'precio', 'nombre'], 'required'],
            [['tipo', 'precio'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Nº de Referencia',
            'tipo' => 'Tipo',
            'precio' => 'Precio',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductos()
    {
        return $this->hasMany(DetalleProducto::className(), ['id_producto' => 'id_producto']);
    }
}
