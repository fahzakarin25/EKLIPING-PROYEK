<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kliping;

/**
 * KlipingSearch represents the model behind the search form of `backend\models\Kliping`.
 */
class KlipingSearch extends Kliping
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kliping', 'kategori', 'status_publis', 'create_by', 'update_by'], 'integer'],
            [['judul', 'tanggal', 'media', 'jurnalis', 'lokasi_upload', 'create_time', 'update_time'], 'safe'],
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
        $query = Kliping::find();

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
            'id_kliping' => $this->id_kliping,
            'tanggal' => $this->tanggal,
            'kategori' => $this->kategori,
            'status_publis' => $this->status_publis,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'media', $this->media])
            ->andFilterWhere(['like', 'jurnalis', $this->jurnalis])
            ->andFilterWhere(['like', 'lokasi_upload', $this->lokasi_upload]);

        return $dataProvider;
    }
}
