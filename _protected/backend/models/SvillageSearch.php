<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Svillage;

/**
 * SvillageSearch represents the model behind the search form about `backend\models\Svillage`.
 */
class SvillageSearch extends Svillage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cell_id'], 'integer'],
            [['village'], 'safe'],
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
        $query = Svillage::find();

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
            'cell_id' => $this->cell_id,
        ]);

        $query->andFilterWhere(['like', 'village', $this->village]);

        return $dataProvider;
    }
}
