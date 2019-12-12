<?php
namespace frontend\models;

class BmiForm extends \yii\base\Model
{
    public $height;
    public $weight;

    public function rules()
    {
        return [
            [['height', 'weight'], 'required'],
            [['height', 'weight'], 'number']
        ]; 
    }

    public function attributeLabels()
    {
        return [
            'height' => 'ส่วนสูง (เมตร)',
            'weight' => 'น้ำหนัก (กิโลกรัม)',
        ];
    }
}