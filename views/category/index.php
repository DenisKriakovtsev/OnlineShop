<?php 
use yii\helpers\Html;
?>

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>your</span> online shop</h1>
                                <h2>Футболка Fannai</h2>
                                <p>FANNAI бренд 2018 Для мужчин Спорт Бег Рубашка Для мужчин короткий рукав  </p>
                                <button type="button" class="btn btn-default get">Купить</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="/images/home/pricing.png"  class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                               <h1><span>your</span> online shop</h1>
                               <h2>Adidas Essentials 3</h2>
                               <p>Мужская толстовка изготовлена ​​из хлопка. Предназначена до или после тренировки </p>
                               <button type="button" class="btn btn-default get">Купить</button>
                           </div>
                           <div class="col-sm-6">
                            <img src="/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                            <img src="/images/home/pricing.png"  class="pricing" alt="" />
                        </div>
                    </div>

                    <div class="item">
                        <div class="col-sm-6">
                         <h1><span>your</span> online shop</h1>
                         <h2>Солнцезащитные Очки OMEGA</h2>
                         <p>Уникальный подход и стиль компании нашли свое отражение в дизайне моделей и выборе материалов.  </p>
                         <button type="button" class="btn btn-default get">Купить</button>
                     </div>
                     <div class="col-sm-6">
                        <img src="/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                        <img src="/images/home/pricing.png" class="pricing" alt="" />
                    </div>
                </div>

            </div>

            <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>

    </div>
</div>
</div>
</section><!--/slider-->

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

               <h2 class="title text-center">Все товары</h2>
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
        <?php endif;?>   

        <?php if (!empty($hits)):?>
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Популярные товары</h2>
                <?php  $i=0; foreach($hits as $hit):?>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center"> 
                                <a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$hit->id])?>">
                                    <?= Html::img("@web/images/products/{$hit->img}", ['alt'=>$hit->name])?>
                                </a>
                                <h2><?= $hit->price?> грн</h2>
                                <p><a href="<?= yii\helpers\Url::to(['product/view', 'id'=>$hit->id])?>"><?= $hit->name?> </a></p>
                                <a href="<?= \yii\helpers\Url::to(['cart/add', 'id'=>$hit->id])?>" data-id="<?= $hit->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <?php if($hit->new):?>
                                <?= Html::img("@web/images/home/new.png", ['alt'=>'Новинка', 'class'=>'new'])?>
                            <?php endif;?>    
                            <?php if($hit->sale):?>
                                <?= Html::img("@web/images/home/sale.png", ['alt'=>'Скидка', 'class'=>'new'])?>
                            <?php endif;?> 
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                            </ul>
                        </div>
                    </div>
                </div>          
                <?php $i++?>
                <?php if ($i%3==0):?>
                    <div class="clearfix"></div>
                <?php endif;?>
            <?php endforeach;?>
        </div><!--features_items-->
    <?php endif;?>

</div>
</div>
</div><!--features_items-->  
</section> 