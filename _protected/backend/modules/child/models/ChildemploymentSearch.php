<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childemployment;

/**
 * ChildemploymentSearch represents the model behind the search form about `backend\modules\child\models\Childemployment`.
 */
class ChildemploymentSearch extends Childemployment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employerType_id', 'employer_id', 'child_id', 'occupation_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
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
        $query = Childemployment::find();

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
            'employerType_id' => $this->employerType_id,
            'employer_id' => $this->employer_id,
            'child_id' => $this->child_id,
            'occupation_id' => $this->occupation_id,
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
