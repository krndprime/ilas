<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Scountrycodeiso3166;

/**
 * Scountrycodeiso3166Search represents the model behind the search form about `backend\models\Scountrycodeiso3166`.
 */
class Scountrycodeiso3166Search extends Scountrycodeiso3166
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position', 'fk_continent_region'], 'integer'],
            [['cc_iso3166', 'cc_description'], 'safe'],
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
        $query = Scountrycodeiso3166::find();

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
            'position' => $this->position,
            'fk_continent_region' => $this->fk_continent_region,
        ]);

        $query->andFilterWhere(['like', 'cc_iso3166', $this->cc_iso3166])
            ->andFilterWhere(['like', 'cc_description', $this->cc_description]);

        return $dataProvider;
    }
}
