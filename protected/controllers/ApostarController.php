<?php

class ApostarController extends Controller
{
	public $ultimoSorteio;
	public $sorteioFinalizado;

	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('sucess'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index',	'admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{

		$ultimoSorteio = Sorteio::model()->findAll(array('order' => 'id DESC','limit' => 1));
		
		$this->ultimoSorteio = $ultimoSorteio[0];	
	    
	    $model=new Aposta('register');

	    if(isset($_POST['Aposta']))
	    {
	    	
	    	$usuario = Usuario::model()->findByAttributes(array(
	    		'login' => Yii::app()->user->name
	    		));

	    	$aposta['apostador'] = $usuario->id;
	    	$aposta['sorteio'] = $_POST['Aposta']['sorteio'];
	    	if(isset($_POST['Aposta']['numero_apostado'])){
		    	$aposta['numero_apostado'] = implode(',', array_keys($_POST['Aposta']['numero_apostado']));     		
	    	}
	    	$model->attributes = $aposta;
	        if($model->validate())
	        {
	        	if($model->save()){
	        		$sorteio = Sorteio::model()->findByPk($this->ultimoSorteio->id);
	        		if($sorteio->getQuantidadeApostas() == 5){
	        			$sorteio->realizarSorteio();	
	        		}
	        		
	    			$this->render('success',array('model'=>$model));    		
	        	}
	            return;
	        }
	    }
	    $this->render('apostar',array('model'=>$model));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}