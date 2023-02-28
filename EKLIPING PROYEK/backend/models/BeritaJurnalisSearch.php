<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BeritaJurnalis;

/**
 * BeritaJurnalisSearch represents the model behind the search form of `backend\models\BeritaJurnalis`.
 */
class BeritaJurnalisSearch extends BeritaJurnalis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_berita_jurnalis', 'id_jurnalis', 'status'], 'integer'],
            [['tanggal_publis', 'url_berita'], 'safe'],
            [['nilai_kontrak'], 'number'],
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
        $query = BeritaJurnalis::find();

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
            'id_berita_jurnalis' => $this->id_berita_jurnalis,
            'id_jurnalis' => $this->id_jurnalis,
            'tanggal_publis' => $this->tanggal_publis,
            'nilai_kontrak' => $this->nilai_kontrak,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'url_berita', $this->url_berita]);

        return $dataProvider;
    }
}
