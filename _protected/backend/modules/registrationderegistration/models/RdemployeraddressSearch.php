<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\registrationderegistration\models\Rdemployeraddress;

/**
 * RdemployeraddressSearch represents the model behind the search form about `backend\modules\registrationderegistration\models\Rdemployeraddress`.
 */
class RdemployeraddressSearch extends Rdemployeraddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employer_id', 'village_id', 'CreatedBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['emailAddress', 'phoneNumber', 'pobox', 'physicalAddress', 'CreatedOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Rdemployeraddress::find();

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
            'village_id' => $this->village_id,
            'CreatedBy' => $this->CreatedBy,
            'CreatedOn' => $this->CreatedOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'emailAddress', $this->emailAddress])
            ->andFilterWhere(['like', 'phoneNumber', $this->phoneNumber])
            ->andFilterWhere(['like', 'pobox', $this->pobox])
            ->andFilterWhere(['like', 'physicalAddress', $this->physicalAddress])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
