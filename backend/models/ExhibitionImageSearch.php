<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ExhibitionImage;

/**
 * ExhibitionImageSearch represents the model behind the search form about `backend\models\ExhibitionImage`.
 */
class ExhibitionImageSearch extends ExhibitionImage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exhibition_id', 'home'], 'integer'],
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
        $query = ExhibitionImage::find();

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
            'id' => $this->id,
            'exhibition_id' => $this->exhibition_id,
            'home' => $this->home,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'resolution', $this->resolution])
            ->andFilterWhere(['like', 'orientation', $this->orientation]);

        return $dataProvider;
    }
}
