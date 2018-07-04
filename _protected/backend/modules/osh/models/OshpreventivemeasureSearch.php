<?php

namespace backend\modules\osh\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\osh\models\Oshpreventivemeasure;

/**
 * OshpreventivemeasureSearch represents the model behind the search form about `backend\modules\osh\models\Oshpreventivemeasure`.
 */
class OshpreventivemeasureSearch extends Oshpreventivemeasure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'oshinjury_id', 'preventivemeasure_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Oshpreventivemeasure::find();

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
            'oshinjury_id' => $this->oshinjury_id,
            'preventivemeasure_id' => $this->preventivemeasure_id,
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
