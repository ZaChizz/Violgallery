<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PostImage;

/**
 * PostImageSearch represents the model behind the search form about `backend\models\PostImage`.
 */
class PostImageSearch extends PostImage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_post'], 'integer'],
            [['title', 'resolution', 'orientation'], 'safe'],
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
        $query = PostImage::find();

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
            'id' => $this->id,
            'id_post' => $this->id_post,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'resolution', $this->resolution])
            ->andFilterWhere(['like', 'orientation', $this->orientation]);

        return $dataProvider;
    }
}
