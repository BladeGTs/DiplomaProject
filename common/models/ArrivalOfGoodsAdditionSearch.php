<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ArrivalOfGoodsAddition;

/**
 * ArrivalOfGoodsAdditionSearch represents the model behind the search form of `common\models\ArrivalOfGoodsAddition`.
 */
class ArrivalOfGoodsAdditionSearch extends ArrivalOfGoodsAddition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Idarrival', 'Idproduct', 'quantity_of_goods'], 'integer'],
            [['unit_price'], 'safe'],
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
        $query = ArrivalOfGoodsAddition::find()->where(['quantity_of_goods'=>null])->orWhere(['unit_price'=>null]);

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
            'Idarrival' => $this->Idarrival,
            'Idproduct' => $this->Idproduct,
            'quantity_of_goods' => $this->quantity_of_goods,
        ]);

        $query->andFilterWhere(['like', 'unit_price', $this->unit_price]);

        return $dataProvider;
    }
}
