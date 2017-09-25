<?php

namespace app\controllers;

class MoccaChinoController extends \yii\web\Controller
{
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionContact()
    {
        return $this->render('contact');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionAdminPanel()
	{
		return $this->render('admin_panel');
	}

}
