<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_artist".
 *
 * @property integer $artist_id
 * @property string $name
 * @property string $lastname
 * @property string $about
 * @property string $image
 * @property integer $like
 * @property integer $view
 *
 * @property TblProduct[] $tblProducts
 */
class Artist extends \yii\db\ActiveRecord
{

    public $title;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'about'], 'required'],
            [['about'], 'string'],
            [['like', 'view'], 'integer'],
            [['name', 'lastname', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'artist_id' => 'ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'about' => 'About',
            'image' => 'Image',
            'like' => 'Like',
            'view' => 'View',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['artist_id' => 'artist_id']);
    }

    public function afterFind()
    {
        $this->title = $this->name.' '.$this->lastname;
    }
}
