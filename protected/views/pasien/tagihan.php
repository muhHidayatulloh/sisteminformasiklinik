<?php 

$this->breadcrumbs=array(
	'Pasiens'=>array('index'),
	'Tagihan',
);

$data_obat = Yii::app()->db->createCommand("SELECT * FROM list_obat JOIN obat ON list_obat.id_obat = obat.id_obat where id_pasien = $model->id_pasien")->queryAll();

$tindakan = Yii::app()->db->createCommand("SELECT biaya, tindakan FROM pasien JOIN tindakan ON pasien.id_tindakan = tindakan.id_tindakan where id_pasien = $model->id_pasien")->queryRow();

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
    Total Obat : <?php echo $totaltagihan['total']; ?>
</div>

<div class="view">
    <h5>Rincian Tindakan</h5>
    Tindakan : <?php echo $tindakan['tindakan'] ?>
    <br>
    Biaya : <?php echo $tindakan['biaya']; ?>
</div>

<div class="view">
    <h1>Total Bayar : <?php echo $totaltagihan['total'] + $tindakan['biaya']; ?></h1> 
</div>



