<?php
/* @var $this UserAccessMenuController */
/* @var $model UserAccessMenu */

$this->breadcrumbs=array(
	'User Access Menus'=>array('index'),
	$model->id_access=>array('view','id'=>$model->id_access),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserAccessMenu', 'url'=>array('index')),
	array('label'=>'Create UserAccessMenu', 'url'=>array('create')),
	array('label'=>'View UserAccessMenu', 'url'=>array('view', 'id'=>$model->id_access)),
	array('label'=>'Manage UserAccessMenu', 'url'=>array('admin')),
);
?>

<h1>Update UserAccessMenu <?php echo $model->id_access; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>