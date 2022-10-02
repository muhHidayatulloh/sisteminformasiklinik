<?php
/* @var $this ListObatController */
/* @var $model ListObat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'list-obat-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Pasien'); ?>
		<?php echo $form->textField($dataPasien,'id_pasien', array('hidden'=>true)); ?>
		<?php echo $form->textField($dataPasien,'nama_pasien', array('disabled'=>true)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Obat'); ?>
		<?php echo $form->dropDownList($model,'id_obat', $dataObat , array('empty' => 'Pilih')); ?>
		<?php echo $form->error($model,'id_obat'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->