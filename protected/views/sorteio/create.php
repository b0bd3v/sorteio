<?php
/* @var $this SorteioController */
/* @var $model Sorteio */

$this->breadcrumbs=array(
	'Sorteios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sorteio', 'url'=>array('index')),
	array('label'=>'Manage Sorteio', 'url'=>array('admin')),
);
?>

<h1>Create Sorteio</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>