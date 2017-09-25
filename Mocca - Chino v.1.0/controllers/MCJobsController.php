<?php

namespace app\controllers;

use Yii;
use app\models\MCJobs;
use app\models\MCJobsDM;
use app\models\MCJobsSearch;
use app\models\MCApplicantsDM;
use app\models\MCQuestions;
use app\models\MCQuestionOptions;
use app\models\MCAnswers;
use app\models\MCApplicants;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\DynamicModel;
use yii\base\Model;
use yii\helpers\Url;
use yii\db\ActiveRecord;

/**
 * MCJobsController implements the CRUD actions for MCJobs model.
 */
class MCJobsController extends Controller
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
     * Lists all MCJobs models.
     * @return mixed
     */
    public function actionIndex()
    {
		/*
		$searchModel = new MCJobsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);		
		*/
		$model = new MCJobs;
		$data['allJobs'] = $model->getAllJobs();
        return $this->render('index', $data);
    }

    /**
     * Displays a single MCJobs model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		$model_job 				= new MCJobs();
		$model_question 		= new MCQuestions();
		$model_question_options = new MCQuestionOptions();
		$model_answer 			= new MCAnswers();
		$model_DM 				= new MCJobsDM();	
		
		$model_DM->_id = $id;
		
		$questions 	= array();
		$options 	= array();
		
		$results = $model_question->find()->where(['job_id' => $id])->All();
		
		if(!empty($results))
		{
			foreach(  $results as $key => $value  )
			{
				$questions[$value['question_id']] = array($value['question_type'], $value['question_text']);
				
				/*
				Now I am creating an associative array, where a key is `question_id` and value is an array where the first value is
				question type (0 -> free text question, 1 -> checkbox question), and second question text, i.e.
				Array
				(
					//question 217
					[217] => Array
						(
							//type 0 -> free text question
							[0] => 0
							[1] => free text question text
						)

					[218] => Array
						(
							//type 1 -> checkbox question
							[0] => 1
							[1] => checkbox question text
						)
				)
				The in the `job_create.js` file I am iterating through this array and create question divs
				*/
				
				if( $value['question_type'] == 1)
				{
					$results2 = $model_question_options->find()->where(['question_id' => $value['question_id']])->All(); 
					
					foreach(  $results2 as $key2 => $value2  )
					{
						/*
						Now I am creating an associative array, where a key is `question_id` and value is an array of question options.
						Each option is represented as an array, where the first element is option text, and second one is option's table id, i.e.
						Array
						(
							//question 218
							[218] => Array   
								(
									//option 1
									[0] => Array
										(
											[0] => 12
											[1] => 284
										)

									//option 2
									[1] => Array
										(
											[0] => 12
											[1] => 285
										)

									//option 3
									[2] => Array
										(
											[0] => 333
											[1] => 286
										)

								)

						)
						The in the `job_create.js` file I am iterating through this array and append option to appropriate question divs (determined by the key) 
						*/
						$options[$value2['question_id']][] = array( $value2['etxt'], $value2['option_id']);
					}
				}
			}			
		}
		$model_DM->questions = $questions;
		$model_DM->options = 	$options;
		
        return $this->render('view', [
            'model' => $model_DM,
        ]);
    }

    /**
     * Creates a new MCJobs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$model_job 		= new MCJobs();
		$model_DM 		= new MCJobsDM();
		$model_answer 	= new MCAnswers();

		/*
		I am setting some rules for two input fields. 
		We can use Yii2 core validators to be more specific: http://www.yiiframework.com/doc-2.0/guide-tutorial-core-validators.html
		this was just a basic example
		*/
		$model_DM->defineAttribute('name');
		$model_DM->defineAttribute('description');
		$model_DM->addRule(['name', 'description'], 'string');
		$model_DM->addRule(['name', 'description'], 'required');
	 
		if($model_DM->load(Yii::$app->request->post())){
			
			//I am iterating through the $_POST to defineAttributes and addRules dynamically 
			foreach($_POST['MCJobsDM'] as $key => $value)
			{	
				if($key != 'name' && $key != 'description')
				{
					$model_DM->defineAttribute($key);
					//we can modify this to be more specific
					$model_DM->addRule([$key], 'string'); 
					$model_DM->addRule([$key], 'required');
				}
			}
			$model_DM->setAttributes($_POST['MCJobsDM']);					
			
			//I am creating this array to show errors if there is any
			$data['errors'] = array();			
						
			if($model_DM->validate())
			{
				$model_job->name = $_POST['MCJobsDM']['name'];
				$model_job->description = $_POST['MCJobsDM']['description'];
				$model_job->save();
				$job_id = $model_job->job_id;
								
				foreach($_POST['MCJobsDM'] as $key => $value)
				{					
					/*
					Now when I have inserted the new job and have its `id`, I can insert questions and question options
					when I am setting input names, I decided to go with this notation:
					free text question: `question_" + i + "_0`   (`_0` indicates that it is a free text question)
					checkbox question: `question_" + i + "_1`    (`_1` indicates that it is a checkbox question)
					checkbox question option: `option_" + question_id + "_" + j`
					*/
					$key_array = explode("_", $key);
					//when I explode input name, I can find all the relevant information about it
					
					if(  $key_array[0] == 'question'  )
					{
						$model_question = new MCQuestions();
						$model_question->job_id = $job_id;
						$model_question->question_text = $value;
						$model_question->question_type = $key_array[2];
						$model_question->save();
					}
					if(  $key_array[0] == 'option'  )
					{
						$model_question_options = new MCQuestionOptions();
						$model_question_options->question_id = $model_question->question_id;
						$model_question_options->etxt = $value;
						$model_question_options->insert();
					}
					
				}	
				return $this->redirect(['view', 'id' => $job_id]);				
			}
		}
		return $this->render('create', ['model'=>$model_DM]);
    }
	

    /**
     * Updates an existing MCJobs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {		
		$model_job 				= new MCJobs();
		$model_DM 				= new MCJobsDM();
		$model_answer 			= new MCAnswers();
		$model_question 		= new MCQuestions();
		$model_question_options = new MCQuestionOptions();
			
		$model_DM->_id = $id;
					
		$model_DM->defineAttribute('name');
		$model_DM->defineAttribute('description');
		$model_DM->addRule(['name', 'description'], 'string');		

		if($model_DM->load(Yii::$app->request->post()))
		{
			
			foreach($_POST['MCJobsDM'] as $key => $value)
			{	
				if($key != 'name' && $key != 'description')
				{
					$model_DM->defineAttribute($key);
					$model_DM->addRule([$key], 'string');
				}
			}
			$model_DM->setAttributes($_POST['MCJobsDM']);					
			
			if($model_DM->validate())
			{
				//I am updating job name and description
				$job = $model_job->findOne($id);
				$job->name = $_POST['MCJobsDM']['name'];
				$job->description = $_POST['MCJobsDM']['description'];
				$job->update();
				$last_question_id = 0;
				$question_id;
				foreach($_POST['MCJobsDM'] as $key => $value)
				{	
					/*
					Now I am iterating through the $_POST array and exploding input names to find out all relevant data about it.
					Now the situtation is a little bit more complex since there are free text and checkbox questions, as well as
					old and questions and options. So I used this notation to differentiate them:
					old:
					free text question: `question_223_0_0`   (question - question, 223 - question id, 0 - this is a free text question, 0 - old question )
					checkbox question: `question_222_1_0`    (question - question, 223 - question id, 1 - this is a checkbox question, 0 - old question )
					checkbox question option: `answer_222_294_0` (answer - option, 222 - question id, 294 - option id, 0 - old option)
					new
					free text question: `question_i_0_1`   (question - question, i - question order, 0 - this is a free text question, 1 - new question )
					checkbox question: `question_i_1_1`    (question - question, i - question order, 1 - this is a checkbox question, 1 - new question )
					checkbox question option: `answer_notdefined_1_1` (answer - option, 222 - question id, 1 - nothing special(just for the sake of symmetry), 1 - new option)
					*/
					$key_array = explode("_", $key);
					
					if(  $key_array[0] == 'question'  )
					{
						if(  $key_array[3] == '0'  )
						{
							//this is old
							$model_question = new MCQuestions();
							$question = $model_question->findOne($key_array[1]);
							$question->question_text = $value;
							$question->update();
						}
						else
						{
							//this is new
							$model_question = new MCQuestions();
							$model_question->job_id = $id;
							$model_question->question_text = $value;
							$model_question->question_type = $key_array[2];
							$model_question->save();	
							$last_question_id = $model_question->question_id;				
						}
					}						
					
					if(  $key_array[0] == 'answer'  )
					{
						if(  $key_array[1] == 'notdefined'  )
							$question_id = $last_question_id;
						else
							$question_id = $key_array[1];
							
						if(  $key_array[3] == '0'  )
						{
							//old
							$model_question_options = new MCQuestionOptions();
							$question_option = $model_question_options->findOne($key_array[2]);
							$question_option->etxt = $value;
							$question_option->update();
						}
						else
						{
							//new
							$model_question_options = new MCQuestionOptions();
							$model_question_options->question_id = $question_id;
							$model_question_options->etxt = $value;
							$model_question_options->insert();
						}
					}
				} 
				return $this->redirect(['view', 'id' => $id]);					
			}
			else
			{
				return $this->redirect(['update', 'id' => $id]);	
			}
		}
		else
		{	
			//this is the same as in actionView
			$questions 	= array();
			$options 	= array();
			
			$results = $model_question->find()->where(['job_id' => $id])->All();
			
			foreach(  $results as $key => $value  )
			{
				$questions[$value['question_id']] = array($value['question_type'], $value['question_text']);
				
				if( $value['question_type'] == 1)
				{
					$results2 = $model_question_options->find()->where(['question_id' => $value['question_id']])->All(); 
					
					foreach(  $results2 as $key2 => $value2  )
					{
						$options[$value2['question_id']][] = array( $value2['etxt'], $value2['option_id']);
					}
				}
			}			
			
			$model_DM->questions = $questions;
			$model_DM->options = $options;
			           
			return $this->render('update', [
				'model' => $model_DM,
			]); 
		}
    }
	
	public function actionXhrRemoveQuestion($question_id)
	{
		/*
		This peace of code runs when we click delete question button (`X`). There are a couple of things to do:
		1. delete question
		2. delete its options
		3. delete its answers
		*/
		$model_question 		= new MCQuestions();
		$model_answer 			= new MCAnswers();
		$model_question_options = new MCQuestionOptions();
		
		//delete question		
		$model_question->deleteAll(['question_id' => $question_id]);
		
		//delete options		
		$model_question_options->deleteAll(['question_id' => $question_id]);	

		//delete answers
		$model_answer->deleteAll(['question_id' => $question_id]);
		
		echo 'ok';
	}
	
	public function actionXhrRemoveOption($option_id)
	{		
		/*
		This peace of code runs when we click delete question button (`X`). There are a couple of things to do:
		1. delete question
		2. delete its options
		3. delete its answers
		*/
		$model_question_options = new MCQuestionOptions();
		$model_question_options->deleteAll(['option_id' => $option_id]);	
		echo 'ok'; 
	}
	
    /**
     * Deletes an existing MCJobs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDeleteJob($id)
    {
		$model_job 				= new MCJobs();
		$model_question 		= new MCQuestions();
		$model_answer 			= new MCAnswers();
		$model_applicants 		= new MCApplicants();
		$model_question_options = new MCQuestionOptions();
		
		//delete job
		$model_job->deleteAll(['job_id' => $id]);
		
		//delete applicants		
		$model_applicants->deleteAll(['job_id' => $id]);
		
		//delete questions
		$results = $model_question->find()->where(['job_id' => $id])->All(); 

		if(  $results  )
		{
			foreach(  $results as $key => $value  )
			{
				//delete every question related option
				$model_question_options->deleteAll(['question_id' => $value['question_id']]);				

				//delete every question related answer
				$model_answer->deleteAll(['question_id' => $value['question_id']]);
			}
		}
		
		//delete question
		$model_question->deleteAll(['job_id' => $id]);
        return $this->redirect(['index']);
    }

    /**
     * Finds the MCJobs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MCJobs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MCJobs::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
