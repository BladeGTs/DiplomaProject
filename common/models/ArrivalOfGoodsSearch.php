<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArrivalOfGoods;

/**
 * ArrivalOfGoodsSearch represents the model behind the search form of `frontend\models\ArrivalOfGoods`.
 */
class ArrivalOfGoodsSearch extends ArrivalOfGoods {

    public $providerName;
    public $fullNameReceived;
    public $fullNameArrived;
    public $products;
    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'supplier_name', 'fullname_delivered', 'fullname_received'], 'integer'],
            [['power_attorney_number', 'power_Attorney_Date', 'date_of_arrival_of_goods_to_the_warehouse', 'providerName', 'fullNameReceived', 'fullNameArrived', 'products', 'createTimeRange', 'createTimeStart', 'createTimeEnd'], 'safe'],
            [['createTimeRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = ArrivalOfGoods::find();
        $query->joinWith(['supplierName']);
        //$query->joinWith(['nameDelivered']);
        $query->joinWith(['nameReceived']);

        $query->joinWith(['products']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['providerName'] = [
            'asc' => [Provider::tableName() . '.supplier_name' => SORT_ASC],
            'desc' => [Provider::tableName() . '.supplier_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['fullNameReceived'] = [
            'asc' => [Employee::tableName() . '.first_name' => SORT_ASC],
            'desc' => [Employee::tableName() . '.first_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['fullNameArrived'] = [
            'asc' => [Employee::tableName() . '.first_name' => SORT_ASC],
            'desc' => [Employee::tableName() . '.first_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['products'] = [
            'asc' => [Product::tableName() . '.Name' => SORT_ASC],
            'desc' => [Product::tableName() . '.Name' => SORT_DESC],
        ];





        $this->load($params);
        if (!$this->validate()) {
            return $dataProvider;
        }
        if ($this->createTimeRange) {
             $query->andFilterWhere(['between', 'date_of_arrival_of_goods_to_the_warehouse', $this->createTimeStart, $this->createTimeEnd]);
        }
        $query->andFilterWhere([
                    'id' => $this->id,
                    'power_Attorney_Date' => $this->power_Attorney_Date,
                    'date_of_arrival_of_goods_to_the_warehouse' => $this->date_of_arrival_of_goods_to_the_warehouse,])
                ->andFilterWhere(['like', Provider::tableName() . '.supplier_name', $this->providerName])
                ->andFilterWhere(['like', Employee::tableName() . '.first_name', $this->fullNameReceived])
                ->orFilterWhere(['like', Employee::tableName() . '.last_name', $this->fullNameReceived])
                ->andFilterWhere(['like', Employee::tableName() . '.first_name', $this->fullNameArrived])
                ->orFilterWhere(['like', Employee::tableName() . '.last_name', $this->fullNameArrived])
                ->andFilterWhere(['like', Product::tableName() . '.Name', $this->products])
                ->andFilterWhere(['like', 'power_attorney_number', $this->power_attorney_number]);

        return $dataProvider;
    }

}
