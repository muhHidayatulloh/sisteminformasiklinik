<?php
/* @var $this ListObatController */
/* @var $data ListObat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_list_obat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_list_obat), array('view', 'id'=>$data->id_list_obat)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->id_pasien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_obat')); ?>:</b>
	<?php echo CHtml::encode($data->id_obat); ?>
	<br />


</div>