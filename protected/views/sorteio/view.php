<?php
/* @var $this SorteioController */
/* @var $model Sorteio */

$this->breadcrumbs=array(
	'Sorteios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sorteio', 'url'=>array('index')),
	array('label'=>'Create Sorteio', 'url'=>array('create')),
	array('label'=>'Update Sorteio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sorteio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sorteio', 'url'=>array('admin')),
);
?>

<h1>View Sorteio #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'finalizado',
		'vencedor',
		'numeros',
	),
)); ?>
