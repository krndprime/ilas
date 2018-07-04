<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\socialdialogue\models\Socialconfederation;

/**
 * SocialconfederationSearch represents the model behind the search form about `backend\modules\socialdialogue\models\Socialconfederation`.
 */
class SocialconfederationSearch extends Socialconfederation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'village_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],
            [['confederation', 'startDate', 'confederationRepresentativeNames', 'confederationRepresentativePhone', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Socialconfederation::find();

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
            'village_id' => $this->village_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFrag' => $this->deletedFrag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'confederation', $this->confederation])
            ->andFilterWhere(['like', 'confederationRepresentativeNames', $this->confederationRepresentativeNames])
            ->andFilterWhere(['like', 'confederationRepresentativePhone', $this->confederationRepresentativePhone])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
