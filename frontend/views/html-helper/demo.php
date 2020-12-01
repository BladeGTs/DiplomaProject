<?php
use yii\helpers\Html;
echo Html::tag('p', 'some text');
//echo Html::beginTag($name);

//echo Html::endTag($name);
$array =[
  '1'=>'Beirut',
    '2'=>'Berlin',
    '3'=>'Budapest',
    '4'=>'Rome',
];
 echo Html::dropDownList('city id', [],$array); //выпадающий список
 echo Html::radioList('city id', [],$array); //радио батоны
 echo Html::checkboxList('city id', [],$array); // Чек боксы
 echo Html::img('@images/burger.jpg',['alt'=>'Burger']);// Картинка