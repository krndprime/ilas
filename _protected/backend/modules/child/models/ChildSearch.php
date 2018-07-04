<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Child;

/**
 * ChildSearch represents the model behind the search form about `backend\modules\child\models\Child`.
 */
class ChildSearch extends Child
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sex_id', 'edulevel_id', 'originDistrict_id', 'originSector_id', 'originCell_id', 'originVillage_id', 'relationship_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['childFirstName', 'childMiddleName', 'childLastName', 'dateOfBirth', 'guardianNames', 'contactPhone', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Child::find();

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
            'dateOfBirth' => $this->dateOfBirth,
            'sex_id' => $this->sex_id,
            'edulevel_id' => $this->edulevel_id,
            'originDistrict_id' => $this->originDistrict_id,
            'originSector_id' => $this->originSector_id,
            'originCell_id' => $this->originCell_id,
            'originVillage_id' => $this->originVillage_id,
            'relationship_id' => $this->relationship_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'childFirstName', $this->childFirstName])
            ->andFilterWhere(['like', 'childMiddleName', $this->childMiddleName])
            ->andFilterWhere(['like', 'childLastName', $this->childLastName])
            ->andFilterWhere(['like', 'guardianNames', $this->guardianNames])
            ->andFilterWhere(['like', 'contactPhone', $this->contactPhone])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
