<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Jurnalis;

/**
 * JurnalisSearch represents the model behind the search form of `backend\models\Jurnalis`.
 */
class JurnalisSearch extends Jurnalis
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pers'], 'integer'],
            [['nama_jurnalis', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'hp_wa', 'media_jurnalis', 'wilayah', 'jabatan'], 'safe'],
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
        $query = Jurnalis::find();

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
            'id_pers' => $this->id_pers,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama_jurnalis', $this->nama_jurnalis])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'hp_wa', $this->hp_wa])
            ->andFilterWhere(['like', 'media_jurnalis', $this->media_jurnalis])
            ->andFilterWhere(['like', 'wilayah', $this->wilayah])
            ->andFilterWhere(['like', 'jabatan', $this->jabatan]);

        return $dataProvider;
    }
}
