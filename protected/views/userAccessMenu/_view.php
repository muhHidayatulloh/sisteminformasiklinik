<?php
/* @var $this UserAccessMenuController */
/* @var $data UserAccessMenu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_access')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_access), array('view', 'id'=>$data->id_access)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_menu')); ?>:</b>
	<?php echo CHtml::encode($data->menu->nama_menu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('role')); ?>:</b>
	<?php echo CHtml::encode($data->role->role); ?>
	<br />


</div>