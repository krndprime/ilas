<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\socialdialogue\models\Socialcelloctivebargainingagreement;

/**
 * SocialcelloctivebargainingagreementSearch represents the model behind the search form about `backend\modules\socialdialogue\models\Socialcelloctivebargainingagreement`.
 */
class SocialcelloctivebargainingagreementSearch extends Socialcelloctivebargainingagreement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'company_id', 'bargainingagreementstatus_id', 'createdBy', 'deletedFrag', 'deletedBy', 'updatedBy'], 'integer'],
            [['collectiveBargainingAgreement', 'startDate', 'endDate', 'createdOn', 'deletedOn', 'deletedReason', 'updatedOn'], 'safe'],
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
        $query = Socialcelloctivebargainingagreement::find();

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
            'company_id' => $this->company_id,
            'bargainingagreementstatus_id' => $this->bargainingagreementstatus_id,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deletedFrag' => $this->deletedFrag,
            'deletedBy' => $this->deletedBy,
            'deletedOn' => $this->deletedOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'collectiveBargainingAgreement', $this->collectiveBargainingAgreement])
            ->andFilterWhere(['like', 'deletedReason', $this->deletedReason]);

        return $dataProvider;
    }
}
