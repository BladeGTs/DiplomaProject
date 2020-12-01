<?php

namespace backend\modules\consumptionOfGoods\controllers;

use Yii;
use common\models\ConsumptionOfGoods;
use common\models\ConsumptionOfGoodsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Employee;
use common\models\Recipients;
use common\models\Product;

/**
 * ManageController implements the CRUD actions for ConsumptionOfGoods model.
 */
class ManageController extends Controller {

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
        ];
    }

    /**
     * Lists all ConsumptionOfGoods models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ConsumptionOfGoodsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConsumptionOfGoods model.
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
     * Creates a new ConsumptionOfGoods model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new ConsumptionOfGoods();
        $employee = Employee::getList();
        $recipients = Recipients::getList();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_consumption]);
        }

        return $this->render('create', [
                    'model' => $model,
                    'employee' => $employee,
                    'recipients' => $recipients,
        ]);
    }

    /**
     * Updates an existing ConsumptionOfGoods model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $employee = Employee::getList();
        $recipients = Recipients::getList();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID_consumption]);
        }

        return $this->render('update', [
                    'model' => $model,
                    'employee' => $employee,
                    'recipients' => $recipients,
        ]);
    }

    /**
     * Deletes an existing ConsumptionOfGoods model.
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
     * Finds the ConsumptionOfGoods model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConsumptionOfGoods the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = ConsumptionOfGoods::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
