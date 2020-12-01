<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
//аddress
$address = ArrayHelper::getColumn($employees, 'аddress'); //получить из массивыа определенное поле
echo implode(' ,', $address); // Объединение массива в строку

$array =[
  '1'=>'Beirut',
    '2'=>'Berlin',
    '3'=>'Budapest',
    '4'=>'Rome',
];
$listData = ArrayHelper::map($employees, 'idworker', 'аddress');
echo'<pre>';
print_r($listData);
echo'<pre>';
 echo Html::dropDownList('аddress', [],$listData);