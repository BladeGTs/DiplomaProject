<?php

namespace frontend\controllers;

use Yii;
use common\models\ArrivalOfGoods;
use common\models\ArrivalOfGoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employee;
use common\models\Product;
use common\models\Provider;
use frontend\controllers\behaviors\MyBehavior;

/**
 * ArrivalOfGoodsController implements the CRUD actions for ArrivalOfGoods model.
 */
class ArrivalOfGoodsController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            MyBehavior::className(),
        ];
    }

    /**
     * Lists all ArrivalOfGoods models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ArrivalOfGoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 10;

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArrivalOfGoods model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArrivalOfGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArrivalOfGoods();
        $employee = Employee::getList();
        $product = Product::getList();
        $supplier = Provider::getList();
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success','Товар успешно добавлен');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'employee' => $employee,
            'supplier'=>$supplier,
            'product'=>$product,
            
        ]);
    }

    /**
     * Updates an existing ArrivalOfGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionUpdate($id)
//    {
//        $model = $this->findModel($id);
//        $employee = Employee::getList();
//        $product = Product::getList();
//        $supplier = \frontend\models\Provider::getList();
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
//
//        return $this->render('update', [
//            'model' => $model,
//            'employee' => $employee,
//            'supplier'=>$supplier,
//            'product'=>$product,
//
//        ]);
//    }

    /**
     * Deletes an existing ArrivalOfGoods model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArrivalOfGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArrivalOfGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ArrivalOfGoods::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
