<?php

namespace backend\modules\audit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\audit\models\AuditSection;

/**
 * AuditSectionSearch represents the model behind the search form about `backend\modules\audit\models\AuditSection`.
 */
class AuditSectionSearch extends AuditSection
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'module_id'], 'integer'],
            [['section'], 'safe'],
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
        $query = AuditSection::find();

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
            'module_id' => $this->module_id,
        ]);

        $query->andFilterWhere(['like', 'section', $this->section]);

        return $dataProvider;
    }
}
