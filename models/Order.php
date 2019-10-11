<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;
use Yii;


class Order extends ActiveRecord
{ 
    public static function tableName()
    {
        return 'order';
    }
    public function behaviors(){
      return [
        [
            'class' => TimestampBehavior::className(),
            'attributes' => [ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],                
        ],
                // если вместо метки времени UNIX используется datetime:
        'value' => new Expression('NOW()'),],];
    }

    public function getOrderItems(){
        return $this->hasMany(OrderItems::className(), ['order_id' =>'id']);
    }
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'address'], 'required'],
            [['created_at'], 'safe'],
            [['quantity'], 'integer'],
            [['total_sum'], 'number'],
            [['status'], 'boolean'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    } 

    public function attributeLabels()
    {
        return [ 
            'name' => 'Фамилия Имя Отчество',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'address' => 'Адрес',
        ];
    }
}
