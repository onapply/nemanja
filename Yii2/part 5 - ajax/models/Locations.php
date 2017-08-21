<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property integer $location_id
 * @property string $zip_code
 * @property string $city
 * @property string $province
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip_code', 'city', 'province'], 'required'],
            [['zip_code', 'city', 'province'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'zip_code' => 'Zip Code',
            'city' => 'City',
            'province' => 'Province',
        ];
    }
    
    
	public function actionGetCityProvinceModel($zipId)
	{
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
			return Json::encode($results);
		}
		return null;
	}
}
