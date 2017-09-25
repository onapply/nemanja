<?php

namespace app\controllers;


use yii\web\Controller;
use app\models\Onapply;
use Yii;


class OnapplyController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
		$model = new Onapply;
		
		if(  $model->load(Yii::$app->request->post()) && $model->validate()  )
		{
			//login
			Yii::$app->session->setFlash('success', "You have entered the data correctly");
		}
		
		//return login form
		return $this->render('index', ['model' => $model]);
		
    }

     
}
