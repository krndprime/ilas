<?php

namespace backend\modules\socialdialogue\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\socialdialogue\models\Socialtradeunion;

/**
 * SocialtradeunionSearch represents the model behind the search form about `backend\modules\socialdialogue\models\Socialtradeunion`.
 */
class SocialtradeunionSearch extends Socialtradeunion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'federationAffiliation_id', 'village_id', 'registeredByMIFOTRA_id', 'createdBy', 'deleteFlag', 'deleteBy', 'updatedBy'], 'integer'],
            [['tradeUnionName', 'tradeUnionStartDate', 'tradeUnionRepresentativeNames', 'tradeUnionRepresentativePhone', 'createdOn', 'deleteOn', 'deleteReason', 'updatedOn'], 'safe'],
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
        $query = Socialtradeunion::find();

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
            'federationAffiliation_id' => $this->federationAffiliation_id,
            'tradeUnionStartDate' => $this->tradeUnionStartDate,
            'village_id' => $this->village_id,
            'registeredByMIFOTRA_id' => $this->registeredByMIFOTRA_id,
            'createdBy' => $this->createdBy,
            'createdOn' => $this->createdOn,
            'deleteFlag' => $this->deleteFlag,
            'deleteBy' => $this->deleteBy,
            'deleteOn' => $this->deleteOn,
            'updatedBy' => $this->updatedBy,
            'updatedOn' => $this->updatedOn,
        ]);

        $query->andFilterWhere(['like', 'tradeUnionName', $this->tradeUnionName])
            ->andFilterWhere(['like', 'tradeUnionRepresentativeNames', $this->tradeUnionRepresentativeNames])
            ->andFilterWhere(['like', 'tradeUnionRepresentativePhone', $this->tradeUnionRepresentativePhone])
            ->andFilterWhere(['like', 'deleteReason', $this->deleteReason]);

        return $dataProvider;
    }
}
