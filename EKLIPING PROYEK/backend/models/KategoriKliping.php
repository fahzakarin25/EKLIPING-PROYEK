<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "kategori_kliping".
 *
 * @property int $id_kategori
 * @property string $jenis_kategori
 */
class KategoriKliping extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kategori_kliping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_kategori'], 'required'],
            [['id_kategori'], 'integer'],
            [['jenis_kategori'], 'string', 'max' => 50],
            [['id_kategori'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kategori' => 'Id Kategori',
            'jenis_kategori' => 'Jenis Kategori',
        ];
    }
    public function getDataKliping(){ //relasi table dengan table artikel
        $data = KategoriKliping::find()->all();
        $dropdown = \yii\helpers\ArrayHelper::map($data,'id_kategori','jenis_kategori'); //id_kategori adalah PK dari table kliping sedangakn jenis_kategori field yang dibuat oleh table kategori kliping

        return $dropdown; //menampilkan dropdown
    }
}
