<?php

namespace backend\modules\labourdispute\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\labourdispute\models\Disputenote;

/**
 * DisputenoteSearch represents the model behind the search form about `backend\modules\labourdispute\models\Disputenote`.
 */
class DisputenoteSearch extends Disputenote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'case_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['summoningDate', 'note', 'nextSummoningDate', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Disputenote::find();

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
            'case_id' => $this->case_id,
            'summoningDate' => $this->summoningDate,
            'nextSummoningDate' => $this->nextSummoningDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
