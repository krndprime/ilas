<?php

namespace backend\modules\child\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\child\models\Childussd;

/**
 * ChildussdSearch represents the model behind the search form about `backend\modules\child\models\Childussd`.
 */
class ChildussdSearch extends Childussd
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'reporter_id', 'sex_id', 'status_id', 'reported'], 'integer'],
            [['childNames', 'dateOfBirth', 'location', 'employerNames'], 'safe'],
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
        $query = Childussd::find()->Where('reported = 0');

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
            'reporter_id' => $this->reporter_id,
            'dateOfBirth' => $this->dateOfBirth,
            'sex_id' => $this->sex_id,
            'status_id' => $this->status_id,
            'reported' => $this->reported,
        ]);

        $query->andFilterWhere(['like', 'childNames', $this->childNames])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'employerNames', $this->employerNames]);

        return $dataProvider;
    }
}
