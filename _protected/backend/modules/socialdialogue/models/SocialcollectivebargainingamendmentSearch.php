<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\socialdialogue\models\Socialcollectivebargainingamendment;

/**
 * SocialcollectivebargainingamendmentSearch represents the model behind the search form about `backend\modules\socialdialogue\models\Socialcollectivebargainingamendment`.
 */
class SocialcollectivebargainingamendmentSearch extends Socialcollectivebargainingamendment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'collectiveBargainingAgreement_id', 'createdBy', 'createdOn', 'deletedFlag', 'deletedBy', 'deletedOn', 'deleteReason', 'updatedBy', 'updatedOn'], 'integer'],
            [['collectiveBargainingAmendment', 'startDate', 'endDate', 'Observation'], 'safe'],
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
        $query = Socialcollectivebargainingamendment::find();

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
            'collectiveBargainingAgreement_id' => $this->collectiveBargainingAgreement_id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFlag' => $this->deletedFlag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'deleteReason' => $this->deleteReason,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'collectiveBargainingAmendment', $this->collectiveBargainingAmendment])
            ->andFilterWhere(['like', 'Observation', $this->Observation]);

        return $dataProvider;
    }
}
