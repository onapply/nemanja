<?php

namespace app\models;

use Yii;
use yii\base\DynamicModel;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "MC_jobs".
 *
 * @property integer $job_id
 * @property string $name
 * @property string $description
 */
 
class MCJobsDM extends DynamicModel
{
	public $_id;
	public $questions;
	public $options;
	public $answers;
	
	public function job_questions()
	{
		return $this->questions;
	}
	
	public function job_question_options()
	{
		return $this->options;
	}
	
	public function job_question_answers()
	{
		return $this->answers;
	}
	
	public function insert_name_description($name, $description) 
	{
		//active record
		
		$connection = Yii::$app->db;		
		$connection->createCommand()->insert('MC_jobs', [
			'name' => $name,
			'description' => $description,
		])->execute();				
				
		return  $connection->getLastInsertID();
	}
	
	
    public function insert_question($question_text, $job_id, $question_type)
	{
		$connection = Yii::$app->db;		
		$connection->createCommand()->insert('MC_questions', [
			'job_id' => $job_id,
			'question_text' => $question_text,
			'question_type' => $question_type,
		])->execute();				
				
		return  $connection->getLastInsertID();
	}
	
    public function insert_question_option($option_text, $question_id)
	{
		$connection = Yii::$app->db;		
		$connection->createCommand()->insert('MC_question_options', [
			'question_id' => $question_id,
			'etxt' => $option_text,
		])->execute();		
	}
	
	public function get_job_data($job_id)
	{
		$connection = Yii::$app->db;	
		$query = "SELECT * FROM MC_jobs WHERE job_id = :job_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':job_id', $job_id); 
		$results = $sql->queryOne(); 				
				
		return  $results;
	}
	
	public function get_questions($job_id)
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_questions WHERE job_id = :job_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':job_id', $job_id); 
		$results = $sql->queryAll(); 

		return $results;
	}
	
	public function get_options($question_id)
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_question_options WHERE question_id = :question_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':question_id', $question_id); 
		$results = $sql->queryAll(); 

		return $results;
		
	}
	public function get_answers($applicant_id)
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_answers WHERE applicant_id = :applicant_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':applicant_id', $applicant_id); 
		$results = $sql->queryAll(); 

		return $results;		
	}
	public function remove_question($question_id)
	{
		//delete question
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_questions', ['question_id' => $question_id])
		->execute();
		
		//delete options		
		$connection->createCommand()
		->delete('MC_question_options', ['question_id' => $question_id])
		->execute();

		//delete answers
		$connection->createCommand()
		->delete('MC_answers', ['question_id' => $question_id])
		->execute();
		
		return 'ok';
	}
	public function remove_question_options($option_id)
	{
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_question_options', ['option_id' => $option_id])
		->execute();		
		
		//delete from the answers	- iterate through all the questions whom this is the answer and remove it :)   
		/*
			|15|16|17|
			15 -> |16|17|
			16 -> |15|17|
			17 -> |15|16|
			->> Delete Its id and `|` before it
		*/
		
		//remove from answers
		return 'ok';
	}
	public function update_name_description($job_id, $name, $description)
	{
		$connection = Yii::$app->db;					
		$connection->createCommand()->update('MC_jobs', [
			'name' => $name,
			'description' => $description,
		], 'job_id = :job_id')
		->bindValue(':job_id', $job_id)
		->execute();
		
		
		return  'ok';
	}
	public function update_question($question_id, $question_text)
	{
		$connection = Yii::$app->db;					
		$connection->createCommand()->update('MC_questions', [
			'question_text' => $question_text,
		], 'question_id = :question_id')
		->bindValue(':question_id', $question_id)
		->execute();
		
		
		return  'ok';
	}
	public function update_option($option_id, $option_text)
	{
		$connection = Yii::$app->db;					
		$connection->createCommand()->update('MC_question_options', [
			'etxt' => $option_text,
		], 'option_id = :option_id')
		->bindValue(':option_id', $option_id)
		->execute();
		
		
		return  'ok';
	}
	public function delete_job($job_id)
	{
		//delete job
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_jobs', ['job_id' => $job_id])
		->execute();	
		
		//delete applicants
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_applicants', ['job_id' => $job_id])
		->execute();		
		
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_questions WHERE job_id = :job_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':job_id', $job_id); 
		$results = $sql->queryAll(); 

		if(  $results  )
		{
			foreach(  $results as $key => $value  )
			{
				//delete every question related option
				$connection = Yii::$app->db;
				$connection->createCommand()
				->delete('MC_question_options', ['question_id' => $value['question_id']])
				->execute();	

				//delete every question related option
				$connection = Yii::$app->db;
				$connection->createCommand()
				->delete('MC_answers', ['question_id' => $value['question_id']])
				->execute();	
			}
		}
		
		//delete applicants
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_questions', ['job_id' => $job_id])
		->execute();
		
		return 'ok';
	}
	
}
