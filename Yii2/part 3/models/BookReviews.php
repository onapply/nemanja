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
    public function rules()  
    {
        return [
            [['book_titile', 'author', 'amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_titile', 'author', 'amazon_url'], 'string', 'max' => 255],
			[['book_titile'], 'validateOnapply', 'params' => ['author_name' => 'author']] //in author_neca put what is in author field
        ];
    }

	public function validateOnapply($attribute, $params)
	{
		$book_title = $this->$attribute;
		//$author = $this->$params['author_name'];
		if( $book_title != "onapply" )
		{
			$this->addError($attribute, "You should write 'onapply'");
		}
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
        ];
    }
}
