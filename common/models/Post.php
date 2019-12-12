<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name หัวข้อ
 * @property string $body รายละเอียด
 * @property int|null $created_at เพิ่มเมื่อ
 * @property int|null $updated_at แก้ไขเมื่อ
 * @property int|null $created_by เพิ่มโดย
 * @property int|null $updated_by แก้ไขโดย
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Post extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'body'], 'required'],
            [['body'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'หัวข้อ',
            'body' => 'รายละเอียด',
            'created_at' => 'เพิ่มเมื่อ',
            'updated_at' => 'แก้ไขเมื่อ',
            'created_by' => 'เพิ่มโดย',
            'updated_by' => 'แก้ไขโดย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
