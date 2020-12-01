<?php

namespace backend\modules\employee\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Employee;

/**
 * EmployeeSearch represents the model behind the search form of `common\models\Employee`.
 */
class EmployeeSearch extends Employee
{
    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idworker'], 'integer'],
            [['first_name', 'middle_name', 'last_name', 'birthday', 'city', 'id_code', 'email', 'phone'], 'safe'],
            [['createTimeRange'], 'match', 'pattern' => '/^.+\s\-\s.+$/'],
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
        $query = Employee::find();

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
            if ($this->createTimeRange) {
            $dateStart = new \DateTime($this->createTimeStart);
            $dateEnd = new \DateTime($this->createTimeEnd);
            $start = $dateStart->getTimestamp();
            $end = $dateEnd->getTimestamp();
            $query->andFilterWhere(['between', 'user.created_at', $start, $end]);
        }
        // grid filtering conditions
        $query->andFilterWhere([
            'idworker' => $this->idworker,
            'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'middle_name', $this->middle_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'id_code', $this->id_code])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone]);

        return $dataProvider;
    }
}
