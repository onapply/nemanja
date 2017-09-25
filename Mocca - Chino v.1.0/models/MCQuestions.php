<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_questions".
 *
 * @property integer $question_id
 * @property integer $job_id
 * @property string $question_text
 * @property string $question_type
 */
class MCQuestions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_questions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'question_text'], 'required'],
            [['job_id'], 'integer'],
            [['question_text', 'question_type'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'question_id' => 'Question ID',
            'job_id' => 'Job ID',
            'question_text' => 'Question Text',
            'question_type' => 'Question Type',
        ];
    }
}
