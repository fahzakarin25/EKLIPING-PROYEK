<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kwitansi".
 *
 * @property int $id_kwitansi
 * @property int $id_media
 * @property float $nilai_kontrak
 * @property int $jumlah_berita
 * @property int $minimal_berita
 * @property float $harga_perberita
 * @property int $bulan
 * @property int $tahun
 * @property int $status_cetak
 * @property int $create_at
 * @property int $create_by
 */
class Kwitansi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kwitansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_media', 'nilai_kontrak', 'jumlah_berita', 'minimal_berita', 'harga_perberita', 'bulan', 'tahun', 'status_cetak', 'create_at', 'create_by','hash_data'], 'required'],
            [['id_media', 'jumlah_berita', 'minimal_berita', 'bulan', 'tahun', 'status_cetak', 'create_at', 'create_by'], 'integer'],
            [['nilai_kontrak', 'harga_perberita','total_bayar'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kwitansi' => 'Id Kwitansi',
            'id_media' => 'Id Media',
            'nilai_kontrak' => 'Nilai Kontrak',
            'jumlah_berita' => 'Jumlah Berita',
            'minimal_berita' => 'Minimal Berita',
            'harga_perberita' => 'Harga Perberita',
            'total_bayar' => 'Total Bayar',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
            'status_cetak' => 'Status Cetak',
            'hash_data' => 'Hash Data',
            'create_at' => 'Create At',
            'create_by' => 'Create By',
        ];
    }

    public function getNamaMedia()
    {
        return $this->hasOne(Media::className(), ['id_media' => 'id_media']);
    }

    public function penyebut($total_bayar) {
        $nilai = abs($total_bayar);
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = $this->penyebut($nilai - 10). " belas";
        } else if ($nilai < 100) {
            $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " seratus" . $this->penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " seribu" . $this->penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = $this->penyebut($nilai/1000000000) . " milyar" .$this->penyebut(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
        }     
        return $temp;
    }

    public function terbilang($total_bayar) {
        if($total_bayar<0) {
            $hasil = "minus ". trim($this->penyebut($total_bayar));
        } else {
            $hasil = trim($this->penyebut($total_bayar));
        }           
        return $hasil;
    }
}
