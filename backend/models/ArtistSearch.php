<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Artist;

/**
 * ArtistSearch represents the model behind the search form about `backend\models\Artist`.
 */
class ArtistSearch extends Artist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['artist_id', 'like', 'view'], 'integer'],
            [['name', 'lastname', 'about', 'image'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Artist::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'artist_id' => $this->artist_id,
            'like' => $this->like,
            'view' => $this->view,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'about', $this->about])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
