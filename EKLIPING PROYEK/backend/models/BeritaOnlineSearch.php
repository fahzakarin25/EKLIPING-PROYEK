<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeritaOnline;

/**
 * BeritaOnlineSearch represents the model behind the search form of `backend\models\BeritaOnline`.
 */
class BeritaOnlineSearch extends BeritaOnline
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berita', 'status', 'media', 'create_by', 'update_by'], 'integer'],
            [['judul_berita', 'url_berita', 'tanggal_publis', 'create_at', 'update_at'], 'safe'],
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
        $query = BeritaOnline::find();

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
            'id_berita' => $this->id_berita,
            'tanggal_publis' => $this->tanggal_publis,
            'status' => $this->status,
            'media' => $this->media,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'judul_berita', $this->judul_berita])
            ->andFilterWhere(['like', 'url_berita', $this->url_berita]);

        return $dataProvider;
    }
}
