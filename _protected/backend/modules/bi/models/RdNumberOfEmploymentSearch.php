<?php

namespace backend\modules\bi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\bi\models\RdNumberOfEmployment;

/**
 * RdNumberOfEmploymentSearch represents the model behind the search form about `backend\modules\bi\models\RdNumberOfEmployment`.
 */
class RdNumberOfEmploymentSearch extends RdNumberOfEmployment
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'startEmploymentYear', 'closingYear', 'closingMonth', 'numberOfEmployer', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['startEmploymentQuarter', 'agegroup', 'employeeProvince', 'employeeDistrict', 'employeeGeosector', 'employeeCell', 'employeeVillage', 'employerType', 'employerProvice', 'employerDistrict', 'employerGeosector', 'employerCell', 'employerVillage', 'ownership', 'ecosector', 'employerStatus', 'occupation', 'experienceagegroup'], 'safe'],
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
        $query = RdNumberOfEmployment::find();

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
            'closingYear' => $this->closingYear,
            'closingMonth' => $this->closingMonth,
            'numberOfEmployer' => $this->numberOfEmployer,
            'numberOfFemaleEmployee' => $this->numberOfFemaleEmployee,
            'numberOfMaleEmployee' => $this->numberOfMaleEmployee,
        ]);

        $query->andFilterWhere(['like', 'startEmploymentQuarter', $this->startEmploymentQuarter])
            ->andFilterWhere(['like', 'agegroup', $this->agegroup])
            ->andFilterWhere(['like', 'employeeProvince', $this->employeeProvince])
            ->andFilterWhere(['like', 'employeeDistrict', $this->employeeDistrict])
            ->andFilterWhere(['like', 'employeeGeosector', $this->employeeGeosector])
            ->andFilterWhere(['like', 'employeeCell', $this->employeeCell])
            ->andFilterWhere(['like', 'employeeVillage', $this->employeeVillage])
            ->andFilterWhere(['like', 'employerType', $this->employerType])
            ->andFilterWhere(['like', 'employerProvice', $this->employerProvice])
            ->andFilterWhere(['like', 'employerDistrict', $this->employerDistrict])
            ->andFilterWhere(['like', 'employerGeosector', $this->employerGeosector])
            ->andFilterWhere(['like', 'employerCell', $this->employerCell])
            ->andFilterWhere(['like', 'employerVillage', $this->employerVillage])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'ecosector', $this->ecosector])
            ->andFilterWhere(['like', 'employerStatus', $this->employerStatus])
            ->andFilterWhere(['like', 'occupation', $this->occupation])
            ->andFilterWhere(['like', 'experienceagegroup', $this->experienceagegroup]);

        return $dataProvider;
    }
}
