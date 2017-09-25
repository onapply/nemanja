<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_jobs".
 *
 * @property integer $job_id
 * @property string $name
 * @property string $description
 */
class MCJobs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_jobs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'job_id' => 'Job ID',
            'name' => 'Name',
            'description' => 'Description',
        ];
    }
	
	public static function getAllJobs()
	{
		$connection = Yii::$app->db;
		$query = "SELECT * FROM MC_jobs";
		$sql = $connection->createCommand($query);
		$results = $sql->queryAll(); 
		
		return $results;
	}
}
