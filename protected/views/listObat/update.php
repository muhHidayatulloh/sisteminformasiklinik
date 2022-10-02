<?php
/* @var $this ListObatController */
/* @var $model ListObat */

$this->breadcrumbs=array(
	'List Obats'=>array('index'),
	$model->id_list_obat=>array('view','id'=>$model->id_list_obat),
	'Update',
);

$this->menu=array(
	array('label'=>'List ListObat', 'url'=>array('index')),
	array('label'=>'Create ListObat', 'url'=>array('create')),
	array('label'=>'View ListObat', 'url'=>array('view', 'id'=>$model->id_list_obat)),
	array('label'=>'Manage ListObat', 'url'=>array('admin')),
);
?>

<h1>Update ListObat <?php echo $model->id_list_obat; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>