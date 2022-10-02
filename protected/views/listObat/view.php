<?php
/* @var $this ListObatController */
/* @var $model ListObat */

$this->breadcrumbs=array(
	'List Obats'=>array('index'),
	$model->id_list_obat,
);

$this->menu=array(
	array('label'=>'List ListObat', 'url'=>array('index')),
	array('label'=>'Create ListObat', 'url'=>array('create')),
	array('label'=>'Update ListObat', 'url'=>array('update', 'id'=>$model->id_list_obat)),
	array('label'=>'Delete ListObat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_list_obat),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ListObat', 'url'=>array('admin')),
);
?>

<h1>View ListObat #<?php echo $model->id_list_obat; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_list_obat',
		'id_pasien',
		'id_obat',
	),
)); ?>
