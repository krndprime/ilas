<?php

namespace backend\models;

use Yii;
use frontend\models\Sinjurycause;

/**
 * This is the model class for table "{{%s_desease}}".
 *
 * @property int $id Unique Identifier
 * @property int $injurycause_id Injury cause
 * @property string $desease deseases
 *
 * @property SInjurycause $injurycause
 */
class Sdesease extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%s_desease}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'injurycause_id'], 'required'],
            [['id', 'injurycause_id'], 'integer'],
            [['desease'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['injurycause_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sinjurycause::className(), 'targetAttribute' => ['injurycause_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'injurycause_id' => Yii::t('app', 'Injury cause'),
            'desease' => Yii::t('app', 'Desease'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInjurycause()
    {
        return $this->hasOne(Sinjurycause::className(), ['id' => 'injurycause_id']);
    }
}
