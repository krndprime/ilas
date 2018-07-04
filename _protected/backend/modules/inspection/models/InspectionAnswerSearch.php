<?php

namespace backend\modules\inspection\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\inspection\models\InspectionAnswer;

/**
 * InspectionAnswerSearch represents the model behind the search form about `backend\modules\inspection\models\InspectionAnswer`.
 */
class InspectionAnswerSearch extends InspectionAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inspection_id', 'establishment_id', 'question_id', 'option_id', 'created_by'], 'integer'],
            [['answer', 'created_on'], 'safe'],
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
        $query = InspectionAnswer::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'inspection_id' => $this->inspection_id,
            'establishment_id' => $this->establishment_id,
            'question_id' => $this->question_id,
            'option_id' => $this->option_id,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
    
    public function searchByEstablishment($params)
    {
        $query = InspectionAnswer::find()->select('inspection_id,establishment_id')->distinct();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'inspection_id' => $this->inspection_id,
            'establishment_id' => $this->establishment_id,
            'question_id' => $this->question_id,
            'option_id' => $this->option_id,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        $query->andFilterWhere(['like', 'answer', $this->answer]);

        return $dataProvider;
    }
}
