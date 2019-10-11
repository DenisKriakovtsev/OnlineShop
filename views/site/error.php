<?php

use yii\helpers\Html;

$this->title = "Ошибка";
?>
<div class="site-error container">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div> 
    <?= Html::img("@web/images/404/404.png", ['alt'=>'Ошибка'])?>
</div>
