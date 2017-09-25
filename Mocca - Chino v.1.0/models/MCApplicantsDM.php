<?php

namespace app\models;

use Yii;
use yii\base\DynamicModel;

/**
 * This is the model class for table "MC_jobs".
 *
 * @property integer $job_id
 * @property string $name
 * @property string $description
 */
class MCApplicantsDM extends DynamicModel
{
	public $_id;
	//create an applicant
	public function insert_applicant($job_id, $first_name, $last_name, $email, $motivation)
	{
		$connection = Yii::$app->db;		
		$connection->createCommand()->insert('MC_applicants', [
			'job_id' => $job_id,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'motivation' => $motivation,
		])->execute();				
				
		return  $connection->getLastInsertID();
	}
	
	//insert answer
	public function insert_answer($applicant_id, $question_id, $answer_text)
	{
		$connection = Yii::$app->db;		
		if(is_array($answer_text))
		{
			$answer_text = implode("|",$answer_text);
			$answer_text = '|'.$answer_text.'|';
		}
		$connection->createCommand()->insert('MC_answers', [
			'applicant_id' => $applicant_id,
			'question_id' => $question_id,
			'answer_text' => $answer_text
		])->execute();				
				
		return  $connection->getLastInsertID();
	}
	public function get_applicant_data($applicant_id)
	{
		$connection = Yii::$app->db;	
		$query = "SELECT * FROM MC_applicants WHERE applicant_id = :applicant_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':applicant_id', $applicant_id); 
		$results = $sql->queryOne(); 				
				
		return  $results;
	}
	public function update_applicant($applicant_id, $first_name, $last_name, $email, $motivation)
	{
		$connection = Yii::$app->db;					
		$connection->createCommand()->update('MC_applicants', [
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'motivation' => $motivation,
		], 'applicant_id = :applicant_id')
		->bindValue(':applicant_id', $applicant_id)
		->execute();
		
		
		return  'ok';
	}
	
	public function update_answer($question_id, $answer_text)
	{	
		if(is_array($answer_text))
		{
			$answer_text = implode("|",$answer_text);
			$answer_text = '|'.$answer_text.'|';
		}
		$connection = Yii::$app->db;					
		$connection->createCommand()->update('MC_answers', [
			'answer_text' => $answer_text
		], 'question_id = :question_id')
		->bindValue(':question_id', $question_id)
		->execute();
				
		return  'ok';
	}
	
	public function delete_applicant($applicant_id)
	{
		//delete applicant
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_applicants', ['applicant_id' => $applicant_id])
		->execute();	
		
		//delete answers
		$connection = Yii::$app->db;
		$connection->createCommand()
		->delete('MC_answers', ['applicant_id' => $applicant_id])
		->execute();		
		
		return 'ok';
	}
	public function get_job_applicants($job_id)
    {
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_applicants WHERE job_id = :job_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':job_id', $job_id); 
		$results = $sql->queryAll(); 
		
		return $results;
    }
	public function get_applicants_by_status($status)
    {
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_applicants WHERE status = :status";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':status', $status); 
		$results = $sql->queryAll(); 
		
		return $results;
    }
	public function get_applicants_by_status_and_job($job_id, $status)
    {
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_applicants WHERE status = :status AND job_id = :job_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':status', $status); 
		$sql->bindValue(':job_id', $job_id); 
		$results = $sql->queryAll(); 
		
		return $results;
    }	
	
}
