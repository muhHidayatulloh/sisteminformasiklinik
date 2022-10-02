<?php
/* @var $this ListObatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'List Obats',
);

$this->menu=array(
	array('label'=>'Create ListObat', 'url'=>array('create')),
	array('label'=>'Manage ListObat', 'url'=>array('admin')),
);
?>

<h1>List Obats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
