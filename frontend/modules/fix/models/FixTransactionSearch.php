<?php

namespace frontend\modules\fix\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FixTransaction;

/**
 * FixTransactionSearch represents the model behind the search form of `common\models\FixTransaction`.
 */
class FixTransactionSearch extends FixTransaction
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'supply_item_id', 'transaction_at', 'transaction_by', 'get_by', 'get_at', 'fix_by', 'fix_at', 'fix_status_id'], 'integer'],
            [['detail', 'result', 'remark'], 'safe'],
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
        $query = FixTransaction::find();

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
            'supply_item_id' => $this->supply_item_id,
            'transaction_at' => $this->transaction_at,
            'transaction_by' => $this->transaction_by,
            'get_by' => $this->get_by,
            'get_at' => $this->get_at,
            'fix_by' => $this->fix_by,
            'fix_at' => $this->fix_at,
            'fix_status_id' => $this->fix_status_id,
        ]);

        $query->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'result', $this->result])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
