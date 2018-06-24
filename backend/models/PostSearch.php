<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Post;

/**
 * PostSearch represents the model behind the search form about `backend\models\Post`.
 */
class PostSearch extends Post
{
    public $comments;
    public $author;
    public $postImages;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'likes', 'status', 'typeView', 'create_time', 'update_time', 'author_id'], 'integer'],
            [['title', 'preview_content', 'content', 'tags', 'postImages', 'author', 'comments', 'postImages'], 'safe'],
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
        $query = Post::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'likes' => $this->likes,
            'status' => $this->status,
            'typeView' => $this->typeView,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
        ->andFilterWhere(['like', 'preview_content', $this->preview_content])
        ->andFilterWhere(['like', 'content', $this->content])
        ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
