<?php

namespace app\models;
use yii\db\ActiveRecord;
use Yii;

class Contact extends ActiveRecord
{
 
    public $verifyCode;
    public static function tableName()
    {
    	return 'contact';
    }

    
    public function rules()
    {
    	return [
    		[['name', 'email', 'body'], 'required'],
    		[['body'], 'string'],
    		[['name', 'email'], 'string', 'max' => 255],
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    		'id' => 'ID',  
            'name' => 'Фамилия Имя Отчество',
            'email' => 'Email',
            'body' => 'Сообщение',
            'verifyCode' => 'Код подтверждения',
        ];
    }
}