<?php

namespace backend\modules\supply\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupplyItem;

/**
 * SupplyItemSearch represents the model behind the search form of `common\models\SupplyItem`.
 */
class SupplyItemSearch extends SupplyItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'supply_item_type_id'], 'integer'],
            [['name', 'no'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SupplyItem::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'supply_item_type_id' => $this->supply_item_type_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'no', $this->no]);

        return $dataProvider;
    }
}
