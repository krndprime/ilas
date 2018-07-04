<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childawarenesscampaign;

/**
 * ChildawarenesscampaignSearch represents the model behind the search form about `backend\modules\child\models\Childawarenesscampaign`.
 */
class ChildawarenesscampaignSearch extends Childawarenesscampaign
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'targetGroup_id', 'expectedNumberOfParticipants', 'geosector_id', 'orgernisor_id'], 'integer'],
            [['topic', 'startDate', 'endDate'], 'safe'],
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
        $query = Childawarenesscampaign::find();

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
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'targetGroup_id' => $this->targetGroup_id,
            'expectedNumberOfParticipants' => $this->expectedNumberOfParticipants,
            'geosector_id' => $this->geosector_id,
            'orgernisor_id' => $this->orgernisor_id,
        ]);

        $query->andFilterWhere(['like', 'topic', $this->topic]);

        return $dataProvider;
    }
}
