<?php /* @var $this Controller */ 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<!-- bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
	<nav class="navbar navbar-expand-lg bg-primary">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Siklin</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				
				<ul class="navbar-nav mb-2 mb-lg-0">
					<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?php echo Yii::app()->request->baseUrl; ?>/site/index">Home</a>
					</li>
					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Data Master
							</a>
						<ul class="dropdown-menu bg-secondary">
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/user">Data User</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/user/pegawai">Data Pegawai</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/obat">Data Obat</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/tindakan">Data Tindakan</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/wilayah">Data Wilayah</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Transaksi
							</a>
						<ul class="dropdown-menu bg-secondary">
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/pasien/create">Pendaftaran Pasien</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/pasien/index">Penanganan Pasien</a></li>
						</ul>
					</li>

					<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Admin Management
							</a>
						<ul class="dropdown-menu bg-secondary">
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/menu">Menu</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/role">Role</a></li>
							<li><a class="dropdown-item" href="<?php echo Yii::app()->request->baseUrl; ?>/useraccessmenu">User Access</a></li>
						</ul>
					</li>

					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="<?php echo Yii::app()->request->baseUrl; ?>/admin/laporan">Laporan</a>
					</li>
					<?php $this->widget('zii.widgets.CMenu',array(
						'items'=>array(
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); 
				?>
				</ul>
			</div>
		</div>
	</nav>

	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; 2022 - <?php echo date('Y'); ?> by <?php echo Yii::app()->params['company']; ?>.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

<!-- javascript bootstrao 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
