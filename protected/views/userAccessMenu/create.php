<?php
/* @var $this UserAccessMenuController */
/* @var $model UserAccessMenu */

$this->breadcrumbs=array(
	'User Access Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserAccessMenu', 'url'=>array('index')),
	array('label'=>'Manage UserAccessMenu', 'url'=>array('admin')),
);
?>

<h1>Create UserAccessMenu</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'dataRole'=>$dataRole, 'dataMenu'=>$dataMenu)); ?>