<?php
/* @var $this UserAccessMenuController */
/* @var $model UserAccessMenu */

$this->breadcrumbs=array(
	'User Access Menus'=>array('index'),
	$model->id_access,
);

$this->menu=array(
	array('label'=>'List UserAccessMenu', 'url'=>array('index')),
	array('label'=>'Create UserAccessMenu', 'url'=>array('create')),
	array('label'=>'Update UserAccessMenu', 'url'=>array('update', 'id'=>$model->id_access)),
	array('label'=>'Delete UserAccessMenu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_access),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserAccessMenu', 'url'=>array('admin')),
);
?>

<h1>View UserAccessMenu #<?php echo $model->id_access; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_access',
		'id_menu',
		'id_role',
	),
)); ?>

