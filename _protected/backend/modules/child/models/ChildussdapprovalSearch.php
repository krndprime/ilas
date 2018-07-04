<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childussdapproval;

/**
 * ChildussdapprovalSearch represents the model behind the search form about `backend\modules\child\models\Childussdapproval`.
 */
class ChildussdapprovalSearch extends Childussdapproval
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'childUssd_id', 'childUssdAction_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['comment', 'createdOn', 'deletedOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Childussdapproval::find();

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
            'childUssd_id' => $this->childUssd_id,
            'childUssdAction_id' => $this->childUssdAction_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
