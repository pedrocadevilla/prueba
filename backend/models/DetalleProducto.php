<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detalle_producto".
 *
 * @property integer $id_detalle_producto
 * @property integer $cantidad
 * @property integer $id_producto
 * @property integer $id_cotizacion
 * @property integer $total
 *
 * @property Cotizacion $idCotizacion
 * @property Producto $idProducto
 */
class DetalleProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detalle_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad', 'id_producto', 'total'], 'required'],
            [['cantidad', 'id_producto', 'id_cotizacion', 'total'], 'integer'],
            [['id_cotizacion'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizacion::className(), 'targetAttribute' => ['id_cotizacion' => 'id_cotizacion']],
            [['id_producto'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['id_producto' => 'id_producto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detalle_producto' => 'Nº Referencia',
            'cantidad' => 'Cantidad',
            'id_producto' => 'Referencia Producto',
            'id_cotizacion' => 'Referencia Cotizacion',
            'total' => 'Costo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCotizacion()
    {
        return $this->hasOne(Cotizacion::className(), ['id_cotizacion' => 'id_cotizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProducto()
    {
        return $this->hasOne(Producto::className(), ['id_producto' => 'id_producto']);
    }
}
