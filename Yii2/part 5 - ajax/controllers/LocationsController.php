<?php

namespace app\controllers;

use Yii;
use app\models\Locations;
use app\models\LocationsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * LocationsController implements the CRUD actions for Locations model.
 */
class LocationsController extends Controller
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
     * Lists all Locations models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LocationsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Locations model.
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
     * Creates a new Locations model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Locations();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Locations model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->location_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	
	public function actionGetCityProvince($zipId)
	{
		//find the zip code from the locations table
		
		//1. DB connection
		$connection = Yii::$app->db;
		
		//2. Query
		$query = "SELECT * FROM locations WHERE zip_code = :zip_code";
		
		//3. Execute query
		$sql = $connection->createCommand($query);
		$sql->bindValue(':zip_code', $zipId); 
		$results = $sql->queryAll(); 
		
				
		//4. Test result
		if(  $results  )
		{
			echo Json::encode($results);
		}
	}
	
	/*
	
	public function actionGetCityProvince($zipId)
	{
        $model = new Locations();
		
		$results = $model->actionGetCityProvinceModel($zipId);
		
		if(  $results  )
		{
			echo Json::encode($results);
		}
	}
	*/

    /**
     * Deletes an existing Locations model.
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
     * Finds the Locations model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Locations the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Locations::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
