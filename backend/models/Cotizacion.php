<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cotizacion".
 *
 * @property integer $id_cotizacion
 * @property string $ruc
 * @property integer $id_cliente
 * @property integer $id_vendedor
 *
 * @property Cliente $idCliente
 * @property Vendedor $idVendedor
 * @property DetallePorcentaje[] $detallePorcentajes
 * @property DetalleProducto[] $detalleProductos
 * @property Paquete[] $paquetes
 */
class Cotizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cotizacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ruc', 'id_cliente', 'id_vendedor'], 'required'],
            [['id_cliente', 'id_vendedor'], 'integer'],
            [['ruc'], 'string', 'max' => 45],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_vendedor'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedor::className(), 'targetAttribute' => ['id_vendedor' => 'id_vendedor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_cotizacion' => 'Nº Referencia',
            'ruc' => 'RUC',
            'id_cliente' => 'Cedula Cliente',
            'id_vendedor' => 'ID Vendedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdVendedor()
    {
        return $this->hasOne(Vendedor::className(), ['id_vendedor' => 'id_vendedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetallePorcentajes()
    {
        return $this->hasMany(DetallePorcentaje::className(), ['id_cotizacion' => 'id_cotizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleProductos()
    {
        return $this->hasMany(DetalleProducto::className(), ['id_cotizacion' => 'id_cotizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaquetes()
    {
        return $this->hasMany(Paquete::className(), ['id_cotizacion' => 'id_cotizacion']);
    }
}
