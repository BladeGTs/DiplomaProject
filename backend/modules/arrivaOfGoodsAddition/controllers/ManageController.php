<?php

namespace backend\modules\arrivaOfGoodsAddition\controllers;

use Yii;
use common\models\ArrivalOfGoodsAddition;
use common\models\ArrivalOfGoodsAdditionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManageController implements the CRUD actions for ArrivalOfGoodsAddition model.
 */
class ManageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArrivalOfGoodsAddition models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArrivalOfGoodsAdditionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArrivalOfGoodsAddition model.
     * @param integer $Idarrival
     * @param integer $Idproduct
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionView($Idarrival, $Idproduct)
//    {
//        return $this->render('view', [
//            'model' => $this->findModel($Idarrival, $Idproduct),
//        ]);
//    }
//
//    /**
//     * Creates a new ArrivalOfGoodsAddition model.
//     * If creation is successful, the browser will be redirected to the 'view' page.
//     * @return mixed
//     */
//    public function actionCreate()
//    {
//        $model = new ArrivalOfGoodsAddition();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'Idarrival' => $model->Idarrival, 'Idproduct' => $model->Idproduct]);
//        }
//
//        return $this->render('create', [
//            'model' => $model,
//        ]);
//    }

    /**
     * Updates an existing ArrivalOfGoodsAddition model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $Idarrival
     * @param integer $Idproduct
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($Idarrival, $Idproduct)
    {
        $model = $this->findModel($Idarrival, $Idproduct);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           // return $this->redirect(['view', 'Idarrival' => $model->Idarrival, 'Idproduct' => $model->Idproduct]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ArrivalOfGoodsAddition model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $Idarrival
     * @param integer $Idproduct
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($Idarrival, $Idproduct)
    {
        $this->findModel($Idarrival, $Idproduct)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArrivalOfGoodsAddition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $Idarrival
     * @param integer $Idproduct
     * @return ArrivalOfGoodsAddition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Idarrival, $Idproduct)
    {
        if (($model = ArrivalOfGoodsAddition::findOne(['Idarrival' => $Idarrival, 'Idproduct' => $Idproduct])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
