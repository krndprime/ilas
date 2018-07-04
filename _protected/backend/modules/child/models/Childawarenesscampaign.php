<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Sgeosector;
use backend\models\Schidorganiser;
use backend\models\Schildtargetgroup;


/**
 * This is the model class for table "{{%child_awarenesscampaign}}".
 *
 * @property int $id
 * @property string $topic
 * @property string $startDate
 * @property string $endDate
 * @property int $targetGroup_id
 * @property int $expectedNumberOfParticipants
 * @property int $geosector_id
 * @property int $orgernisor_id
 *
 * @property SGeosector $geosector
 * @property SChidorganiser $orgernisor
 * @property SChildtargetgroup $targetGroup
 */
class Childawarenesscampaign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_awarenesscampaign}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['startDate', 'endDate'], 'safe'],
            [['targetGroup_id', 'expectedNumberOfParticipants', 'geosector_id', 'orgernisor_id'], 'integer'],
            [['topic'], 'string', 'max' => 255],
            [['geosector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sgeosector::className(), 'targetAttribute' => ['geosector_id' => 'id']],
            [['orgernisor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schidorganiser::className(), 'targetAttribute' => ['orgernisor_id' => 'id']],
            [['targetGroup_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schildtargetgroup::className(), 'targetAttribute' => ['targetGroup_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'topic' => Yii::t('app', 'Topic'),
            'startDate' => Yii::t('app', 'Start date'),
            'endDate' => Yii::t('app', 'End date'),
            'targetGroup_id' => Yii::t('app', 'Target group'),
            'expectedNumberOfParticipants' => Yii::t('app', 'Expected number of participants'),
            'geosector_id' => Yii::t('app', 'Geo sector'),
            'orgernisor_id' => Yii::t('app', 'Orgernisor'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeosector()
    {
        return $this->hasOne(Sgeosector::className(), ['id' => 'geosector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrgernisor()
    {
        return $this->hasOne(Schidorganiser::className(), ['id' => 'orgernisor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTargetGroup()
    {
        return $this->hasOne(Schildtargetgroup::className(), ['id' => 'targetGroup_id']);
    }
}
