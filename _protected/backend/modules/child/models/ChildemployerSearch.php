<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childemployer;

/**
 * ChildemployerSearch represents the model behind the search form about `backend\modules\child\models\Childemployer`.
 */
class ChildemployerSearch extends Childemployer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'document_id', 'country_id', 'sex_id', 'village_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['nid', 'firstName', 'lastName', 'middleName', 'dateOfBirth', 'phone', 'email', 'rssbNumber', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Childemployer::find();

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
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'nid', $this->nid])
            ->andFilterWhere(['like', 'firstName', $this->firstName])
            ->andFilterWhere(['like', 'lastName', $this->lastName])
            ->andFilterWhere(['like', 'middleName', $this->middleName])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'rssbNumber', $this->rssbNumber])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
