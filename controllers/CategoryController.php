<?php

namespace app\controllers;
use app\models\Category;
use app\models\Product;
use Yii;
use yii\data\Pagination;
class CategoryController extends AppController
{
	public function actionIndex(){
		$hits = Product::find()->where(['hit'=>'1'])->limit(6)->all();
		$this->setMeta("Спортивная одежда"); 

		$query = Product::find();
		$pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>6, 'forcePageParam' => true, 'pageSizeParam'=>false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all(); 

		return $this->render('index', compact('hits','products','pages'));
	}
	public function actionView($id){
		//$id = Yii::$app->request->get('id'); //работает так же как и аргумент в функции
		$category = Category::findOne($id);

		if (empty($category)) {
			throw new \yii\web\HttpException(404,"Заданной категории не существует"); 
		}
		//$products = Product::find()->where(['category_id' => $id])->all();
		$query = Product::find()->where(['category_id' => $id]);
		$pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>5, 'forcePageParam' => false, 'pageSizeParam'=>false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all(); 

		$this->setMeta("Спортивная одежда | ".$category->name, $category->keywords, $category->description);
		return $this->render('view', compact('products','pages','category'));
	}

	public function actionSearch(){
		$search_prod = trim(Yii::$app->request->get('search_prod'));  
		$this->setMeta("Спортивная одежда | Поиск: ".$search_prod);
		if (!$search_prod) {
			return $this->render('search');
		}
		$query = Product::find()->where(['like','name', $search_prod]);
		$pages = new Pagination(['totalCount'=>$query->count(), 'pageSize'=>5, 'forcePageParam' => false, 'pageSizeParam'=>false]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();	
		return $this->render('search', compact('products', 'pages','search_prod'));
	}
}