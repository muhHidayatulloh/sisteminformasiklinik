<?php
/* @var $this UserAccessMenuController */
/* @var $model UserAccessMenu */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_access'); ?>
		<?php echo $form->textField($model,'id_access'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_menu'); ?>
		<?php echo $form->textField($model,'id_menu'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_role'); ?>
		<?php echo $form->textField($model,'id_role'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->