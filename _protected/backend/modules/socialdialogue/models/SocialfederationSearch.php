<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\socialdialogue\models\Socialfederation;

/**
 * SocialfederationSearch represents the model behind the search form about `backend\modules\socialdialogue\models\Socialfederation`.
 */
class SocialfederationSearch extends Socialfederation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'confederation_id', 'village_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],
            [['federation', 'startDate', 'federationRepresentativeNames', 'federationRepresentativePhone', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Socialfederation::find();

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
            'confederation_id' => $this->confederation_id,
            'startDate' => $this->startDate,
            'village_id' => $this->village_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFrag' => $this->deletedFrag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'federation', $this->federation])
            ->andFilterWhere(['like', 'federationRepresentativeNames', $this->federationRepresentativeNames])
            ->andFilterWhere(['like', 'federationRepresentativePhone', $this->federationRepresentativePhone])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
