<?php

namespace backend\modules\audit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\audit\models\AuditQuestion;

/**
 * AuditQuestionSearch represents the model behind the search form about `backend\modules\audit\models\AuditQuestion`.
 */
class AuditQuestionSearch extends AuditQuestion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'section_id', 'order', 'created_by'], 'integer'],
            [['question', 'created_on'], 'safe'],
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
        $query = AuditQuestion::find();

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
            'section_id' => $this->section_id,
            'order' => $this->order,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'question', $this->question]);

        return $dataProvider;
    }
}
