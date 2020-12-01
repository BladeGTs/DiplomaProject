<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Инвентеризация продуктов на складе';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div id = 'w0' class ="grid-view">
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <th ><a>Штрих-код</a></th>
                    <th >Название</th>
                    <th >Остаток</th>
                    <th >Единицы измерения</th>
                    <th >Стоимость</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($inventarization as $inv): ?>
                    <tr>
                        <td><?php echo $inv['barcode'] ?></td>
                        <td><?php echo Html::encode($inv['Name']); ?></td>
                        <td><?php echo Html::encode($inv['summ']); ?></td>
                        <td><?php echo Html::encode($inv['Units']); ?></td>
                        <td><?php echo Html::encode($inv['Стоимость']); ?></td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
                
        </table>
    </div>

</div>
