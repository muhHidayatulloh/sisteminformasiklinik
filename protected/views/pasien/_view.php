<?php
/* @var $this PasienController */
/* @var $data Pasien */


$data_obat = Yii::app()->db->createCommand("SELECT * FROM list_obat JOIN obat ON list_obat.id_obat = obat.id_obat where id_pasien = $data->id_pasien")->queryAll();

// var_dump($data_obat);
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Klik untuk melakukan penanganan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode('Tindakan'), array('penanganan', 'id'=>$data->id_pasien)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pasien')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pasien); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Tindakan')); ?>:</b>
	<?php echo CHtml::encode($data->tindakan->tindakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('List Obat')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode('BeriObat'), array('listobat/create', 'id'=>$data->id_pasien)); ?>
	<div class="view">
		<ul>
			<?php foreach($data_obat as $key) : ?>
				<li><?= $key['nama_obat']; ?></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Lihat Tagihan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode('lihat'), array('tagihan', 'id'=>$data->id_pasien)); ?>
	<br />


	<b><?php echo CHtml::encode($data->getAttributeLabel('wilayah')); ?>:</b>
	<?php echo CHtml::encode($data->wilayah->nama_wilayah); ?>
	<br />


</div>
