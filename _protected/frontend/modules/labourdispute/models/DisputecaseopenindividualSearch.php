<?php

namespace frontend\modules\labourdispute\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\labourdispute\models\Disputecaseopenindividual;

/**
 * DisputecaseopenindividualSearch represents the model behind the search form about `frontend\modules\labourdispute\models\Disputecaseopenindividual`.
 */
class DisputecaseopenindividualSearch extends Disputecaseopenindividual
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'endDate', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'description', 'submissionDate', 'observation', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Disputecaseopenindividual::find();

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
            'employee_id' => $this->employee_id,
            'employer_id' => $this->employer_id,
            'occupation_id' => $this->occupation_id,
            'experienceInThisEstablishment' => $this->experienceInThisEstablishment,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'submissionDate' => $this->submissionDate,
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
