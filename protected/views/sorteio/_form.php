<?php
/* @var $this SorteioController */
/* @var $model Sorteio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sorteio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'finalizado'); ?>
		<?php echo $form->textField($model,'finalizado'); ?>
		<?php echo $form->error($model,'finalizado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vencedor'); ?>
		<?php echo $form->textField($model,'vencedor'); ?>
		<?php echo $form->error($model,'vencedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numeros'); ?>
		<?php echo $form->textField($model,'numeros'); ?>
		<?php echo $form->error($model,'numeros'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->