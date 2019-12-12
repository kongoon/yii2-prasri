<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fix_transaction".
 *
 * @property int $id
 * @property int $supply_item_id ครุภัณฑ์
 * @property int $transaction_at วันที่แจ้ง
 * @property int $transaction_by
 * @property string $detail อาการ
 * @property string|null $result ผลการซ่อม
 * @property int|null $get_by รับงานโดย
 * @property int|null $get_at รับงานเมื่อ
 * @property int|null $fix_by ซ่อมโดย
 * @property int|null $fix_at ซ่อมเมื่อ
 * @property int $fix_status_id
 * @property string|null $remark หมายเหตุ
 *
 * @property FixStatus $fixStatus
 * @property SupplyItem $supplyItem
 * @property User $transactionBy
 * @property User $getBy
 * @property User $fixBy
 */
class FixTransaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fix_transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supply_item_id', 'transaction_at', 'transaction_by', 'detail', 'fix_status_id'], 'required'],
            [['supply_item_id', 'transaction_at', 'transaction_by', 'get_by', 'get_at', 'fix_by', 'fix_at', 'fix_status_id'], 'integer'],
            [['detail', 'result', 'remark'], 'string'],
            [['fix_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => FixStatus::className(), 'targetAttribute' => ['fix_status_id' => 'id']],
            [['supply_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => SupplyItem::className(), 'targetAttribute' => ['supply_item_id' => 'id']],
            [['transaction_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['transaction_by' => 'id']],
            [['get_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['get_by' => 'id']],
            [['fix_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['fix_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supply_item_id' => 'ครุภัณฑ์',
            'transaction_at' => 'วันที่แจ้ง',
            'transaction_by' => 'Transaction By',
            'detail' => 'อาการ',
            'result' => 'ผลการซ่อม',
            'get_by' => 'รับงานโดย',
            'get_at' => 'รับงานเมื่อ',
            'fix_by' => 'ซ่อมโดย',
            'fix_at' => 'ซ่อมเมื่อ',
            'fix_status_id' => 'Fix Status ID',
            'remark' => 'หมายเหตุ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixStatus()
    {
        return $this->hasOne(FixStatus::className(), ['id' => 'fix_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupplyItem()
    {
        return $this->hasOne(SupplyItem::className(), ['id' => 'supply_item_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionBy()
    {
        return $this->hasOne(User::className(), ['id' => 'transaction_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGetBy()
    {
        return $this->hasOne(User::className(), ['id' => 'get_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFixBy()
    {
        return $this->hasOne(User::className(), ['id' => 'fix_by']);
    }
}
