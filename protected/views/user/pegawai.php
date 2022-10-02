<?php  

$data_pegawai = Yii::app()->db->createCommand("SELECT * FROM user where id_role != 1")->queryAll();

$this->breadcrumbs=array(
	'Data Pegawai',
);
?>



<h1>Data Pegewai</h1>
<div class="view">
    <ul>    
        <?php foreach($data_pegawai as $key) : ?>
            <li><?= $key['nama']; ?> <?php echo CHtml::link(CHtml::encode('edit'), array('user/update', 'id'=>$key['id_user'])); ?></li>
        <?php endforeach; ?>
    </ul>
</div>