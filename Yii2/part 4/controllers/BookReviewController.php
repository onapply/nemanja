<?php

namespace app\controllers;

use Yii;
use app\models\BookReviews;
use app\models\BookReviewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * BookReviewController implements the CRUD actions for BookReviews model.
 */
class BookReviewController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BookReviews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookReviewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BookReviews model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BookReviews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	 
	public function actionNeca()
	{
        $model = new BookReviews();
		
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
	}
    public function actionCreate()
    {
        $model = new BookReviews();
		/*
		if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($model);
		}
		*/
        
		if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BookReviews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

	public function actionUpdateImage($id)
    {
        $model = $this->findModel($id);
		$model->scenario = 'update-image';

        if ($model->load(Yii::$app->request->post()) ) {
			//form is submitted
			//1. get the instace of the image -> a object
			$image = UploadedFile::getInstance($model, 'image'); //echo '<pre>';print_r($image);echo '</pre>';exit();
			
			//2. get the image namespace
			$image_name = $image->baseName.'.'.$image->extension;
			//echo $image_name;exit();
			
			//3. pass the image name into the model
			$model->image = $image_name; 
			
			//4. go through the validation rules and IF cool SAVE
			if(  $model->save()  )
			{
				//all is cool, so upload the image
				$image->saveAs('uploads/'.$model->image);
				
				//redirect to the view (details)				
				return $this->redirect(['view', 'id' => $model->id]);				
			}
			
        } else {
            return $this->render('update-image', [
                'model' => $model,
            ]);
        }
    }
	
    /**
     * Deletes an existing BookReviews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BookReviews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BookReviews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BookReviews::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
