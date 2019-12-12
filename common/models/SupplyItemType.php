<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "supply_item_type".
 *
 * @property int $id
 * @property string $name ประเภทครุภัณฑ์
 *
 * @property SupplyItem[] $supplyItems
 */
class SupplyItemType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supply_item_type';
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
            'name' => 'ประเภทครุภัณฑ์',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyItems()
    {
        return $this->hasMany(SupplyItem::className(), ['supply_item_type_id' => 'id']);
    }
}
