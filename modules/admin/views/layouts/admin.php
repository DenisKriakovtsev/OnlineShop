<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="<?= Yii::$app->charset ?>"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?= Html::csrfMetaTags() ?>
	<title>Админка | <?= Yii::$app->user->identity['username'] ?></title>
	<?php $this->head() ?> 
	
	<link rel="shortcut icon" href="images/ico/favicon.ico"> 
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
</head><!--/head-->

<body>
	<?php $this->beginBody() ?>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fas fa-battery-full" style="padding-right: 10px"></i>Работаем круглосуточно 24/7</a></li> 
								<li><a href="#"><img src="/images/product-details/licenseProduct.png" style="padding-right: 10px"/>  Только подлинные товары</a></li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav"> 
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
								<li><a href="#"><i class="fab fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="<?= yii\helpers\Url::home()?>"><img src="/images/home/logo.jpg" alt="" /></a>
						</div> 
					</div>

					<div class="col-sm-8"> 
						<div class="search_box pull-right"> 
							<form action="<?= \yii\helpers\Url::to(['category/search'])?>" method="get">  
								<input type="text" placeholder="Поиск" name="search_prod" /> 
								<i class="fas fa-search"></i> 
							</form> 
						</div>
					</div>  
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"> 
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">  
								<li><a href="<?= yii\helpers\Url::home()?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Главная</a></li>
								<?php if(!Yii::$app->user->isGuest):?>

									<li class="dropdown"><a href="#" class="accountNotLink"><i class="fa fa-user"></i>&nbsp;<?= Yii::$app->user->identity['username']?>&nbsp;<i class="fa fa-angle-down"></i></a>
										<ul role="menu" class="sub-menu">
											<li><a href="<?= \yii\helpers\Url::to(['/site/logout'])?>">Выход</a></li>  							
										</ul>
									</li> 
									<li><a href="#" onclick="return getCart();"><i class="fa fa-shopping-cart"></i>&nbsp;Корзина</a></li> 
									<li><a href="<?= yii\helpers\Url::to(['/site/contact'])?>"><i class="fa fa-crosshairs"></i>&nbsp;Контакты</a></li>   
								<?php endif;?> 
								
								<?php if(Yii::$app->user->isGuest):?>
									<li><a href="#" onclick="return getCart();"><i class="fa fa-shopping-cart"></i>&nbsp;Корзина</a></li>
									<li><a href="<?=  yii\helpers\Url::to(['/admin'])?>"><i class="fa fa-lock"></i>&nbsp;Войти</a></li>
									<li><a href="<?= yii\helpers\Url::to(['/site/contact'])?>"><i class="fa fa-crosshairs"></i>&nbsp;Контакты</a></li>
								<?php endif;?>  
							</ul>
						</div>   
					</div> 
				</div>
			</div>
		</div> 
	</header><!--/header-->

	<?= $content ?> 

	<div class="fbg">
		<div class="fbg_resize"> 
			<div class="col c2">
				<h2><span>Почему </span> наш интернет магазин одежды?</h2> 
				<ul class="fbg_ul">
					<li><a href="#" class="accountNotLink">Мы компетентны в том, что продаем!</a></li>
					<li><a href="#" class="accountNotLink">Мы ценим каждого покупателя!</a></li>
					<li><a href="#" class="accountNotLink"charset="">Мы отправляем посылку в день заказа!</a></li>
					<li><a href="#" class="accountNotLink">92% наших клиентов довольны нашей работой и готовы вернуться к нам снова!</a></li>
					<li><a href="#" class="accountNotLink">Мы работаем 7 дней в неделю!</a></li>
					<li><a href="#" class="accountNotLink">Мы постоянно работаем над улучшением сайта!</a></li>
				</ul>
			</div>
			<div class="col c3">
				<h2><span>Наши</span> Контакты</h2> 	
				<p class="contact_info"> <span>Адрес:</span> Украина, г.Харьков, ул.Сумская 77-А<br />
					<span>Телефон:</span> +380-50-21-43-070<br />
					<span>FAX:</span> +458-4578<br /> 
					<span>E-mail:</span> <a href="#">YourShop@gmail.com</a></p>
				</div>
				<div class="clr"></div>
			</div>
		</div> 
		<div class="footer">
			<div class="footer_resize">
				<p class="lf">&copy; Copyright by Kryakovtsev 2018. All Rights Reserved</p> 
				<div style="clear:both;"></div>
			</div>
		</div>
		<?php
		\yii\bootstrap\Modal::begin([
			'header' => '<h2>Корзина</h2>',
			'id' => 'cart',
			'size' => 'modal-lg',
			'footer' => '  <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
			<a href="'. \yii\helpers\Url::to(['cart/view']).'" class="btn btn-success">Оформить заказ</a>
			<button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
		]);


		\yii\bootstrap\Modal::end();
		?>

		<?php $this->endBody() ?>
	</body>
	</html>
	<?php $this->endPage() ?>