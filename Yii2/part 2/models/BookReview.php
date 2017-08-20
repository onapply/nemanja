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
class BookReview extends \yii\db\ActiveRecord  //this make the db usage really sweet
{
    /**
     * @inheritdoc
     */
	//sets the table name
    public static function tableName()
    {
        return 'book_revews';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
		//some kind of validation, checks that everything is cool -> does a hole lot mooore
        return 
		[
            [['book_titile', 'author', 'amazon_url', 'review'], 'required'],
            [['review'], 'string'],
            [['book_titile', 'author', 'amazon_url'], 'string', 'max' => 255],
        ];
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
            'review' => 'Review',
        ];
    }
}
