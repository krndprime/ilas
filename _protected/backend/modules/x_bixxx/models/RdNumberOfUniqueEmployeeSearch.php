<?php

namespace backend\modules\bi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\bi\models\RdNumberOfUniqueEmployee;

/**
 * RdNumberOfUniqueEmployeeSearch represents the model behind the search form about `backend\modules\bi\models\RdNumberOfUniqueEmployee`.
 */
class RdNumberOfUniqueEmployeeSearch extends RdNumberOfUniqueEmployee
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'startEmploymentYear', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['startEmploymentQuarter', 'agegroup', 'employeeProvince', 'employeeDistrict', 'employeeGeosector', 'employeeCell', 'employeeVillage'], 'safe'],
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
        $query = RdNumberOfUniqueEmployee::find();

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
            'startEmploymentYear' => $this->startEmploymentYear,
            'numberOfFemaleEmployee' => $this->numberOfFemaleEmployee,
            'numberOfMaleEmployee' => $this->numberOfMaleEmployee,
        ]);

        $query->andFilterWhere(['like', 'startEmploymentQuarter', $this->startEmploymentQuarter])
            ->andFilterWhere(['like', 'agegroup', $this->agegroup])
            ->andFilterWhere(['like', 'employeeProvince', $this->employeeProvince])
            ->andFilterWhere(['like', 'employeeDistrict', $this->employeeDistrict])
            ->andFilterWhere(['like', 'employeeGeosector', $this->employeeGeosector])
            ->andFilterWhere(['like', 'employeeCell', $this->employeeCell])
            ->andFilterWhere(['like', 'employeeVillage', $this->employeeVillage]);

        return $dataProvider;
    }
}
