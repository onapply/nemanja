<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_answers".
 *
 * @property integer $answer_id
 * @property integer $question_id
 * @property integer $applicant_id
 * @property string $answer_text
 */
class MCAnswers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_answers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'applicant_id', 'answer_text'], 'required'],
            [['question_id', 'applicant_id'], 'integer'],
            [['answer_text'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'answer_id' => 'Answer ID',
            'question_id' => 'Question ID',
            'applicant_id' => 'Applicant ID',
            'answer_text' => 'Answer Text',
        ];
    }
}
