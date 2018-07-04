<?php

namespace backend\modules\child\models;

use Yii;
use backend\models\Svillage;
use common\models\User;
use backend\modules\child\models\Child;
/**
 * This is the model class for table "{{%child_found}}".
 *
 * @property int $id
 * @property int $child_id
 * @property int $foundVillage_id
 * @property string $location
 * @property int $createdBy
 * @property string $createdOn
 * @property int $deletedFlag
 * @property int $deletedBy
 * @property string $deletedOn
 * @property string $deleteReason
 * @property int $updatedBy
 * @property string $updatedOn
 *
 * @property Child $child
 * @property Svillage $foundVillage
 * @property User $createdBy0
 * @property User $deletedBy0
 * @property User $updatedBy0
 */
class Childfound extends \yii\db\ActiveRecord
{
    public $province_id;
    public $provincee_id;
    public $district_id;
    public $sector_id;
    public $cell_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%child_found}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['child_id', 'foundVillage_id', 'createdBy', 'deletedFlag', 'deletedBy', 'updatedBy'], 'integer'],
            [['createdOn', 'deletedOn', 'updatedOn'], 'safe'],
            [['deleteReason'], 'string'],
            [['location'], 'string', 'max' => 45],
            [['child_id'], 'exist', 'skipOnError' => true, 'targetClass' => Child::className(), 'targetAttribute' => ['child_id' => 'id']],
            [['foundVillage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Svillage::className(), 'targetAttribute' => ['foundVillage_id' => 'id']],
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
            'child_id' => Yii::t('app', 'Child'),
            'foundVillage_id' => Yii::t('app', 'Village'),
            'location' => Yii::t('app', 'Location'),
            'createdBy' => Yii::t('app', 'Created by'),
            'createdOn' => Yii::t('app', 'Created on'),
            'deletedFlag' => Yii::t('app', 'Deleted flag'),
            'deletedBy' => Yii::t('app', 'Deleted by'),
            'deletedOn' => Yii::t('app', 'Deleted on'),
            'deleteReason' => Yii::t('app', 'Delete reason'),
            'updatedBy' => Yii::t('app', 'Updated by'),
            'updatedOn' => Yii::t('app', 'Updated on'),
            'province_id' => Yii::t('app', 'Province'),
            'provincee_id' => Yii::t('app', 'Province'),
            'district_id' => Yii::t('app', 'District'),
            'sector_id' => Yii::t('app', 'Sector'), 
            'cell_id' => Yii::t('app', 'Cell'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChild()
    {
        return $this->hasOne(Child::className(), ['id' => 'child_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFoundVillage()
    {
        return $this->hasOne(Svillage::className(), ['id' => 'foundVillage_id']);
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
}
