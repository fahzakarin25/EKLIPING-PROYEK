<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita_online".
 *
 * @property int $id_berita
 * @property string $judul_berita
 * @property string $url_berita
 * @property string $tanggal_publis
 * @property int $status
 * @property int $media
 * @property string $create_at
 * @property string $update_at
 * @property int $create_by
 * @property int $update_by
 */
class BeritaOnline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita_online';
    }

    /**
     * {@inheritdoc}
     */
    public $upload_file; //field yang kita buat sendiri tanpa menambahkan field di database
    public function rules()
    {
        return [
            [['judul_berita', 'url_berita', 'tanggal_publis', 'status', 'media'], 'required'],
            [['tanggal_verifikasi','tanggal_publis', 'create_at', 'update_at'], 'safe'],
            [['status', 'media', 'verifikator', 'create_by', 'update_by'], 'integer'],
            [['judul_berita'], 'string', 'max' => 100],
            [['url_berita'], 'string', 'max' => 255],

            //field yang dibuat tanpa diada didalam db
            [['upload_file',], 'required', 'on' => ['create']], // ini wajib diisi saat create
            [
                'upload_file', 'file', 'extensions' => ['jpg', 'png', 'JPEG', 'JPG'], // ini extensi gambar yang kita izinkan untuk di upload
                'wrongExtension' => 'Hanya format file {extensions} yang diizinkan untuk {attribute}.', //ini pesan yang muncul sat upload tidak sesuai tipe gambar
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berita' => 'Id Berita',
            'judul_berita' => 'Judul Berita',
            'url_berita' => 'Url Berita',
            'tanggal_publis' => 'Tanggal Publis',
            'tanggal_verifikasi' => 'Tanggal Verifikasi',
            'status' => 'Status',
            'media' => 'Media',
            'verifikator' => 'Verifikator',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
        ];
    }
    public function tglIndo($tanggal) //menampilkan tanggal dengan nama bulan indonesia
    {
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

        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }
    public function getNameMedia() //relasi table dengan table media 
    {
        return $this->hasOne(Media::className(), ['id_media' => 'media']); //id_media adalah PK dari table media sedangkan media adalah field dari table berita online
    }
}
