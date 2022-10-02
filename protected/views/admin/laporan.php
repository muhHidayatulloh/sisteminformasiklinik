<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	
	'Laporan',
);


// var_dump($dataPasien);

$bulan = [];
$currentMonth = date('m'); 
$currentYear = date('Y'); 
$namaBulan = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ];
for ($i=1; $i <= $currentMonth; $i++) { 
	$namaB[] = $namaBulan[$i-1];
	$jumlahPasienPerBulan[] = count(Yii::app()->db->createCommand("SELECT * FROM pasien where MONTH(created_at) = '$i' AND YEAR(created_at) = '$currentYear'")->queryAll());
}

// var_dump($namaB);

?>
<h1><?php echo $this->action->id; ?></h1>



<div>
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = <?php echo json_encode($namaB) ?>;

  const data = {
    labels: labels,
    datasets: [{
      label: 'Jumlah Data Pasien Per Bulan di Tahun Ini',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($jumlahPasienPerBulan) ?>,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>





