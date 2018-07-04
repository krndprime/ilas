<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sdesease;

/**
 * SdeseaseSearch represents the model behind the search form about `backend\models\Sdesease`.
 */
class SdeseaseSearch extends Sdesease
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'injurycause_id'], 'integer'],
            [['desease'], 'safe'],
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
        $query = Sdesease::find();

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
            'injurycause_id' => $this->injurycause_id,
        ]);

        $query->andFilterWhere(['like', 'desease', $this->desease]);

        return $dataProvider;
    }
}
