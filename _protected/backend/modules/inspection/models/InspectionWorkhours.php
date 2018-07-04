<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_workhours}}".
 *
 * @property int $id
 * @property string $workhours
 */
class InspectionWorkhours extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_workhours}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workhours'], 'required'],
            [['workhours'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'workhours' => Yii::t('app', 'Workhours'),
        ];
    }
}
