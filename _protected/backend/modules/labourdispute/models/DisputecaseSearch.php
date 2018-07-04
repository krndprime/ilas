<?php

namespace backend\modules\labourdispute\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\labourdispute\models\Disputecase;

/**
 * DisputecaseSearch represents the model behind the search form about `backend\modules\labourdispute\models\Disputecase`.
 */
class DisputecaseSearch extends Disputecase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employer_id', 'employee_id', 'tradeUnion_id', 'accuser_id', 'casetype_id', 'caseStatus_id', 'disputeActionTaken_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['description', 'submissionDate', 'settlementDate', 'summoningDate', 'appearanceDate', 'observation', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Disputecase::find()->Where('caseStatus_id = 1');

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
            'employee_id' => $this->employee_id,
            'tradeUnion_id' => $this->tradeUnion_id,
            'accuser_id' => $this->accuser_id,
            'casetype_id' => $this->casetype_id,
            'submissionDate' => $this->submissionDate,
            'caseStatus_id' => $this->caseStatus_id,
            'disputeActionTaken_id' => $this->disputeActionTaken_id,
            'settlementDate' => $this->settlementDate,
            'summoningDate' => $this->summoningDate,
            'appearanceDate' => $this->appearanceDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
    public function searchClosecases($params)
    {
        $query = Disputecase::find()->Where('caseStatus_id = 3');

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
            'employee_id' => $this->employee_id,
            'tradeUnion_id' => $this->tradeUnion_id,
            'accuser_id' => $this->accuser_id,
            'casetype_id' => $this->casetype_id,
            'submissionDate' => $this->submissionDate,
            'caseStatus_id' => $this->caseStatus_id,
            'disputeActionTaken_id' => $this->disputeActionTaken_id,
            'settlementDate' => $this->settlementDate,
            'summoningDate' => $this->summoningDate,
            'appearanceDate' => $this->appearanceDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
