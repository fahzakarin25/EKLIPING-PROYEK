<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Media;

/**
 * MediaSearch represents the model behind the search form of `backend\models\Media`.
 */
class MediaSearch extends Media
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_media'], 'integer'],
            [['nama_media', 'jenis_media','nilai_kontrak'], 'safe'],
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
        $query = Media::find();

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
            'id_media' => $this->id_media,
        ]);

        $query->andFilterWhere(['like', 'nama_media', $this->nama_media])
            ->andFilterWhere(['like', 'jenis_media', $this->jenis_media])
            ->andFilterWhere(['like', 'nilai_kontrak', $this->nilai_kontrak]);

        return $dataProvider;
    }
}
