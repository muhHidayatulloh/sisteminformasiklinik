<?php 

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Tagihan',
);

$data_obat = Yii::app()->db->createCommand("SELECT * FROM list_obat JOIN obat ON list_obat.id_obat = obat.id_obat where id_pasien = $model->id_pasien")->queryAll();

$data_tindakan = Yii::app()->db->createCommand("SELECT * FROM list_tindakan JOIN tindakan ON list_tindakan.id_tindakan = tindakan.id_tindakan where id_pasien = $model->id_pasien")->queryAll();


// var_dump($biaya_tindakan);
?>



<div class="view">
    <h5>Nama Pasien</h5>
    
    <h3 class="text-muted"><?php echo $model->nama_pasien; ?></h3>
</div>
<div class="view">
    <h5>Rincian Obat</h5>
    <ul>
        <?php foreach($data_obat as $key) : ?>
            <li><?= $key['nama_obat']; ?> = <?= $key['harga']; ?></li>
        <?php endforeach; ?>
    </ul>
    Total Obat : <?php echo $totalObat['total']; ?>
</div>

<div class="view">
    <h5>Rincian Obat</h5>
    <ul>
        <?php foreach($data_tindakan as $key) : ?>
            <li><?= $key['tindakan']; ?> = <?= $key['biaya']; ?></li>
        <?php endforeach; ?>
    </ul>
    Biaya : <?php echo $totalTindakan['total_biaya']; ?>
</div>

<div class="view">
    <h1>Total Bayar : <?php echo $totalObat['total'] + $totalTindakan['total_biaya']; ?></h1> 
</div>



