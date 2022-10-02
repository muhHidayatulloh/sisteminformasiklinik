<?php
/* @var $this UserAccessMenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Access Menus',
);

$this->menu=array(
	array('label'=>'Create UserAccessMenu', 'url'=>array('create')),
	array('label'=>'Manage UserAccessMenu', 'url'=>array('admin')),
);
?>

<h1>User Access Menus</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
