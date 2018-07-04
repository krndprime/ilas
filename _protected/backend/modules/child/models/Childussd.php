<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Sussdstatus;
use backend\models\Ssex;
use common\models\User;

/**
 * This is the model class for table "{{%child_ussd}}".
 *
 * @property int $id
 * @property int $reporter_id
 * @property string $childNames
 * @property string $dateOfBirth Capture age from the front end, calculate DOB
 * @property int $sex_id
 * @property string $location
 * @property string $employerNames
 * @property int $status_id 1: Not yet reported2: Reported as a case3: Not a child labour case
 * @property int $reported
 *
 * @property ChildCase[] $childCases
 * @property Sussdstatus $status
 * @property Ssex $sex
 * @property User $reporter
 * @property ChildUssdapproval[] $childUssdapprovals
 */
class Childussd extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_ussd}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['reporter_id', 'sex_id', 'status_id', 'reported'], 'integer'],
            [['dateOfBirth'], 'safe'],
            [['childNames', 'employerNames'], 'string', 'max' => 45],
            [['location'], 'string', 'max' => 255],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sussdstatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ssex::className(), 'targetAttribute' => ['sex_id' => 'id']],
            [['reporter_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['reporter_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reporter_id' => Yii::t('app', 'Reporter'),
            'childNames' => Yii::t('app', 'Child names'),
            'dateOfBirth' => Yii::t('app', 'Date of birth'),
            'sex_id' => Yii::t('app', 'Sex'),            
            'location' => Yii::t('app', 'Location'),
            'employerNames' => Yii::t('app', 'Employer names'),
            'status_id' => Yii::t('app', 'Status'),
            'reported' => Yii::t('app', 'Reported'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildCases()
    {
        return $this->hasMany(ChildCase::className(), ['ussd_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Sussdstatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Ssex::className(), ['id' => 'sex_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReporter()
    {
        return $this->hasOne(User::className(), ['id' => 'reporter_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildUssdapprovals()
    {
        return $this->hasMany(Childussdapproval::className(), ['childUssd_id' => 'id']);
    }
}
