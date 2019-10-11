<?php

namespace app\models; 
use yii\db\ActiveRecord;


class Cart extends ActiveRecord
{ 
	public function addToCart($product, $quantity = 1){ 
		if (isset($_SESSION['cart'][$product->id])) {
			$_SESSION['cart'][$product->id]['quantity'] += $quantity;
		}
		else{
			$_SESSION['cart'][$product->id] = [
				'quantity' => $quantity,
				'name' => $product->name,
				'price' => $product->price,
				'img' => $product->img
			];
		}
		$_SESSION['cart.quantity'] = isset($_SESSION['cart.quantity']) ? $_SESSION['cart.quantity'] + $quantity : $quantity;
		$_SESSION['cart.total_sum'] = isset($_SESSION['cart.total_sum']) ? $_SESSION['cart.total_sum'] + $quantity * $product->price : $quantity * $product->price;
	}
	public function recalc($id){
		if (!isset($_SESSION['cart'][$id])) {
			return false;
		}
		$qtyMin = $_SESSION['cart'][$id]['quantity'];
		$sumMin = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'] ;
		$_SESSION['cart.quantity'] -=$qtyMin;
		$_SESSION['cart.total_sum'] -=$sumMin;
		unset($_SESSION['cart'][$id]);
	}
}