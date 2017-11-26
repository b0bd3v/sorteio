<?php
/* @var $this ApostaController */
/* @var $model Aposta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aposta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sorteio'); ?>
		<?php echo $form->textField($model,'sorteio'); ?>
		<?php echo $form->error($model,'sorteio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apostador'); ?>
		<?php echo $form->textField($model,'apostador'); ?>
		<?php echo $form->error($model,'apostador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_apostado'); ?>
		<?php echo $form->textField($model,'numero_apostado'); ?>
		<?php echo $form->error($model,'numero_apostado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->