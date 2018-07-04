<?php

namespace backend\modules\audit\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property int $status
 * @property string $auth_key
 * @property string $password_reset_token
 * @property string $account_activation_token
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Article[] $articles
 * @property AuditAnswer[] $auditAnswers
 * @property AuditAnswerinfo[] $auditAnswerinfos
 * @property AuditAudit[] $auditAudits
 * @property AuditQuestion[] $auditQuestions
 * @property AuditQuestionweight[] $auditQuestionweights
 * @property Child[] $children
 * @property Child[] $children0
 * @property Child[] $children1
 * @property ChildCase[] $childCases
 * @property ChildUssd[] $childUssds
 * @property InspectionInspection[] $inspectionInspections
 * @property RdEmployer[] $rdEmployers
 * @property RdEmployer[] $rdEmployers0
 * @property RdEmployer[] $rdEmployers1
 * @property SocialCelloctivebargainingagreement[] $socialCelloctivebargainingagreements
 * @property SocialCelloctivebargainingagreement[] $socialCelloctivebargainingagreements0
 * @property SocialCelloctivebargainingagreement[] $socialCelloctivebargainingagreements1
 * @property SocialFederation[] $socialFederations
 * @property SocialTradeunion[] $socialTradeunions
 * @property SocialTradeunion[] $socialTradeunions0
 * @property SocialTradeunion[] $socialTradeunions1
 * @property SocialVisitedcompany[] $socialVisitedcompanies
 * @property SocialVisitedcompany[] $socialVisitedcompanies0
 * @property SocialVisitedcompany[] $socialVisitedcompanies1
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password_hash', 'status', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'password_hash', 'password_reset_token', 'account_activation_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'status' => Yii::t('app', 'Status'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'account_activation_token' => Yii::t('app', 'Account Activation Token'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswers()
    {
        return $this->hasMany(AuditAnswer::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAnswerinfos()
    {
        return $this->hasMany(AuditAnswerinfo::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditAudits()
    {
        return $this->hasMany(AuditAudit::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditQuestions()
    {
        return $this->hasMany(AuditQuestion::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuditQuestionweights()
    {
        return $this->hasMany(AuditQuestionweight::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany(Child::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren0()
    {
        return $this->hasMany(Child::className(), ['deletedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren1()
    {
        return $this->hasMany(Child::className(), ['updatedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildUssds()
    {
        return $this->hasMany(ChildUssd::className(), ['reporter_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInspectionInspections()
    {
        return $this->hasMany(InspectionInspection::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers()
    {
        return $this->hasMany(RdEmployer::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers0()
    {
        return $this->hasMany(RdEmployer::className(), ['deletedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRdEmployers1()
    {
        return $this->hasMany(RdEmployer::className(), ['updatedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialCelloctivebargainingagreements()
    {
        return $this->hasMany(SocialCelloctivebargainingagreement::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialCelloctivebargainingagreements0()
    {
        return $this->hasMany(SocialCelloctivebargainingagreement::className(), ['deletedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialCelloctivebargainingagreements1()
    {
        return $this->hasMany(SocialCelloctivebargainingagreement::className(), ['updatedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialFederations()
    {
        return $this->hasMany(SocialFederation::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialTradeunions()
    {
        return $this->hasMany(SocialTradeunion::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialTradeunions0()
    {
        return $this->hasMany(SocialTradeunion::className(), ['deleteBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialTradeunions1()
    {
        return $this->hasMany(SocialTradeunion::className(), ['updatedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['createdBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies0()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['deletedBy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialVisitedcompanies1()
    {
        return $this->hasMany(SocialVisitedcompany::className(), ['updatedBy' => 'id']);
    }
}
