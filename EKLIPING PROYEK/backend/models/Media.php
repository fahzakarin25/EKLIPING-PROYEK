<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "media".
 *
 * @property int $id_media
 * @property string $nama_media
 * @property string $jenis_media
 */
class Media extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_media', 'jenis_media','nilai_kontrak','minimal_berita','harga_perberita'], 'required'],
            [['nama_media'], 'string', 'max' => 50],
            [['jenis_media'], 'string', 'max' => 10],
            [['minimal_berita'], 'integer'],
            [['nilai_kontrak','harga_perberita'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_media' => 'Id Media',
            'nama_media' => 'Nama Media',
            'jenis_media' => 'Jenis Media',
            'nilai_kontrak' => 'Nilai Kontrak',
            'minimal_berita' => 'Minimal Jumlah Berita',
            'harga_perberita' => 'Harga Per Berita',
        ];
    }
    public function getDataMedia(){
        $roleName =Yii::$app->user->identity->role->name; //user role sesuai nama 

        if ($roleName == 'Admin') { //jika login sebagai admin
            $data = ArrayHelper::map(Media::find()->all(), 'id_media','nama_media'); //akan menampilkan semua data media 
        } elseif ($roleName == 'Media') { //login sebagai media
            $media = Yii::$app->user->identity->profile->media; //menampilakn data seusia media yang di loginkan 
            $data = ArrayHelper::map(Media::find() //menampilkan semua data media sesuai id media dan nama media
                            ->where(['id_media'=>$media])
                            ->all(), 'id_media','nama_media'); 
        }
        return $data;
    }


    
}
