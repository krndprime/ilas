<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\registrationderegistration\models\Rdemployerecosector;

/**
 * RdemployerecosectorSearch represents the model behind the search form about `backend\modules\registrationderegistration\models\Rdemployerecosector`.
 */
class RdemployerecosectorSearch extends Rdemployerecosector
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employer_id', 'ecosector_id', 'mainecosector_id'], 'integer'],
            [['startDate'], 'safe'],
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
        $query = Rdemployerecosector::find();

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
            'employer_id' => $this->employer_id,
            'ecosector_id' => $this->ecosector_id,
            'mainecosector_id' => $this->mainecosector_id,
            'startDate' => $this->startDate,
        ]);

        return $dataProvider;
    }
}
