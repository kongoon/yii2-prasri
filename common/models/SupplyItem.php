<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supply_item".
 *
 * @property int $id
 * @property int $supply_item_type_id ประเภทครุภัณฑ์
 * @property int $is_ready สถานะ
 * @property string $name ชื่อครุภัณฑ์
 * @property string $no หมายเลขครุภัณฑ์
 *
 * @property FixTransaction[] $fixTransactions
 * @property SupplyItemType $supplyItemType
 */
class SupplyItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supply_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supply_item_type_id', 'name', 'no'], 'required'],
            [['supply_item_type_id', 'is_ready'], 'integer'],
            [['name'], 'string', 'max' => 300],
            [['no'], 'string', 'max' => 100],
            [['supply_item_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupplyItemType::className(), 'targetAttribute' => ['supply_item_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supply_item_type_id' => 'ประเภทครุภัณฑ์',
            'name' => 'ชื่อครุภัณฑ์',
            'no' => 'หมายเลขครุภัณฑ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixTransactions()
    {
        return $this->hasMany(FixTransaction::className(), ['supply_item_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyItemType()
    {
        return $this->hasOne(SupplyItemType::className(), ['id' => 'supply_item_type_id']);
    }
}
