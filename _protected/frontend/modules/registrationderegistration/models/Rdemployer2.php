<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use backend\models\Sownership;
use backend\models\Semployertype;
use backend\models\Sregistrationauthority;
use common\models\User;
use backend\modules\registrationderegistration\models\Rdemployment;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%rd_employer}}".
 *
 * @property int $id
 * @property string $companyName
 * @property int $parent
 * @property int $child
 * @property int $employerType_id
 * @property string $openingDate
 * @property int $registrationAuthority_id
 * @property string $tin
 * @property string $rssbNumber
 * @property int $ownership_id
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property AuditAnswer[] $auditAnswers
 * @property AuditSummary[] $auditSummaries
 * @property InspectionAnswer[] $inspectionAnswers
 * @property SEmployertype $employerType
 * @property SRegistrationauthority $registrationAuthority
 * @property SOwnership $ownership
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Rdemployer2 extends \yii\db\ActiveRecord
{
    public $typeemployer;
    public $authorityregistration;
    public $category;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['parent', 'child', 'employerType_id', 'registrationAuthority_id', 'ownership_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['openingDate', 'createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['companyName'], 'string', 'max' => 45],
            [['tin', 'rssbNumber'], 'string', 'max' => 10],
            [['companyName'], 'unique'],
            [['companyName','employerType_id','ownership_id'], 'required'],
            [['employerType_id'], 'exist', 'skipOnError' => true, 'targetClass' => Semployertype::className(), 'targetAttribute' => ['employerType_id' => 'id']],
            [['registrationAuthority_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sregistrationauthority::className(), 'targetAttribute' => ['registrationAuthority_id' => 'id']],
            [['ownership_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sownership::className(), 'targetAttribute' => ['ownership_id' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
            [['deletedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['deletedBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updatedBy' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'companyName' => Yii::t('app', 'Name'),
            'parent' => Yii::t('app', 'Parent'),
            'child' => Yii::t('app', 'Child'),
            'employerType_id' => Yii::t('app', 'Type'),
            'openingDate' => Yii::t('app', 'Opening date'),
            'registrationAuthority_id' => Yii::t('app', 'Registration authority'),
            'tin' => Yii::t('app', 'TIN number'),
            'rssbNumber' => Yii::t('app', 'RSSB number'),
            'ownership_id' => Yii::t('app', 'Category'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'typeemployer' => Yii::t('app', 'Type'),
            'authorityregistration' => Yii::t('app', 'Registration authority'),
            'category' => Yii::t('app', 'Category'),

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployerType()
    {
        return $this->hasOne(Semployertype::className(), ['id' => 'employerType_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrationAuthority()
    {
        return $this->hasOne(Sregistrationauthority::className(), ['id' => 'registrationAuthority_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnership()
    {
        return $this->hasOne(Sownership::className(), ['id' => 'ownership_id']);
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
    public function getDeletedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'deletedBy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'updatedBy']);
    }
    public static function employers()
    {
        $RdemployerData = ArrayHelper::map(Rdemployer::find()->all(),'id','companyName');
        $RdemployerData[0] = 'Other';

        return  $RdemployerData;     
        
    }
}
