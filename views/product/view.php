<?php 
use yii\helpers\Html;
?> 
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
							<b>0 грн</b> <b class="pull-right">15000 грн</b>
						</div>
					</div><!--/price-range--> 

				</div>
			</div> 
			<div class="col-sm-9 padding-right">
				<div class="product-details"><!--product-details-->
					<div class="col-sm-5">
						<div class="view-product">

							<?= Html::img("@web/images/products/{$product->img}", ['alt'=>$product->name])?>

							<h3>ZOOM</h3>
						</div> 
					</div>
					<div class="col-sm-7">
						<div class="product-information"><!--/product-information--> 
							<?php if($product->new):?>
								<?= Html::img("@web/images/home/new2.png", ['alt'=>'Новинка', 'class'=>'newarrival'])?>
							<?php endif;?>    
							<?php if($product->sale):?>
								<?= Html::img("@web/images/home/sale2.png", ['alt'=>'Скидка', 'class'=>'newarrival'])?>
							<?php endif;?>
							<h2><?= $product->name?></h2>
							<p>Web ID: 1089772</p>
							<img src="/images/product-details/rating.png" alt="" />
							<span>
								<span><?= $product->price?> грн</span>
								<label>Кол-во:</label>
								<input type="text" value="1" id="quantity"/>  
								<a href="<?= \yii\helpers\Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?= $product->id?>" class="btn btn-default add-to-cart cart"> 
									<i class="fa fa-shopping-cart"></i> 
									Add to cart 
								</a>
							</span>
							<p><b>Наличие:</b> Есть в наличии</p>
							<p><b>Состояние:</b>
								<?php if($product->new):?>
									Новинка
								<?php endif;?>    
								<?php if($product->sale):?>
									Распродажа
								<?php endif;?> 
							</p>
							<p><b>Бренд:</b><a href="<?= yii\helpers\Url::to(['category/view', 'id'=>$product->category->id])?>"> <?= $product->category->name?></a></p>

							<p><b>Описание: </b><?= $product->content?></p>
							<a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
						</div><!--/product-information-->
					</div>
				</div> 

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Рекомендуемые товары</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner"> 
							<?php $count = count($hits); $i=0; foreach($hits as $hit):?>
							<?php if($i%3==0):?>
								<div class="item <?php if($i == 0) echo 'active'?>">	
								<?php endif;?>
								<div class="col-sm-4">
									<div class="product-image-wrapper">
										<div class="single-products">
											<div class="productinfo text-center recomendProd"> 
												<a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$hit->id])?>">
													<?= Html::img("@web/images/products/{$hit->img}", ['alt'=>$hit->name, 'class'=>'prodinfImg'])?>
												</a>
												<h2><?= $hit->price?> грн</h2>
												<p> 
													<a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$hit->id])?>">
														<?= $hit->name?> 
													</a>
												</p>
												<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</div>
									</div>
								</div> 
								<?php $i++; if($i%3==0 || $i == $count):?>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				</div>
				<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>			
			</div>
		</div><!--/recommended_items-->

	</div>
</div>
</div>
</section>