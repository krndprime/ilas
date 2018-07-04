<?php

namespace backend\modules\inspection\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\inspection\models\InspectionOption;

/**
 * InspectionOptionSearch represents the model behind the search form about `backend\modules\inspection\models\InspectionOption`.
 */
class InspectionOptionSearch extends InspectionOption
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'question_id', 'datatype_id'], 'integer'],
            [['option'], 'safe'],
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
        $query = InspectionOption::find();

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
            'question_id' => $this->question_id,
            'datatype_id' => $this->datatype_id,
        ]);

        $query->andFilterWhere(['like', 'option', $this->option]);

        return $dataProvider;
    }
}
