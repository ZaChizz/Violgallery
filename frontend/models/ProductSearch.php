<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `frontend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'price_from', 'price_to', 'like', 'view', 'category_id', 'genre_id', 'style_id', 'artist_id', 'home', 'gallery', 'create_time', 'update_time'], 'integer'],
            [['title', 'image', 'description'], 'safe'],
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
        $query = Product::find();

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
            'product_id' => $this->product_id,
          //  'price_from' => $this->price_from,
            //'price_to' => $this->price_to,
            'like' => $this->like,
            'view' => $this->view,
            'category_id' => $this->category_id,
            'genre_id' => $this->genre_id,
            'style_id' => $this->style_id,
            'artist_id' => $this->artist_id,
            'home' => $this->home,
            'gallery' => $this->gallery,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);
        $query->andFilterWhere(['>=', 'price_from', $this->price_from]);
        $query->andFilterWhere(['<=', 'price_to', $this->price_to]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

    public function searchAll()
    {
        $query = Product::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $dataProvider;
    }
}
