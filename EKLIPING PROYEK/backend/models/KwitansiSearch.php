<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kwitansi;

/**
 * KwitansiSearch represents the model behind the search form of `backend\models\Kwitansi`.
 */
class KwitansiSearch extends Kwitansi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kwitansi', 'id_media', 'jumlah_berita', 'minimal_berita', 'bulan', 'tahun', 'status_cetak', 'create_at', 'create_by'], 'integer'],
            [['nilai_kontrak', 'harga_perberita'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Kwitansi::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kwitansi' => $this->id_kwitansi,
            'id_media' => $this->id_media,
            'nilai_kontrak' => $this->nilai_kontrak,
            'jumlah_berita' => $this->jumlah_berita,
            'minimal_berita' => $this->minimal_berita,
            'harga_perberita' => $this->harga_perberita,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'status_cetak' => $this->status_cetak,
            'create_at' => $this->create_at,
            'create_by' => $this->create_by,
        ]);

        return $dataProvider;
    }
}
