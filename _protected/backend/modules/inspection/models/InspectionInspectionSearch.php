<?php

namespace backend\modules\inspection\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\inspection\models\InspectionInspection;

/**
 * InspectionInspectionSearch represents the model behind the search form about `backend\modules\inspection\models\InspectionInspection`.
 */
class InspectionInspectionSearch extends InspectionInspection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'month', 'created_by', 'status'], 'integer'],
            [['name', 'year', 'created_on'], 'safe'],
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
        $query = InspectionInspection::find();

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
            'year' => $this->year,
            'month' => $this->month,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
