<?php

namespace backend\modules\inspection\models;

use Yii;

/**
 * This is the model class for table "{{%inspection_salmodality}}".
 *
 * @property int $id
 * @property string $modality
 */
class InspectionSalmodality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inspection_salmodality}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['modality'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'modality' => Yii::t('app', 'Modality'),
        ];
    }
}
