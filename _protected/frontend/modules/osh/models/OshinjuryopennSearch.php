<?php

namespace frontend\modules\osh\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\osh\models\Oshinjuryopenn;

/**
 * OshinjuryopennSearch represents the model behind the search form about `frontend\modules\osh\models\Oshinjuryopenn`.
 */
class OshinjuryopennSearch extends Oshinjuryopenn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employee_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'injuryType_id', 'frequency_id', 'desease_id', 'accident_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['startDate', 'endDate', 'injuryDate', 'returnToWorkDate', 'observation', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Oshinjuryopenn::find();

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
            'injuryType_id' => $this->injuryType_id,
            'frequency_id' => $this->frequency_id,
            'desease_id' => $this->desease_id,
            'accident_id' => $this->accident_id,
            'injuryCategory_id' => $this->injuryCategory_id,
            'partOfTheBody_id' => $this->partOfTheBody_id,
            'cause_id' => $this->cause_id,
            'oshTrainingRelatedToOccupation_id' => $this->oshTrainingRelatedToOccupation_id,
            'injuryDate' => $this->injuryDate,
            'returnToWorkDate' => $this->returnToWorkDate,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
