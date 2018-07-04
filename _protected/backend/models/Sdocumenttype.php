<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%s_documenttype}}".
 *
 * @property int $id
 * @property string $documenttype
 */
class Sdocumenttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_documenttype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documenttype'], 'required'],
            [['documenttype'], 'string', 'max' => 100],
            [['documenttype'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'documenttype' => Yii::t('app', 'Documenttype'),
        ];
    }
}
