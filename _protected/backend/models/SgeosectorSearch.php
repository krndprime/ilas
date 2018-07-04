<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sgeosector;

/**
 * SgeosectorSearch represents the model behind the search form about `backend\models\Sgeosector`.
 */
class SgeosectorSearch extends Sgeosector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'district_id'], 'integer'],
            [['sector'], 'safe'],
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
        $query = Sgeosector::find();

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
            'district_id' => $this->district_id,
        ]);

        $query->andFilterWhere(['like', 'sector', $this->sector]);

        return $dataProvider;
    }
}
