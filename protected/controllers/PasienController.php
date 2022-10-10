<?php

class PasienController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'users' =>array('@')
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'delete', 'tagihan', 'penanganan'),
				'expression'=> "Yii::app()->user->isPetugas()",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionTagihan($id)
	{
		$total = Yii::app()->db->createCommand("SELECT SUM(harga) as total FROM list_obat JOIN obat ON list_obat.id_obat = obat.id_obat where id_pasien = '$id'")->queryRow();

		$biaya = Yii::app()->db->createCommand("SELECT SUM(biaya) as total_biaya FROM list_tindakan JOIN tindakan ON list_tindakan.id_tindakan = tindakan.id_tindakan where id_pasien = '$id'")->queryRow();

		// var_dump($model);die;
		$this->render('tagihan', [
			'totalObat' => $total,
			'totalTindakan'=>$biaya,
			'model' => $this->loadModel($id)
		]);
	}

	public function actionPenanganan($id)
	{
		
		if(isset($_POST['Pasien']))
		{
			// var_dump($_POST);die;
			$id_tindakan = $_POST['ListTindakan']['id_tindakan'];
			$id_pasien = $_POST['Pasien']['id_pasien'];
			// die;
			for($i = 0; $i < count($id_tindakan); $i++) {
				$model = Yii::app()->db->createCommand("INSERT INTO list_tindakan VALUES(null, $id_pasien, $id_tindakan[$i])")->execute();
			}

			if($model > 0) {
				$this->redirect(Yii::app()->request->baseUrl.'/pasien/index');
			}
			// $model = Yii::app()->db->createCommand("UPDATE pasien set id_tindakan = $id_tindakan where id_pasien = $id_pasien")->execute();
			// // $model->attributes=$_POST['Pasien'];
			// // var_dump($model->save());
			// // var_dump($model);die;
			
		}

		$tindakan = Tindakan::model()->findAll();
		$this->render('penanganan', [
			'model' => $this->loadModel($id),
			'modelListTindakan'=> new ListTindakan,
			'dataTindakan' => CHtml::listData($tindakan , 'id_tindakan' , 'tindakan')
		]);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	public function dataObat()
	{
		$all = Obat::model()->findAll();
		$data = CHtml::listData($all , 'id_obat' , 'nama_obat');
		return $data;
	}

	public function dataTindakan()
	{
		$all = Tindakan::model()->findAll();
		$data = CHtml::listData($all , 'id_tindakan' , 'tindakan');
		return $data;
	}

	public function dataWilayah()
	{
		$all = Wilayah::model()->findAll();
		$data = CHtml::listData($all , 'id_wilayah' , 'nama_wilayah');
		return $data;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pasien;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pasien']))
		{
			$model->attributes=$_POST['Pasien'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pasien));
		}

		$this->render('create',array(
			'model'=>$model,
			'dataWilayah'=>$this->dataWilayah()
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// var_dump($_POST);
		if(isset($_POST['Pasien']))
		{
			$model->attributes=$_POST['Pasien'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_pasien));
		}

		$this->render('update',array(
			'model'=>$model,
			'dataWilayah' => $this->dataWilayah()
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pasien');
		// var_dump($dataProvider->data);die;
		$this->render('index',array(
			'dataProvider'=>$dataProvider
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pasien('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pasien']))
			$model->attributes=$_GET['Pasien'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pasien the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pasien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pasien $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pasien-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
