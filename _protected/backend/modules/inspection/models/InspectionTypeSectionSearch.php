<?php

namespace backend\modules\inspection\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\inspection\models\InspectionTypeSection;

/**
 * InspectionTypeSectionSearch represents the model behind the search form about `backend\modules\inspection\models\InspectionTypeSection`.
 */
class InspectionTypeSectionSearch extends InspectionTypeSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'inspection_id', 'section_id', 'created_by'], 'integer'],
            [['created_on'], 'safe'],
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
        $query = InspectionTypeSection::find();

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
            'inspection_id' => $this->inspection_id,
            'section_id' => $this->section_id,
            'created_by' => $this->created_by,
            'created_on' => $this->created_on,
        ]);

        return $dataProvider;
    }
}
