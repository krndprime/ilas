<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\registrationderegistration\models\Rdemployer;

/**
 * RdemployerSearch represents the model behind the search form about `backend\modules\registrationderegistration\models\Rdemployer`.
 */
class RdemployerSearch extends Rdemployer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent', 'child', 'employerType_id', 'registrationAuthority_id', 'ownership_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['companyName', 'openingDate', 'tin', 'rssbNumber', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Rdemployer::find()->Where('parent = 0');;

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
            'parent' => $this->parent,
            'child' => $this->child,
            'employerType_id' => $this->employerType_id,
            'openingDate' => $this->openingDate,
            'registrationAuthority_id' => $this->registrationAuthority_id,
            'ownership_id' => $this->ownership_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'companyName', $this->companyName])
            ->andFilterWhere(['like', 'tin', $this->tin])
            ->andFilterWhere(['like', 'rssbNumber', $this->rssbNumber])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }

    public function searchBranches($params)
    {
        $query = Rdemployer::find()->Where('parent = 1');;

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
            'parent' => $this->parent,
            'child' => $this->child,
            'employerType_id' => $this->employerType_id,
            'openingDate' => $this->openingDate,
            'registrationAuthority_id' => $this->registrationAuthority_id,
            'ownership_id' => $this->ownership_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'companyName', $this->companyName])
            ->andFilterWhere(['like', 'tin', $this->tin])
            ->andFilterWhere(['like', 'rssbNumber', $this->rssbNumber])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
