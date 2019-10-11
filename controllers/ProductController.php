<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii; 
class ProductController extends AppController
{
	public function actionView($id){
		//$id = Yii::$app->request->get('id'); //работает так же как и аргумент в функции
		$product = Product::findOne($id);
		if (empty($product)) {
			throw new \yii\web\HttpException(404,"Заданного продукта не существует"); 
		}
		//$product = Product::find()->with('category')->where(['id'=>$id])->limit(1)->one();// одно и тоже что и выше, жадная загрузка
		$hits = Product::find()->where(['hit'=>'1'])->limit(9)->all();
		$this->setMeta("Спортивная одежда | ".$product->name, $product->keywords, $product->description);
		return $this->render('view', compact('product', 'hits')); 
	}
}