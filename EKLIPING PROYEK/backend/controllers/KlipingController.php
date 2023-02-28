<?php

namespace backend\controllers;

use Yii;
use backend\models\Kliping;
use backend\models\KlipingSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;

/**
 * KlipingController implements the CRUD actions for Kliping model.
 */
class KlipingController extends Controller
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
     * Lists all Kliping models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new KlipingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kliping model.
     * @param int $id_kliping Id Kliping
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_kliping)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_kliping),
        ]);
    }

    /**
     * Creates a new Kliping model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    
    public function actionCreate() 
    {
        $model = new Kliping();

        $model->create_by = Yii::$app->User->id; //menampilkan id user siapa yang menambahkan data
        $model->create_time = date('Y-m-d H:i:s'); //menampilkan kapan menambahkan data

        if ($model->load(Yii::$app->request->post())) {
            if (!empty(UploadedFile::getInstance($model, 'upload_file'))) {
                $model->upload_file = UploadedFile::getInstance($model, 'upload_file');
                $fileName = date('Ymdhis') . '.' . $model->upload_file->extension;
                //nama file bisa ditambahkan md5 untuk deskripsi
                $locationPath = Yii::getAlias('@uploads/filepdf');
                FileHelper::createDirectory($locationPath);
                if ($model->upload_file->saveAs($locationPath . '/' . $fileName)) {
                    $locationUrl = Yii::getAlias('@browseimage/filepdf');
                    $model->lokasi_upload = $locationUrl . '/' . $fileName;
                }
            }
            if ($model->save(false)) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Kliping model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_kliping Id Kliping
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id_kliping) 
    {
        $model = $this->findModel($id_kliping);

        $model->update_by = Yii::$app->User->id; //menampilkan id user siapa yang mengubah data
        $model->update_time = date('Y-m-d H:i:s'); //menampilkan kapan mengubah data

        if ($model->load(Yii::$app->request->post())){
            if(!empty(UploadedFile::getInstance($model, 'upload_file'))){
                $model->upload_file = UploadedFile::getInstance($model, 'upload_file');
                $fileName = date('Ymdhis').'.'.$model->upload_file->extension;
                //nama file bisa ditambahkan md5 untuk deskripsi
                $locationPath = Yii::getAlias('@uploads/filepdf');
                FileHelper::createDirectory($locationPath);
                if ($model->upload_file->saveAs($locationPath.'/' .$fileName)) {
                    $locationUrl = Yii::getAlias('@browseimage/filepdf');
                    $model->lokasi_upload = $locationUrl.'/'.$fileName;
                }
            }
            if ($model->save(false)) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kliping model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_kliping Id Kliping
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_kliping)
    {
        $this->findModel($id_kliping)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kliping model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_kliping Id Kliping
     * @return Kliping the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_kliping)
    {
        if (($model = Kliping::findOne(['id_kliping' => $id_kliping])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCetakKliping($id_kliping) //untuk mencetak data per id jadi hanya 1 data
    {
        $model = $this->findModel($id_kliping);
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'application/pdf');
        
        return $this->renderPartial('_cetakkliping', [ //render untuk cetak kalau view biasa pakai render saja
            'model' => $model,
        ]);
    }
}
