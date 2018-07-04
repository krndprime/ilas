<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\registrationderegistration\models\Rdemployerrepresentative;

/**
 * RdemployerrepresentativeSearch represents the model behind the search form about `backend\modules\registrationderegistration\models\Rdemployerrepresentative`.
 */
class RdemployerrepresentativeSearch extends Rdemployerrepresentative
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'person_id', 'employer_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Rdemployerrepresentative::find();

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
            'person_id' => $this->person_id,
            'employer_id' => $this->employer_id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
