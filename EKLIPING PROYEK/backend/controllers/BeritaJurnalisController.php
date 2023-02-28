<?php

namespace backend\controllers;

use backend\models\BeritaJurnalis;
use backend\models\BeritaJurnalisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BeritaJurnalisController implements the CRUD actions for BeritaJurnalis model.
 */
class BeritaJurnalisController extends Controller
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
     * Lists all BeritaJurnalis models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BeritaJurnalisSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BeritaJurnalis model.
     * @param int $id_berita_jurnalis Id Berita Jurnalis
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_berita_jurnalis)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_berita_jurnalis),
        ]);
    }

    /**
     * Creates a new BeritaJurnalis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BeritaJurnalis();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_berita_jurnalis' => $model->id_berita_jurnalis]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BeritaJurnalis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_berita_jurnalis Id Berita Jurnalis
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_berita_jurnalis)
    {
        $model = $this->findModel($id_berita_jurnalis);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_berita_jurnalis' => $model->id_berita_jurnalis]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BeritaJurnalis model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_berita_jurnalis Id Berita Jurnalis
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_berita_jurnalis)
    {
        $this->findModel($id_berita_jurnalis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BeritaJurnalis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_berita_jurnalis Id Berita Jurnalis
     * @return BeritaJurnalis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_berita_jurnalis) 
    {
        if (($model = BeritaJurnalis::findOne(['id_berita_jurnalis' => $id_berita_jurnalis])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
