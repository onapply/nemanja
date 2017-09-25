<?php

namespace app\controllers;


use Yii;
use yii\web\Controller;
use app\models\EntryForm;


class EntryFormController extends \yii\web\Controller
{
    
    public function actionIndex()
    {
		$data['message'] = 'Nije extra';
		return $this->render('../documentation/index', $data);
    }
	
	
	public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // valid data received in $model
			
            // do something meaningful here about $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // either the page is initially displayed or there is some validation error
            return $this->render('entry', ['model' => $model]);
        }
    }
	

     
}
