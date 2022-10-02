<?php
/* @var $this UserAccessMenuController */
/* @var $model UserAccessMenu */

$this->breadcrumbs=array(
	'User Access Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserAccessMenu', 'url'=>array('index')),
	array('label'=>'Create UserAccessMenu', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-access-menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Access Menus</h1>

<p>
DI bawah ini adalah daftar menu yang dapat diakses berdasarkan rolenya
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-access-menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_access',
		array(
			'name' => 'id_menu',
			'value' => '$data->menu->nama_menu',
			'filter' => $this->dataRole()
		),
		array(
			'name' => 'id_role',
			'value' => '$data->role->role',
			'filter' => $this->dataRole()
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
