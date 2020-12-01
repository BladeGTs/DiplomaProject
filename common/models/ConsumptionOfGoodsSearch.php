<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ConsumptionOfGoods;

/**
 * ConsumptionOfGoodsSearch represents the model behind the search form of `common\models\ConsumptionOfGoods`.
 */
class ConsumptionOfGoodsSearch extends ConsumptionOfGoods
{
    
    public $RecipientsName;
    public $fullNameReceived;
    public $fullNameArrived;
    public $products;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_consumption', 'recipient_name', 'fullname_received', 'fullname_delivered'], 'integer'],
            [['agreement_number', 'power_of_Attorney_Date', 'date_of_consumption_of_goods_from_stock','RecipientsName','fullNameReceived','fullNameArrived','products'], 'safe'],
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
        $query = ConsumptionOfGoods::find();
       // $query->joinWith(['nameReceived']);
        $query->joinWith(['recipientsName']);
        $query->joinWith(['nameDelivered']);
        $query->joinWith(['products']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
                $dataProvider->sort->attributes['RecipientsName'] = [
            'asc' => [Recipients::tableName() . '.recipient_name' => SORT_ASC],
            'desc' => [Recipients::tableName() . '.recipient_name' => SORT_DESC],
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
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
        'ID_consumption' => $this->ID_consumption,
        'recipient_name' => $this->recipient_name,
        'power_of_Attorney_Date' => $this->power_of_Attorney_Date,
        'fullname_received' => $this->fullname_received,
        'fullname_delivered' => $this->fullname_delivered,
        'date_of_consumption_of_goods_from_stock' => $this->date_of_consumption_of_goods_from_stock,
        ])
        ->andFilterWhere(['like', Recipients::tableName() . '.recipient_name', $this->RecipientsName])
        ->andFilterWhere(['like', Employee::tableName() . '.first_name', $this->fullNameReceived])
        ->orFilterWhere(['like', Employee::tableName() . '.last_name', $this->fullNameReceived])
        ->andFilterWhere(['like', Employee::tableName() . '.first_name', $this->fullNameArrived])
        ->orFilterWhere(['like', Employee::tableName() . '.last_name', $this->fullNameArrived])
        ->andFilterWhere(['like', Product::tableName() . '.Name', $this->products]);

        $query->andFilterWhere(['like', 'agreement_number', $this->agreement_number]);

        return $dataProvider;
    }
}
