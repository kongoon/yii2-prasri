<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fix_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property FixTransaction[] $fixTransactions
 */
class FixStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fix_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixTransactions()
    {
        return $this->hasMany(FixTransaction::className(), ['fix_status_id' => 'id']);
    }
}
