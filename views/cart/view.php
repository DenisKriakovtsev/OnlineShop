<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>
<div class="container">

	<?php if(Yii::$app->session->hasFlash('success')):?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo Yii::$app->session->getFlash('success');?>
		</div>
	<?php endif;?>

	<?php if(Yii::$app->session->hasFlash('error')):?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<?php echo Yii::$app->session->getFlash('error');?>
		</div>
	<?php endif;?>

	<h2 class="title text-center" style="font-size: 30px;">Корзина</h2>
	<?php if (!empty($session['cart'])): ?>	
		<div class="table-responsive">
			<table class="table table-hover table-striped"  style="font-size: 16px">
				<thead>
					<tr>
						<th>Фото</th>
						<th>Название</th>
						<th>Кол-во</th>
						<th>Цена</th>
						<th>Сумма</th> 
					</tr>
				</thead>
				<tbody>
					<?php foreach($session['cart'] as $id=>$item):?>
						<tr>
							<td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['width'=>50])?></td>
							<td><a href="<?= Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></td>
							<td><?= $item['quantity']?></td>
							<td><?= $item['price']?></td>
							<td><?= $item['price']*$item['quantity']?></td> 
						</tr>
					<?php endforeach;?>
					<tr>
						<td colspan="2"><b>Итого:</b></td>
						<td><b><?= $session['cart.quantity']?></b></td> 
						<td></td>
						<td><b><?= $session['cart.total_sum']?> грн</b></td>  
					</tr> 
				</tbody>
			</table>
		</div>
		<h2 class="title text-center" style="font-size: 20px"> Заполните анкету: </h2> 
		<div class="total_area" style="width: 500px; margin:0 auto 50px">
			
			<?php $form = ActiveForm::begin()?>
			<?= $form->field($order,'name')?>
			<?= $form->field($order,'address')?>
			<?= $form->field($order,'phone')?>
			<?= $form->field($order,'email')?>
			<?= Html::submitButton('Заказать', ['class' => 'btn btn-success'])?>
			<?php ActiveForm::end()?>

		</div>
	<?php else:?>
		<div class="CartNull">
			<h3>Корзина пуста</h3>
		</div>
	<?php endif;?>

</div>