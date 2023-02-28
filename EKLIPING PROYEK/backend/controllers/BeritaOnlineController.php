<?php

namespace backend\controllers;

use backend\models\BeritaOnline;
use backend\models\BeritaOnlineSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use Yii;

/**
 * BeritaOnlineController implements the CRUD actions for BeritaOnline model.
 */
class BeritaOnlineController extends Controller
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
     * Lists all BeritaOnline models.
     *
     * @return string
     */
    public function actionIndex() // menampilkan halaman data sesuai id media yang diloginkan 
    {
        $searchModel = new BeritaOnlineSearch();

        $media = Yii::$app->user->identity->profile->media; //menmapilkan nama sesuai dengan nama media 
        $roleName = Yii::$app->user->identity->role->name; //menampilkan nama sesuai dengan nama role yang dipilih

        if($roleName=='Media'){ //tampilan untuk media
            $dataMedia = BeritaOnline::find() //menampilkan data media/ select 
                    ->where(['media' =>$media]) //dimana media itu kodingan nya di $media
                    ->orderBy(['id_berita' =>SORT_ASC]) //dimana kita tampilan nya berdasarkan id berita dengan SORT ASC
                    ->all();//menmapilkan seluruh berita

            $dataProvider = $searchModel->search($this->request->queryParams);
            $dataProvider->query->andWhere([
                'media' => $media,
            ]);
        } elseif($roleName=='Verifikator'){ //tampilan untuk verifikator
            $dataMedia = BeritaOnline::find()
                    ->orderBy(['tanggal_publis' =>SORT_DESC])
                    ->all();
                    
            $dataProvider = $searchModel->search($this->request->queryParams);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'dataMedia' =>$dataMedia,
        ]);
    }

    /**
     * Displays a single BeritaOnline model.
     * @param int $id_berita Id Berita
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_berita)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_berita),
        ]);
    }

    /**
     * Creates a new BeritaOnline model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new BeritaOnline();

        $model->create_by = Yii::$app->User->id; //untuk mendapatkan siapa user yang membuat
        $model->create_at = date('Y-m-d H:i:s'); //untuk mendapatkan kapan data dibuat 

        if ($this->request->isPost) {
            if ($model->load($this->request->post())){
                $model->status = 1; //status belum terverifikasi otomatis tidak perlu di pilih
                $model->media = Yii::$app->user->identity->profile->media; //untuk mendapatkan media yang sedang login / id media dari table yang sudah diinputkan dari table profile user
                $model->save(false);//ditambah false biar validasi nya di skip seperti tipe data varchat 100 di skip saja
                return $this->redirect(['view', 'id_berita' => $model->id_berita]); // dipindahkan ke view
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [ //ditekan tombol tambah akan pergi ke tambah
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BeritaOnline model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_berita Id Berita
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_berita)
    {
        $model = $this->findModel($id_berita);
        
        $model->update_by = Yii::$app->User->id;  //untuk mendapatkan siapa user yang mengedit
        $model->update_at = date('Y-m-d H:i:s'); //untuk mendapatkan kapan data diedit 

        if ($this->request->isPost && $model->load($this->request->post())){ 
            $model->save(false);
            return $this->redirect(['view', 'id_berita' => $model->id_berita]); //setelah diupdate halaman akan dipindahkan ke halaman view
        }

        return $this->render('update', [ //ditekan tombol update akan pergi ke update
            'model' => $model,
        ]);
    }

    public function actionSetujuiBerita($id_berita)
    {
        $model = BeritaOnline::findOne($id_berita); //select 1 berita berdasarkan id_berita
        $verify = Yii::$app->user->id; //mendapatkan id user

        $model->load(Yii::$app->request->post()); //ketika tombol verifikasi diklik maka akan ada beberapa field yang diisi seperti field tanggal_verifikasi , field verifikator dan mengubah isi dari field status yang awal nya 1 (belum verify) menjadi 2 (verify)
        $model->tanggal_verifikasi = date('Y-m-d'); //mendapatkan tanggal verifikasi dengan menggunakan field tanggal php
        //date('Y-m-d') itu berfungsi akan mendapatkan tanggal yang sekarang
        //jadi nanti field tanggal_verifikasi itu akan langsung terisi dengan tanggal sekarang
        $model->status=2; //dan field status berita akan berubah menjadi 2 (sudah verifikasi)
        $model->verifikator = $verify; //dan field verifikator akan terisi dari $verify //mendapatkan id user
        $model->save(false);
        
        Yii::$app->session->setFlash('success',"Berita online sudah diverikasi oleh admin"); //ini fungsinya kita akan menampilkan alert success 

        return $this->redirect(Yii::$app->request->referrer); //artinya setelah proses diatas dilakukan maka akan di redirect ketampilan index berita online juga

    }

    /**
     * Deletes an existing BeritaOnline model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_berita Id Berita
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_berita)
    {
        $this->findModel($id_berita)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BeritaOnline model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_berita Id Berita
     * @return BeritaOnline the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_berita)
    {
        if (($model = BeritaOnline::findOne(['id_berita' => $id_berita])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
