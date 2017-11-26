<?php
/* @var $this SorteioController */
/* @var $data Sorteio */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('finalizado')); ?>:</b>
	<?php echo CHtml::encode($data->finalizado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vencedor')); ?>:</b>
	<?php echo CHtml::encode($data->vencedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numeros')); ?>:</b>
	<?php echo CHtml::encode($data->numeros); ?>
	<br />


</div>