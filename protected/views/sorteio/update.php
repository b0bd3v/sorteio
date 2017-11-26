<?php
/* @var $this SorteioController */
/* @var $model Sorteio */

$this->breadcrumbs=array(
	'Sorteios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sorteio', 'url'=>array('index')),
	array('label'=>'Create Sorteio', 'url'=>array('create')),
	array('label'=>'View Sorteio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sorteio', 'url'=>array('admin')),
);
?>

<h1>Update Sorteio <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>