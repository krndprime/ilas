<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Schildactiontaken;
use backend\models\Scasestatus;
use backend\models\Schildlabourform;
use backend\models\Schildlabourtype;
use backend\models\Ssanction;
use common\models\User;

/**
 * This is the model class for table "{{%child_case}}".
 *
 * @property int $id
 * @property int $childEmployment_id
 * @property int $childLabourForm_id
 * @property int $childLabourType_id
 * @property int $caseStatus_id
 * @property int $actionTaken_id
 * @property string $recommendation
 * @property int $sanction_id
 * @property int $fineAmount
 * @property string $reportingDate When happened
 * @property string $actionTakenDate When the action was taken
 * @property int $ussd_id
 * @property int $createdBy
 * @property string $createdOn
 *
 * @property ChildUssd $ussd
 * @property User $createdBy0
 * @property ChildEmployment $childEmployment
 * @property SChildactiontaken $actionTaken
 * @property SCasestatus $caseStatus
 * @property SChildlabourform $childLabourForm
 * @property SChildlabourtype $childLabourType
 * @property SSanction $sanction
 */
class Childcase2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_case}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['childEmployment_id', 'childLabourForm_id', 'childLabourType_id', 'caseStatus_id', 'actionTaken_id', 'sanction_id', 'fineAmount', 'ussd_id', 'createdBy'], 'integer'],
            [['recommendation'], 'string'],
            // [['childLabourForm_id','childLabourType_id','caseStatus_id','actionTaken_id','sanction_id','ussd_id'], 'required'],
            [['reportingDate', 'actionTakenDate', 'createdOn'], 'safe'],
            [['ussd_id'], 'exist', 'skipOnError' => true, 'targetClass' => Childussd::className(), 'targetAttribute' => ['ussd_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['childEmployment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Childemployment::className(), 'targetAttribute' => ['childEmployment_id' => 'id']],
            [['actionTaken_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schildactiontaken::className(), 'targetAttribute' => ['actionTaken_id' => 'id']],
            [['caseStatus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Scasestatus::className(), 'targetAttribute' => ['caseStatus_id' => 'id']],
            [['childLabourForm_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schildlabourform::className(), 'targetAttribute' => ['childLabourForm_id' => 'id']],
            [['childLabourType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Schildlabourtype::className(), 'targetAttribute' => ['childLabourType_id' => 'id']],
            [['sanction_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ssanction::className(), 'targetAttribute' => ['sanction_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'childEmployment_id' => Yii::t('app', 'Employment'),
            'childLabourForm_id' => Yii::t('app', 'Form of child labour'),
            'childLabourType_id' => Yii::t('app', 'Child activity'),
            'caseStatus_id' => Yii::t('app', 'Case status'),
            'actionTaken_id' => Yii::t('app', 'Action taken'),
            'recommendation' => Yii::t('app', 'Observation'),
            'sanction_id' => Yii::t('app', 'Sanction'),
            'fineAmount' => Yii::t('app', 'Fine amount'),
            'reportingDate' => Yii::t('app', 'Reporting date'),
            'actionTakenDate' => Yii::t('app', 'Action taken date'),
            'ussd_id' => Yii::t('app', 'Ussd reporting'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUssd()
    {
        return $this->hasOne(Childussd::className(), ['id' => 'ussd_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildEmployment()
    {
        return $this->hasOne(Childemployment::className(), ['id' => 'childEmployment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionTaken()
    {
        return $this->hasOne(Schildactiontaken::className(), ['id' => 'actionTaken_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCaseStatus()
    {
        return $this->hasOne(Scasestatus::className(), ['id' => 'caseStatus_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildLabourForm()
    {
        return $this->hasOne(Schildlabourform::className(), ['id' => 'childLabourForm_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildLabourType()
    {
        return $this->hasOne(Schildlabourtype::className(), ['id' => 'childLabourType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSanction()
    {
        return $this->hasOne(Ssanction::className(), ['id' => 'sanction_id']);
    }
}
