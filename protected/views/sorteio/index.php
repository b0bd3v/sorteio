<?php
/* @var $this SorteioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sorteios',
);

$this->menu=array(
	array('label'=>'Create Sorteio', 'url'=>array('create')),
	array('label'=>'Manage Sorteio', 'url'=>array('admin')),
);
?>

<h1>Sorteios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
