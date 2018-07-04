<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sregion;

/**
 * SregionSearch represents the model behind the search form about `backend\models\Sregion`.
 */
class SregionSearch extends Sregion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['village', 'cell', 'sector', 'district', 'province'], 'safe'],
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
        $query = Sregion::find();

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
        ]);

        $query->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'cell', $this->cell])
            ->andFilterWhere(['like', 'sector', $this->sector])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'province', $this->province]);

        return $dataProvider;
    }
}
