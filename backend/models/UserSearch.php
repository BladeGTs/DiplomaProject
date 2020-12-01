<?php

namespace backend\models;

use backend\models\User;
use yii\data\ActiveDataProvider;
use yii\base\Model;
use common\models\AuthAssignment;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserSearch
 * в
 * @author Дмитрий
 */
class UserSearch extends User {

    public $roleName;
    public $createTimeRange;
    public $createTimeStart;
    public $createTimeEnd;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['username'], 'string'],
            [['email'], 'string'],
            [['roleName'], 'string'],
            [['userName', 'email', 'created_at', 'roleName','createTimeRange','createTimeStart','createTimeEnd'], 'safe'],
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
        $query = User::find();
        $query->joinWith(['role']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['username'] = [
            'asc' => [User::tableName() . '.username' => SORT_ASC],
            'desc' => [User::tableName() . '.userName' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['email'] = [
            'asc' => [User::tableName() . '.email' => SORT_ASC],
            'desc' => [User::tableName() . '.email' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['roleName'] = [
            'asc' => [AuthAssignment::tableName() . '.item_name' => SORT_ASC],
            'desc' => [AuthAssignment::tableName() . '.item_name' => SORT_DESC],
        ];

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
        $query->andFilterWhere([])->andFilterWhere(['like', User::tableName() . '.username', $this->username])
                ->andFilterWhere(['like', User::tableName() . '.email', $this->email])
                ->andFilterWhere(['like', AuthAssignment::tableName() . '.item_name', $this->roleName]);


        return $dataProvider;
    }

}
