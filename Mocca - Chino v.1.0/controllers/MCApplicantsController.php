<?php

namespace app\controllers;

use Yii;
use app\models\MCJobs;
use app\models\MCJobsDM;
use app\models\MCApplicants;
use app\models\MCApplicantsDM; 
use app\models\MCApplicantsSearch;
use app\models\MCQuestions;
use app\models\MCQuestionOptions;
use app\models\MCAnswers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\base\DynamicModel;
use yii\base\Model;

/**
 * MCApplicantsController implements the CRUD actions for MCApplicants model.
 */
class MCApplicantsController extends Controller
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
     * Lists all MCApplicants models.
     * @return mixed
     */
    public function actionIndex($id = 0)
    {
		$model = new MCApplicants();
		
		if(  !$id  )
		{
			$results = $model->find()->All();
		}
		else
		{
			$results = $model->find()->where(['job_id' => $id])->All();
		}
		$model->_applicants = $results;
		$model->_job_id = $id;
		
        return $this->render('index', [
            'model' => $model,
        ]);
    }
	public function actionStatusSearch()
    {
		$model_applicant	= new MCApplicants();
		$model_DM			= new MCApplicantsDM();
		
        return $this->render('status_search', [
			'model_applicant'	=> $model_applicant,
			'model_DM' 			=> $model_DM,
        ]);
    }
	public function actionJobApplicants($id)
    {
        $model = new MCApplicants();
        $data['results'] = $model->find()->where(['job_id' => $id])->All();

        return $this->render('job-applicants', $data);
    }

	public function actionGetApplicantsByStatus($status)
    {
        $model = new MCApplicants();
        $data['results'] = $model->find()->where(['status' => $status])->All();

        return $this->render('status-applicants', $data);
    }
	
	public function actionGetApplicantsByStatusAndJob($id, $status)
    {
        $model = new MCApplicants();
        $data['results'] = $model->find()->where(['job_id' => $id, 'status' => $status])->All();

        return $this->render('status-applicants', $data);
    }
    /**
     * Displays a single MCApplicants model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model_job 				= new MCJobsDM();
		$model_applicant		= new MCApplicants();
        $model_DM 				= new MCApplicantsDM();
		$model_question 		= new MCQuestions();
		$model_question_options = new MCQuestionOptions();
		$model_answer 			= new MCAnswers(); 
		
		$results = $model_applicant->find()->where(['applicant_id' => $id])->one();
		$job_id = $results['job_id'];
		
		$model_job->_id = $job_id;
		$model_applicant->_id = $id;
		$model_applicant->_first_name = $results['first_name'];
		$model_applicant->_last_name = $results['last_name'];
		$model_applicant->_full_name = $results['first_name']. ' '. $results['last_name'];
		$model_applicant->_status = $results['status'];
		$model_applicant->_email = $results['email'];
		$model_applicant->_motivation = $results['motivation'];
		
		$questions 	= array();
		$options 	= array();
		
		$results = $model_question->find()->where(['job_id' => $job_id])->All();			
		//I am creating two array just like in MCJobController
		foreach(  $results as $key => $value  )
		{
			$questions[$value['question_id']] = $value['question_text'];
			if( $value['question_type'] == 1)
			{
				$results2 = $model_question_options->find()->where(['question_id' => $value['question_id']])->All();
				
				foreach(  $results2 as $key2 => $value2  )
				{
					$options[$value2['question_id']][] = array( $value2['etxt'], $value2['option_id']); 
				}
			}
		}
		
		$model_job->questions = $questions;
		$model_job->options = $options;
		
		return $this->render('view', [
			'model_applicant'	=> $model_applicant,
			'model_job' 		=> $model_job,
			'model_DM' 	=> $model_DM, 
		]); 
    }

	public function actionChangeStatus($applicant_id, $status) 
	{
		$model = new MCApplicants;
		$applicant = $model->findOne($applicant_id);  
		$applicant->status 	= $status;
		$applicant->update();

		return 'OK';
	}
	
	
	public function actionXhrSearchJobStatus($job_id, $status) 
	{
		$model = new MCApplicants;	
				
		//$applicants = $model->find()->where(['job_id' => $job_id])->All();
		$applicants = $model->search_job_status($job_id, $status);
		return json_encode($applicants);
	}
	
	public function actionXhrSearchStatus($status) 
	{
		$model = new MCApplicants;	
		//$applicants = $model->find()->where(['status' => $status])->All();		
		$applicants = $model->search_status($status);
		return json_encode($applicants);
	}
    /**
     * Creates a new MCApplicants model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
		$model_job 				= new MCJobsDM();
        $model_DM 				= new MCApplicantsDM();
		$model_question 		= new MCQuestions();
		$model_question_options = new MCQuestionOptions();
		
		$model_DM->defineAttribute('first_name');
		$model_DM->defineAttribute('last_name');
		$model_DM->defineAttribute('email');
		$model_DM->defineAttribute('motivation');
		$model_DM->addRule(['first_name', 'last_name', 'email', 'motivation'], 'string');
		
        if (  $model_DM->load(Yii::$app->request->post()) ) {
			foreach($_POST['MCApplicantsDM'] as $key => $value)
			{	
				if($key != 'first_name' && $key != 'last_name' && $key != 'email' && $key != 'motivation' )
				{
					$model_DM->defineAttribute($key);
					if(  is_array($value)  )
					{
						//$model_DM->addRule($key, 'each', 'rule' => ['integer']);
					}
					else
					{						
						$model_DM->addRule([$key], 'string');
					}
				}
			}
			$model_DM->setAttributes($_POST['MCApplicantsDM']);	
			
			if($model_DM->validate())
			{
				$model_applicant	= new MCApplicants();
				$model_applicant->job_id 		= $id;
				$model_applicant->first_name 	= $_POST['MCApplicantsDM']['first_name'];
				$model_applicant->last_name 	= $_POST['MCApplicantsDM']['last_name'];
				$model_applicant->email 		= $_POST['MCApplicantsDM']['email'];
				$model_applicant->motivation 	= $_POST['MCApplicantsDM']['motivation'];
				$model_applicant->save();
				
				$model_DM->_id = $model_applicant->applicant_id;
		
				foreach($_POST['MCApplicantsDM'] as $key => $value)
				{					
					$answer_text = $value;
					$key_array = explode("_", $key);	
					if(  $key_array[0] == 'question'  )
					{
						/*
						This is very important. This part of the code stores question answer. If a question is a free text question,
						answer will be a text entered by an applicant. However, if it is a checkbox question, the answer will be text,
						formated like this: `|status_id|status_id|status_id|status_id|`
						*/
						if(is_array($value))
						{
							$answer_text = implode("|",$value);
							$answer_text = '|'.$answer_text.'|';
						}
						$model_answer 			= new MCAnswers();
						$model_answer->applicant_id = $model_DM->_id;
						$model_answer->question_id 	= $key_array[1];
						$model_answer->answer_text 	= $answer_text;
						$model_answer->save();
					}
				}		
				return $this->redirect(['view', 'id' => $model_DM->_id]);				
			}

				return $this->render('create', [
					'model' => $model_DM,
				]);

        } else {
			$results = $model_question->find()->where(['job_id' => $id])->All();
			
			$questions 	= array();
			$options 	= array();
					
			foreach(  $results as $key => $value  )
			{
				$questions[$value['question_id']] = $value['question_text'];
				if( $value['question_type'] == 1)
				{
					$results2 = $model_question_options->find()->where(['question_id' => $value['question_id']])->All(); 
					
					foreach(  $results2 as $key2 => $value2  )
					{
						$options[$value2['question_id']][] = array( $value2['etxt'], $value2['option_id']);
					}
				}
			}		
			$model_job->questions = $questions;
			$model_job->options = $options;
			                
			return $this->render('create', [
				'model' => $model_DM,
				'model_job' => $model_job,
			]); 
        }
    }

    /**
     * Updates an existing MCApplicants model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$model_job 				= new MCJobsDM();
        $model_DM 				= new MCApplicantsDM();
		$model_question 		= new MCQuestions();
		$model_question_options = new MCQuestionOptions();
		$model_applicant 		= new MCApplicants();
		$model_answers 			= new MCAnswers();
		
		$model_DM->_id = $id;
		$model_applicant->_id = $id;
		
		$model_DM->defineAttribute('first_name');
		$model_DM->defineAttribute('last_name');
		$model_DM->defineAttribute('email');
		$model_DM->defineAttribute('motivation');
		$model_DM->addRule(['first_name', 'last_name', 'email', 'motivation'], 'string');
		
		
        if (  $model_DM->load(Yii::$app->request->post()) ) {
			
			foreach($_POST['MCApplicantsDM'] as $key => $value)
			{	
				if($key != 'first_name' && $key != 'last_name' && $key != 'email' && $key != 'motivation' )
				{
					$model_DM->defineAttribute($key);
					if(  is_array($value)  )
					{
						//$model->addRule($key, 'each', 'rule' => ['integer']);
					}
					else
					{						
						$model_DM->addRule([$key], 'string');
					}
				}
			}
			$model_DM->setAttributes($_POST['MCApplicantsDM']);				
					
			if($model_DM->validate())
			{
				$applicant = $model_applicant->findOne($id);
				$applicant->first_name 	= $_POST['MCApplicantsDM']['first_name'];
				$applicant->last_name 	= $_POST['MCApplicantsDM']['last_name'];
				$applicant->email 		= $_POST['MCApplicantsDM']['email'];
				$applicant->motivation 	= $_POST['MCApplicantsDM']['motivation'];
				$applicant->update();
				
				foreach($_POST['MCApplicantsDM'] as $key => $value)
				{	
					$answer_text = $value;
					/*
					I check whether this is the answer for free text or checkbox question. 
					Since checkbox question answer is formatted like this: `|status_id|status_id|status_id|status_id|`,
					I explode this string by `|` and check whether that I get an array or not.
					Note: I am aware that, this is not the best way. The problem might occur if an applicant type `..|..`.
					We can mitigate this, by replacing `|` with some code that an applicant will never type, or by using json format.
					*/
					if(is_array($answer_text))
					{
						$answer_text = implode("|",$answer_text);
						$answer_text = '|'.$answer_text.'|';
					}
					$key_array = explode("_", $key);
					if(  $key_array[0] == 'question'  )
					{						
						$model_answer 			= new MCAnswers();
						$answer = $model_answer->find()->where(['question_id' => $key_array[1]])->andwhere(['applicant_id' => $id])->one();
						
						$answer->answer_text 	= $answer_text;
						$answer->update();
					}
				}				
				return $this->redirect(['view', 'id' => $model_DM->_id]);	
			}
			else
			{				
				return $this->redirect(['update', 'id' => $model_DM->_id]);	
			}		
        } else {
			
			$results = $model_applicant->find()->where(['applicant_id' => $id])->one();
			$model_job->_id = $results['job_id'];
			
			$results = $model_question->find()->where(['job_id' => $model_job->_id])->All();			
			
			$questions 	= array();
			$options 	= array();		
						
			foreach(  $results as $key => $value  )
			{
				$questions[$value['question_id']] = $value['question_text'];
				if( $value['question_type'] == 1)
				{
					$results2 = $model_question_options->find()->where(['question_id' => $value['question_id']])->All(); 
					
					foreach(  $results2 as $key2 => $value2  )
					{
						$options[$value2['question_id']][] = array( $value2['etxt'], $value2['option_id']);
					}
				}
			}

			$model_job->questions = $questions;
			$model_job->options = $options;
					
			return $this->render('update', [
				'model_applicant'	=> $model_applicant,
				'model_job' 		=> $model_job,
				'model_DM' 			=> $model_DM,
				'model_answers'		=> $model_answers,
			]); 
        }
    }

    /**
     * Deletes an existing MCApplicants model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionNeca($id)
    {
		$model_applicant 	= new MCApplicants();	
		$model_answer 		= new MCAnswers();		
		
		$model_applicant->deleteAll(['applicant_id' => $id]);		
		$model_answer->deleteAll(['applicant_id' => $id]);
		
        return $this->redirect(['index']);
    }

    /**
     * Finds the MCApplicants model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MCApplicants the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MCApplicants::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
