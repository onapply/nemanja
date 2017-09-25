<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_question_options".
 *
 * @property integer $option_id
 * @property integer $question_id
 * @property string $etxt
 */
class MCQuestionOptions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_question_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'etxt'], 'required'],
            [['question_id'], 'integer'],
            [['etxt'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'question_id' => 'Question ID',
            'etxt' => 'Etxt',
        ];
    }
}
