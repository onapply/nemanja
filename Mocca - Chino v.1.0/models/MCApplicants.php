<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_applicants".
 *
 * @property integer $applicant_id
 * @property integer $job_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $motivation
 * @property integer $status
 */
class MCApplicants extends \yii\db\ActiveRecord
{
	public $_job_id;
	public $_id;	
	public $_first_name;
	public $_last_name;
	public $_full_name;
	public $_status;
	public $_email;
	public $_motivation;
	public $_applicants = array();
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_applicants';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'motivation'], 'required'],
            [['motivation'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'applicant_id' => 'Applicant ID',
            'job_id' => 'Job ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'motivation' => 'Motivation',
            'status' => 'Status',
        ];
    }
	public static function getStatuses()
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_applicant_statuses";
		$sql = $connection->createCommand($query);
		$results = $sql->queryAll(); 
		return $results;
	}
	
	public function ChangeStatus($applicant_id, $status)
	{
		$connection = Yii::$app->db;		
		$connection->createCommand()->update('MC_applicants', ['status' => $status])->execute();
		return 'OK';
	}
	public function get_answers($applicant_id)
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_answers WHERE applicant_id = :applicant_id";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':applicant_id', $applicant_id); 
		$results = $sql->queryAll(); 			
		if(  $results  )
		{
			return $results;

		}
	}
	public function search_job_status($job_id = 0, $status = 0)
	{
		$connection = Yii::$app->db;
		$job_where = ($job_id != 0) ? "WHERE job_id = $job_id" : '';
		$status_where = ($status != 0) ? "status = $status" : ''; 
		if($status_where != '')
		{
			if(  $job_where != ''  ) 
				$status_where = 'AND '.$status_where; 
			else
				$status_where = 'WHERE '.$status_where;
		}
		$query = "SELECT * FROM MC_applicants $job_where $status_where";
		$sql = $connection->createCommand($query);
		return $sql->queryAll(); 
	}
	public function search_status($status)
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_applicants WHERE status = :status";
		$sql = $connection->createCommand($query);
		$sql->bindValue(':status', $status);
		return $sql->queryAll(); 
	}
}
