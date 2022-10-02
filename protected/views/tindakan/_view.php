<?php
/* @var $this TindakanController */
/* @var $data Tindakan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tindakan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tindakan), array('view', 'id'=>$data->id_tindakan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->biaya); ?>
	<br />


</div>