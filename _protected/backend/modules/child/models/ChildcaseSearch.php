<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childcase;

/**
 * ChildcaseSearch represents the model behind the search form about `backend\modules\child\models\Childcase`.
 */
class ChildcaseSearch extends Childcase
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'childEmployment_id', 'childLabourForm_id', 'childLabourType_id', 'caseStatus_id', 'actionTaken_id', 'sanction_id', 'fineAmount', 'ussd_id', 'createdBy'], 'integer'],
            [['recommendation', 'reportingDate', 'actionTakenDate', 'createdOn'], 'safe'],
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
        $query = Childcase::find();

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
            'childEmployment_id' => $this->childEmployment_id,
            'childLabourForm_id' => $this->childLabourForm_id,
            'childLabourType_id' => $this->childLabourType_id,
            'caseStatus_id' => $this->caseStatus_id,
            'actionTaken_id' => $this->actionTaken_id,
            'sanction_id' => $this->sanction_id,
            'fineAmount' => $this->fineAmount,
            'reportingDate' => $this->reportingDate,
            'actionTakenDate' => $this->actionTakenDate,
            'ussd_id' => $this->ussd_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
        ]);

        $query->andFilterWhere(['like', 'recommendation', $this->recommendation]);

        return $dataProvider;
    }
}
