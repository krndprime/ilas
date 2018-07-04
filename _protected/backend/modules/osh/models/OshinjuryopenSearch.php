<?php

namespace backend\modules\osh\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\osh\models\Oshinjuryopen;

/**
 * OshinjuryopenSearch represents the model behind the search form about `backend\modules\osh\models\Oshinjuryopen`.
 */
class OshinjuryopenSearch extends Oshinjuryopen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'document_id', 'country_id', 'sex_id', 'village_id', 'employer_id', 'occupation_id', 'experienceInThisEstablishment', 'injuryType_id', 'frequency_id', 'desease_id', 'accident_id', 'injuryCategory_id', 'partOfTheBody_id', 'cause_id', 'oshTrainingRelatedToOccupation_id', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['firstName', 'lastName', 'middleName', 'nid', 'dateOfBirth', 'phone', 'email', 'rssbNumber', 'startDate', 'endDate', 'injuryDate', 'returnToWorkDate', 'observation', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Oshinjuryopen::find();

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
            'document_id' => $this->document_id,
            'country_id' => $this->country_id,
            'dateOfBirth' => $this->dateOfBirth,
            'sex_id' => $this->sex_id,
            'village_id' => $this->village_id,
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

        $query->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'middleName', $this->middleName])
            ->andFilterWhere(['like', 'nid', $this->nid])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'rssbNumber', $this->rssbNumber])
            ->andFilterWhere(['like', 'observation', $this->observation])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
