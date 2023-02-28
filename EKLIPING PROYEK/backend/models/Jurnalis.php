<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jurnalis".
 *
 * @property int $id_pers
 * @property string $nama_jurnalis
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat
 * @property string $hp_wa
 * @property string $media_jurnalis
 * @property string $wilayah
 * @property string $jabatan
 */
class Jurnalis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jurnalis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pers', 'nama_jurnalis', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'hp_wa', 'media_jurnalis', 'wilayah', 'jabatan'], 'required'],
            [['id_pers'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['alamat'], 'string'],
            [['nama_jurnalis', 'media_jurnalis', 'wilayah'], 'string', 'max' => 100],
            [['tempat_lahir', 'jabatan'], 'string', 'max' => 50],
            [['hp_wa'], 'string', 'max' => 15],
            [['id_pers'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pers' => 'Id Jurnalis',
            'nama_jurnalis' => 'Nama Jurnalis',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat' => 'Alamat',
            'hp_wa' => 'Hp WHatsApp',
            'media_jurnalis' => 'Media Jurnalis',
            'wilayah' => 'Wilayah',
            'jabatan' => 'Jabatan',
        ];
    }
    public function getDataJurnalis(){ //mengambil data dari jurnalis
        $data = Jurnalis::find()-> all(); //menselect semua data dari jurnalis
        $dropDown = \yii\helpers\ArrayHelper::map($data,'id_pers','nama_jurnalis'); //dengan menampilkan field nama_jurnalis dimana PK nya id_pers

        return $dropDown;
    }
    public function tglIndo($tanggal){ //menampilkan nama bulan dengan bahasa indonesia
        $bulan = array(
            1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
        );

        $pecahkan = explode('-',$tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    public function getmasukanMedia(){ //relasi table dengan table media
        return $this->hasOne(Media::className(),['id_media'=>'media_jurnalis']); //id_media adalah PK dari table media sedangkan media_jurnalis field yang ada dalam table jurnalis
    }
}
