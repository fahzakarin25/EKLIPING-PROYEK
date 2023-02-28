<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berita_jurnalis".
 *
 * @property int $id_berita_jurnalis
 * @property int $id_jurnalis
 * @property string $tanggal_publis
 * @property float $nilai_kontrak
 * @property int $status
 * @property string $url_berita
 */
class BeritaJurnalis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berita_jurnalis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_publis', 'nilai_kontrak', 'status', 'url_berita'], 'required'],
            [['id_jurnalis', 'status'], 'integer'],
            [['tanggal_publis'], 'safe'],
            [['nilai_kontrak'], 'number'],
            [['url_berita'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_berita_jurnalis' => 'Id Berita Jurnalis',
            'id_jurnalis' => 'Id Jurnalis',
            'tanggal_publis' => 'Tanggal Publis',
            'nilai_kontrak' => 'Nilai Kontrak',
            'status' => 'Status',
            'url_berita' => 'Url Berita',
        ];
    }

    public function getNamoJurnalis() //relasi dengan table jurnalis 
    {
        return $this->hasOne(Jurnalis::className(), ['id_pers' => 'id_jurnalis']); //id_pers adalah PK dari table jurnalis sendiri dan id_jurnalis field yang ada dalam table berita jurnalis
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
}
