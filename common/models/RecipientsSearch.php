<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Recipients;

/**
 * RecipientsSearch represents the model behind the search form of `frontend\models\Recipients`.
 */
class RecipientsSearch extends Recipients
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRecipients'], 'integer'],
            [['recipient_name', 'inn', 'legal_address', 'phone_number', 'contac_person'], 'safe'],
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
        $query = Recipients::find();

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
            'idRecipients' => $this->idRecipients,
        ]);

        $query->andFilterWhere(['like', 'recipient_name', $this->recipient_name])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'legal_address', $this->legal_address])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'contac_person', $this->contac_person]);

        return $dataProvider;
    }
}
