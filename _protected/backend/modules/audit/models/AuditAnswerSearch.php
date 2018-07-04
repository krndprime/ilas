<?php

namespace backend\modules\audit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\audit\models\AuditAnswer;

/**
 * AuditAnswerSearch represents the model behind the search form about `backend\modules\audit\models\AuditAnswer`.
 */
class AuditAnswerSearch extends AuditAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'audit_id', 'establishment_id', 'question_id', 'answer', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
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
        $query = AuditAnswer::find();

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
            'question_id' => $this->question_id,
            'answer' => $this->answer,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        return $dataProvider;
    }
    
    public function searchDistinct($params)
    {
        $query = AuditAnswer::find()->select('establishment_id')->distinct();

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
            'question_id' => $this->question_id,
            'answer' => $this->answer,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        return $dataProvider;
    }
}
