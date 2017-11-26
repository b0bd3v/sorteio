<?php
/* @var $this ApostaController */
/* @var $model Aposta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sorteio'); ?>
		<?php echo $form->textField($model,'sorteio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apostador'); ?>
		<?php echo $form->textField($model,'apostador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_apostado'); ?>
		<?php echo $form->textField($model,'numero_apostado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->