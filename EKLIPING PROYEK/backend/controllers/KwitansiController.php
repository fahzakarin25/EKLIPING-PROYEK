<?php

namespace backend\controllers;

use Yii;
use backend\models\Kwitansi;
use backend\models\KwitansiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KwitansiController implements the CRUD actions for Kwitansi model.
 */
class KwitansiController extends Controller
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
     * Lists all Kwitansi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KwitansiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kwitansi model.
     * @param int $id_kwitansi Id Kwitansi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kwitansi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kwitansi),
        ]);
    }

    /**
     * Creates a new Kwitansi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Kwitansi();
        $model->create_by = Yii::$app->User->id; 
        $model->create_at = date('Y-m-d H:i:s');

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) ) {
                $model->status_cetak=1;//belum dicetak
                //membuat encrytion data agar tidak di manipulasi
                if(empty($model->hash_data)){
                    $encrypt_data =  Yii::$app->getSecurity()->generateRandomString(30);
                    $model->hash_data = $encrypt_data;
                }
                $model->save(false);
                return $this->redirect(['view', 'id_kwitansi' => $model->id_kwitansi]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kwitansi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_kwitansi Id Kwitansi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_kwitansi)
    {
        $model = $this->findModel($id_kwitansi);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_kwitansi' => $model->id_kwitansi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionCetakKwitansi($hash_data)
    {
        // $model = $this->findModel($id_kwitansi);
        // Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'application/pdf');

        $model = Kwitansi::findOne(['hash_data'=>$hash_data]);
        // $model = $this->cetakSuratsakit($hash_data);
        $print = Yii::$app->user->id; //mendapatkan id user

        $model->load(Yii::$app->request->post()); //ketika tombol ditekan mengubah isi dari field status yang awal nya 1 (belum verify) menjadi 2 (verify)
        $model->status_cetak=2; //dan field status berita akan berubah menjadi 2 (sudah tercetak)
        $model->id_media = $print;
        $model->save(false);
        
        Yii::$app->session->setFlash('success',"kwitansi sudah dicetak"); //ini fungsinya kita akan menampilkan alert success 
        
        return $this->renderPartial('_cetakkwitansi', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kwitansi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_kwitansi Id Kwitansi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kwitansi)
    {
        $this->findModel($id_kwitansi)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kwitansi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_kwitansi Id Kwitansi
     * @return Kwitansi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kwitansi)
    {
        if (($model = Kwitansi::findOne(['id_kwitansi' => $id_kwitansi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
