<?php

namespace backend\modules\registrationderegistration\models;

use Yii;
use backend\models\Smainecosector;
use backend\models\Sisicr4level4;


/**
 * This is the model class for table "{{%rd_employerecosector}}".
 *
 * @property int $id
 * @property int $employer_id
 * @property int $ecosector_id
 * @property int $mainecosector_id
 * @property string $startDate
 *
 * @property SMainecosector $mainecosector
 * @property RdEmployer $employer
 * @property SIsicr4Level4 $ecosector
 */
class Rdemployerecosector extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%rd_employerecosector}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employer_id', 'ecosector_id', 'mainecosector_id'], 'integer'],
            [['startDate'], 'safe'],
            [['ecosector_id','mainecosector_id','startDate'], 'required'],
            [['mainecosector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Smainecosector::className(), 'targetAttribute' => ['mainecosector_id' => 'id']],
            [['employer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rdemployer::className(), 'targetAttribute' => ['employer_id' => 'id']],
            [['ecosector_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sisicr4level4::className(), 'targetAttribute' => ['ecosector_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employer_id' => Yii::t('app', 'Employer'),
            'ecosector_id' => Yii::t('app', 'Economic activity'),
            'mainecosector_id' => Yii::t('app', 'Type of economic activity'),
            'startDate' => Yii::t('app', 'Starting Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMainecosector()
    {
        return $this->hasOne(Smainecosector::className(), ['id' => 'mainecosector_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Rdemployer::className(), ['id' => 'employer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEcosector()
    {
        return $this->hasOne(Sisicr4level4::className(), ['id' => 'ecosector_id']);
    }
    public function ecosectors($id)
    {
        return Rdemployerecosector::find()->where('employer_id=:u',['u'=>$id])->all();
        
    }
}
