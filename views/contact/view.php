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
	<?php $form = ActiveForm::begin()?>
	<?= $form->field($contact,'name')?> 
	<?= $form->field($order,'email')?>
	<?= $form->field($contact,'body')?>
	<?= Html::submitButton('Отправить', ['class' => 'btn btn-success'])?>
	<?php ActiveForm::end()?>
</div>
