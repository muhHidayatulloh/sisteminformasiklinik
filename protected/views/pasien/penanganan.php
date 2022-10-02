<?php
/* @var $this PasienController */
/* @var $model Pasien */
/* @var $form CActiveForm */
$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Penanganan',
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pasien-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
        <?php echo $form->textField($model,'id_pasien', array('hidden'=>true)); ?>
        <div class="form-floating mb-3">
            <input type="email" readonly class="form-control-plaintext" id="floatingPlaintextInput" placeholder="name@example.com" value="<?= $model->attributes['nama_pasien']; ?>">
            <label for="floatingPlaintextInput">Nama Pasien</label>
        </div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Tindakan'); ?>
		<?php echo $form->dropDownList($model,'id_tindakan', $dataTindakan , array('empty' => 'Pilih')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
