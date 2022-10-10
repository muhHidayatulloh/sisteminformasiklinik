<?php

class ListObatController extends Controller
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
		// var_dump(Yii::app()->user->isPetugas());die;
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view'),
				'users' =>array('@')
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'admin', 'delete'),
				'expression'=> "Yii::app()->user->isPetugas()",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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

	public function dataPasien()
	{
		$all = Pasien::model()->findAll();
		$data = CHtml::listData($all , 'id_pasien' , 'nama_pasien');
		return $data;
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model=new ListObat;
		// var_dump($this->loadModelObat($id));
		// var_dump();
		$dataPasien = $this->loadModelPasien($id);

		if(isset($_POST['ListObat']))
		{
			// var_dump($_POST);die;
			$id_pasien = $_POST['Pasien']['id_pasien'];
			$dataObat = $_POST['ListObat']['id_obat'];

			// var_dump(count($dataObat));

			for($i = 0; $i < count($dataObat); $i++) {
				$model = Yii::app()->db->createCommand("INSERT INTO list_obat VALUES(null, $id_pasien, $dataObat[$i])")->execute();
			}

			if($model > 0) {
				$this->redirect(Yii::app()->request->baseUrl.'/pasien/index');
			}
		}

		// $obat = Yii::app()->db->createCommand("SELECT * FROM obat")->queryAll();

		$obat = Obat::model()->findAll();

		// var_dump(CHtml::listData($obat, 'id_obat', 'nama_obat'));
		$this->render('create',array(
			'model'=>$model,
			'dataObat' => CHtml::listData($obat, 'id_obat', 'nama_obat'),
			'dataPasien' => $dataPasien,
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

		if(isset($_POST['ListObat']))
		{
			$model->attributes=$_POST['ListObat'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_list_obat));
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('ListObat');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ListObat('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ListObat']))
			$model->attributes=$_GET['ListObat'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ListObat the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ListObat::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadModelObat($id)
	{
		$model=ListObat::model()->findAllByAttributes(['id_pasien'=>$id]);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
		
	}
	public function loadModelPasien($id)
	{
		$model=Pasien::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ListObat $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='list-obat-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
