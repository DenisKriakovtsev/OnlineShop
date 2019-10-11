<?php if (!empty($session['cart'])): ?>	
	<div class="table-responsive">
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Фото</th>
					<th>Название</th>
					<th>Кол-во</th>
					<th>Цена</th>
					<th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($session['cart'] as $id=>$item):?>
					<tr>
						<td><?= \yii\helpers\Html::img("@web/images/products/{$item['img']}", ['width'=>50])?></td>
						<td><?= $item['name']?></td>
						<td><?= $item['quantity']?></td>
						<td><?= $item['price']?></td>
						<td><span data-id="<?= $id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
					</tr>
				<?php endforeach;?>
				<tr>
					<td colspan="2"><b>Итого:</b></td>
					<td><b><?= $session['cart.quantity']?></b></td> 
					<td><b><?= $session['cart.total_sum']?> грн</b></td>
					<td></td>
				</tr> 
			</tbody>
		</table>
	</div>
<?php else:?>
	<h3>Корзина пуста</h3>
<?php endif;?>