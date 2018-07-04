<?php

namespace backend\modules\bi\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\bi\models\RdNumberOfUniqueEstablishment;

/**
 * RdNumberOfUniqueEstablishmentSearch represents the model behind the search form about `backend\modules\bi\models\RdNumberOfUniqueEstablishment`.
 */
class RdNumberOfUniqueEstablishmentSearch extends RdNumberOfUniqueEstablishment
{
    /**
     * @inheritdoc
     */
    public static function getDb() 
    {
       return Yii::$app->get('db2'); // second database
    }
    
    public function rules()
    {
        return [
            [['id', 'registrationYear', 'numberOfEmployer', 'numberOfFemaleEmployee', 'numberOfMaleEmployee'], 'integer'],
            [['registrationQuarter', 'province', 'district', 'geosector', 'cell', 'village', 'employerType', 'ownership', 'employerStatus'], 'safe'],
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
        $query = RdNumberOfUniqueEstablishment::find();

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
            'registrationYear' => $this->registrationYear,
            'numberOfEmployer' => $this->numberOfEmployer,
            'numberOfFemaleEmployee' => $this->numberOfFemaleEmployee,
            'numberOfMaleEmployee' => $this->numberOfMaleEmployee,
        ]);

        $query->andFilterWhere(['like', 'registrationQuarter', $this->registrationQuarter])
            ->andFilterWhere(['like', 'province', $this->province])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'geosector', $this->geosector])
            ->andFilterWhere(['like', 'cell', $this->cell])
            ->andFilterWhere(['like', 'village', $this->village])
            ->andFilterWhere(['like', 'employerType', $this->employerType])
            ->andFilterWhere(['like', 'ownership', $this->ownership])
            ->andFilterWhere(['like', 'employerStatus', $this->employerStatus]);

        return $dataProvider;
    }
}
