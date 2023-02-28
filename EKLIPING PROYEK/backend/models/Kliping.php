<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kliping".
 *
 * @property int $id_kliping
 * @property string $judul
 * @property string $tanggal
 * @property int $kategori
 * @property string $media
 * @property string $jurnalis
 * @property string $lokasi_upload
 * @property int $status_publis
 * @property string $create_time
 * @property string $update_time
 * @property int $create_by
 * @property int $update_by
 */
class Kliping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kliping';
    }

    /**
     * {@inheritdoc}
     */
    public $upload_file; //field yang kita buat sendiri tanpa menambahkan field di database
    public function rules()
    {
        return [
            [['judul', 'tanggal', 'kategori', 'media', 'jurnalis', 'lokasi_upload', 'status_publis'], 'required'],
            [['id_kliping', 'kategori', 'status_publis', 'create_by', 'update_by'], 'integer'],
            [['tanggal', 'create_time', 'update_time'], 'safe'],
            [['judul', 'lokasi_upload'], 'string', 'max' => 255],
            [['media', 'jurnalis'], 'string', 'max' => 100],
            [['id_kliping'], 'unique'],

            //field yang dibuat tanpa diada didalam db
            [['upload_file',], 'required', 'on' => ['create']], // ini wajib diisi saat create
            [
                'upload_file', 'file', 'extensions' => ['jpg', 'png', 'JPEG', 'JPG'], // ini extensi gambar yang kita izinkan untuk di upload
                'wrongExtension' => 'Hanya format file {extensions} yang diizinkan untuk {attribute}.', //ini pesan yang muncul saat upload tidak sesuai tipe gambar
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kliping' => 'Id Kliping',
            'judul' => 'Judul',
            'tanggal' => 'Tanggal',
            'kategori' => 'Kategori',
            'media' => 'Media',
            'jurnalis' => 'Jurnalis',
            'lokasi_upload' => 'Lokasi Upload',
            'status_publis' => 'Status Publis',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_by' => 'Create By',
            'update_by' => 'Update By',
        ];
    }
    public function getJenisKategori() //relasi dengan table kategori
    { //kategori
        return $this->hasOne(KategoriKliping::className(), ['id_kategori' => 'kategori']); // id_kategori = PK table kategorikliping , kategori = field table kliping
    }
    public function getNamaJurnalis() //relasi dengan table jurnalis
    {
        return $this->hasOne(Jurnalis::className(), ['id_pers' => 'jurnalis']); // id_pers = PK table jurnalis , jurnalis = field table kliping
    }
    public function tglIndo($tanggal) //menampilkan nama bulan bahasa indonesia
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
    public function getNamaMedia() // relasi dengan table media
    {
        return $this->hasOne(Media::className(), ['id_media' => 'media']); // id_media = PK table media , media = field dari table kliping
    }
}
