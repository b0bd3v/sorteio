<?php
/* @var $this ApostaController */
/* @var $data Aposta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sorteio')); ?>:</b>
	<?php echo CHtml::encode($data->sorteio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apostador')); ?>:</b>
	<?php echo CHtml::encode($data->apostador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_apostado')); ?>:</b>
	<?php echo CHtml::encode($data->numero_apostado); ?>
	<br />


</div>