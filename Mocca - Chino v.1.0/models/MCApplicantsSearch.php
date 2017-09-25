<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MCApplicants;

/**
 * MCApplicantsSearch represents the model behind the search form about `app\models\MCApplicants`.
 */
class MCApplicantsSearch extends MCApplicants
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['applicant_id', 'job_id', 'status'], 'integer'],
            [['first_name', 'last_name', 'email', 'motivation'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = MCApplicants::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'applicant_id' => $this->applicant_id,
            'job_id' => $this->job_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'motivation', $this->motivation]);

        return $dataProvider;
    }
}
