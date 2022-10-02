<?php
/* @var $this MenuController */
/* @var $data Menu */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_menu')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_menu), array('view', 'id'=>$data->id_menu)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_menu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_menu); ?>
	<br />


</div>