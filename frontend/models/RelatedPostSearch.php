<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\RelatedPost;

/**
 * RelatedPostSearch represents the model behind the search form about `frontend\models\RelatedPost`.
 */
class RelatedPostSearch extends RelatedPost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_post', 'related_id'], 'integer'],
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
        $query = RelatedPost::find();

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
            'id_post' => $this->id_post,
            'related_id' => $this->related_id,
        ]);

        return $dataProvider;
    }
}
