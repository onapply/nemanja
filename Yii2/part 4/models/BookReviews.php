<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_revews".
 *
 * @property integer $id
 * @property string $book_titile
 * @property string $author
 * @property string $amazon_url
 * @property string $review
 */
class BookReviews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_revews';
    }

    /**
     * @inheritdoc
     */
	 //default SCENARIO
    public function rules()  
    {
        return 
		[
            [['book_titile', 'author', 'amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_titile', 'author', 'amazon_url'], 'string', 'max' => 255],
			[['book_titile'], 'validateOnapply', 'params' => ['author_name' => 'author']], //in author_neca put what is in author field
			[['image'], 'required', 'on' => 'update-image', 'message' => "Onapply suggests you upload a photo"], //translation: This image file will be required when we are on the update-image scenario
			[['image'], 'file', 'extensions' => 'png, jpg, jpeg, gif']
		];
    }
	
	//create a brand new SCENARIO
	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios['update-image'] = ['image']; //this scenario will apply to the image ['image, amazon_url, author, review']
		return $scenarios;
	}

	public function validateOnapply($attribute, $params)
	{
		$book_title = $this->$attribute;
		//$author = $this->$params['author_name']; -> doesn't work when I use this 
		/*
		if( $book_title != "onapply" )
		{
			
		}
		*/
		//Custom query
		//1. Connecting to the db
		$connection = Yii::$app->db;
		
		//2. Query
		$query = "SELECT * FROM book_revews WHERE book_titile = :book_title";
		
		//3. Execute query
		$sql = $connection->createCommand($query);
		$sql->bindValue(':book_title', $book_title); 
		$book_reviews = $sql->queryAll(); 
		
		/*
		OR just
		
		$query = "SELECT * FROM book_revews WHERE book_titile = '$book_title'";
		
		$book_reviews = $connection->createCommand($query)->queryAll();
		
		*/
		
		//4. Test result
		if(  $book_reviews  )
		{
			//we have a positive result! Yeehaaa!
			$this->addError($attribute, "There is already a book with the title ".$book_title);
		}
		//for the testing purposes
		/*
		else
		{
			//no results for the database!
			$this->addError($attribute, "There are no books with the title of".$book_title);
		}
		*/
			
	}
    /**
     * @inheritdoc
     */
    public function attributeLabels() 
    {
        return [
            'id' => 'ID',
            'book_titile' => 'Book Titile',
            'author' => 'Author',
            'amazon_url' => 'Amazon Url',
            'review' => 'Your Review',
			'image' => 'Book Cover' 
        ];
    }
}
