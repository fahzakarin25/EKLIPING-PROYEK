<?php

namespace backend\controllers;

use backend\models\BeritaOnline;
use backend\models\Media;
use backend\models\MediaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MediaController implements the CRUD actions for Media model.
 */
class MediaController extends Controller
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
     * Lists all Media models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MediaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Media model.
     * @param int $id_media Id Media
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_media)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_media),
        ]);
    }

    /**
     * Creates a new Media model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Media();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_media' => $model->id_media]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Media model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_media Id Media
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_media)
    {
        $model = $this->findModel($id_media);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_media' => $model->id_media]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Media model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_media Id Media
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_media)
    {
        $this->findModel($id_media)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Media model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_media Id Media
     * @return Media the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_media)
    {
        if (($model = Media::findOne(['id_media' => $id_media])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCekMedia($bulan,$tahun,$id_media) //function ada di script js form kwitansi
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $listdata=Media::find()
                ->where(['id_media'=>$id_media])
                ->one();

        $hitungBerita = BeritaOnline::find()
                    ->where(['month(tanggal_publis)'=>$bulan]) //melihat bulan di field tanggal publis
                    ->andWhere(['year(tanggal_publis)'=>$tahun]) //melihat tahun di field tanggal publi
                    ->andWhere(['media'=>$id_media])
                    ->andWhere(['status'=>2])//yang sudah terverfikasi
                    ->count(); //jumlah

        if(!empty($listdata)){
            return [
                'nilai_kontrak'=>$listdata->nilai_kontrak,
                'minimal_berita'=>$listdata->minimal_berita,
                'harga_perberita'=>$listdata->harga_perberita,
                'jumlah_berita'=>$hitungBerita,
            ];

        }else{
            return [
                'nilai_kontrak'=>0,
                'minimal_berita'=>0,
                'harga_perberita'=>0,
                'jumlah_berita'=>0,
            ];
        }

    }
}
