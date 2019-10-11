<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class OrderItems extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_items';
    }
    public function getOrder(){
        return $this->hasOne(Order::className(), ['id' =>'order_id']);
    }  
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'name', 'price', 'quantity_item', 'total_sum_item'], 'required'],
            [['order_id', 'product_id', 'quantity_item'], 'integer'],
            [['price', 'total_sum_item'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    } 
}
