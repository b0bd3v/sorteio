<?php
/* @var $this SorteioController */
/* @var $model Sorteio */
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
		<?php echo $form->label($model,'finalizado'); ?>
		<?php echo $form->textField($model,'finalizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vencedor'); ?>
		<?php echo $form->textField($model,'vencedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numeros'); ?>
		<?php echo $form->textField($model,'numeros'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->