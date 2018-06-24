<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Post;

/**
 * PostSearch represents the model behind the search form about `frontend\models\Post`.
 */
class PostSearch extends Post
{
    /**
     * @inheritdoc
     */
	public $comments;
	
    public function rules()
    {
        return [
            [['id', 'status', 'create_time', 'update_time', 'likes', 'views', 'category_id', 'author_id'], 'integer'],
            [['title', 'content', 'tags', 'comments'], 'safe'],
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

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Search',
            'content' => 'Content',
            'tags' => 'Tags',
            'likes' => 'Like',
            'views' => 'View',
            'category_id' => 'category_id',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchGlobal($params)
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
            'status' => $this->status,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);

        $query->orFilterWhere(['like', 'title', $this->title])
            ->orFilterWhere(['like', 'content', $this->title])
            ->orFilterWhere(['like', 'tags', $this->title]);

        return $dataProvider;
    }

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
            'views' => $this->views,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'typeView' => $this->typeView,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'author_id' => $this->author_id,
        ]);


        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'preview_content', $this->preview_content])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['=','category_id', $this->category_id]);

        return $dataProvider;
    }



    public function attributes()
    {
        // add related fields to searchable attributes
        return array_merge(parent::attributes(), ['comment.content']);
    }


}
