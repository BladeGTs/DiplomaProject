<?php

namespace backend\modules\employee\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form of `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'barcode'], 'integer'],
            [['Name', 'Product_group', 'Units', 'Manufacturer_Name', 'Country_of_Origin'], 'safe'],
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
        $query = Product::find();

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
            'id_product' => $this->id_product,
            'barcode' => $this->barcode,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Product_group', $this->Product_group])
            ->andFilterWhere(['like', 'Units', $this->Units])
            ->andFilterWhere(['like', 'Manufacturer_Name', $this->Manufacturer_Name])
            ->andFilterWhere(['like', 'Country_of_Origin', $this->Country_of_Origin]);

        return $dataProvider;
    }
}
