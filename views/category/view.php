<?php 
use yii\helpers\Html;
?> 
<section id="advertisement">
	<div class="container">
		<img src="/images/shop/advertisement.jpg" alt="" />
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Категории</h2>
					<ul class="catalog category-products">
						<?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
					</ul> 

					<div class="price-range"><!--price-range-->
						<h2>Цена</h2>
						<div class="well">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="15000" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
							<b>100 грн</b> <b class="pull-right">15000 грн</b>
						</div>
					</div><!--/price-range-->

					<div class="shipping text-center"><!--shipping-->
						<img src="/images/home/shipping.jpg" alt="" />
					</div><!--/shipping-->

				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center"><?= $category->name?></h2>

					<?php if (!empty($products)):?>				 
						<?php $i=0; foreach($products as $product):?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center"> 
										<a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$product->id])?>">
											<?= Html::img("@web/images/products/{$product->img}", ['alt'=>$product->name])?>
										</a>

										<h2><?= $product->price?> грн</h2>
										<p><a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$product->id])?>"><?= $product->name?></a></p>
										<a href="<?= yii\helpers\Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div> 
									<?php if($product->new):?>
										<?= Html::img("@web/images/home/new.png", ['alt'=>'Новинка', 'class'=>'new'])?>
									<?php endif;?>    
									<?php if($product->sale):?>
										<?= Html::img("@web/images/home/sale.png", ['alt'=>'Скидка', 'class'=>'new'])?>
									<?php endif;?>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>    
						<?php $i++?>
						<?php if ($i%3==0):?>
							<div class="clearfix"></div>
						<?php endif;?> 
					<?php endforeach;?>
					<div class="clearfix"></div>
					<?php
					echo 
					\yii\widgets\LinkPager::widget([
						'pagination'=>$pages,
					]);
					?>
				<?php else:?>
					<h2>Товаров нет</h2>
				<?php endif;?>  

			</div><!--features_items-->
		</div>
	</div>
</div>
</section>