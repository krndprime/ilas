<?php

namespace backend\modules\audit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\audit\models\AuditSummary;

/**
 * AuditSummarySearch represents the model behind the search form about `backend\modules\audit\models\AuditSummary`.
 */
class AuditSummarySearch extends AuditSummary
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'audit_id', 'establishment_id', 'weight', 'answer', 'result', 'highest'], 'integer'],
            [['question'], 'safe'],
            [['percentage'], 'number'],
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
        $query = AuditSummary::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'audit_id' => $this->audit_id,
            'establishment_id' => $this->establishment_id,
            'weight' => $this->weight,
            'answer' => $this->answer,
            'result' => $this->result,
            'highest' => $this->highest,
            'percentage' => $this->percentage,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question]);

        return $dataProvider;
    }
}
