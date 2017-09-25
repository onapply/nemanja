<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "MC_applicant_statuses".
 *
 * @property integer $status_id
 * @property integer $job_id
 * @property string $text
 */
class MCApplicantStatuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'MC_applicant_statuses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'status_id' => 'Status ID',
            'job_id' => 'Job ID',
            'text' => 'Text',
        ];
    }
}
