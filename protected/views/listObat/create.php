<?php
/* @var $this ListObatController */
/* @var $model ListObat */

$this->breadcrumbs=array(
	'Pasien'=>array('/pasien/index'),
	'Beri Obat'
);

?>

<h1>Beri Obat</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'dataObat'=> $dataObat, 'dataPasien'=>$dataPasien)); ?>