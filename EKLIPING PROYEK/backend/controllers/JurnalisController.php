<?php

namespace backend\controllers;

use backend\models\Jurnalis;
use backend\models\JurnalisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JurnalisController implements the CRUD actions for Jurnalis model.
 */
class JurnalisController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Jurnalis models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JurnalisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Jurnalis model.
     * @param int $id_pers Id Pers
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pers)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pers),
        ]);
    }

    /**
     * Creates a new Jurnalis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Jurnalis();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pers' => $model->id_pers]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Jurnalis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pers Id Pers
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pers)
    {
        $model = $this->findModel($id_pers);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pers' => $model->id_pers]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Jurnalis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pers Id Pers
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pers)
    {
        $this->findModel($id_pers)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Jurnalis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pers Id Pers
     * @return Jurnalis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pers) 
    {
        if (($model = Jurnalis::findOne(['id_pers' => $id_pers])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
