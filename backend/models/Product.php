<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_product".
 *
 * @property integer $product_id
 * @property string $title
 * @property integer $price_from
 * @property integer $price_to
 * @property integer $like
 * @property integer $view
 * @property integer $category_id
 * @property integer $genre_id
 * @property integer $style_id
 * @property integer $artist_id
 * @property integer $home
 * @property integer $gallery
 * @property string $image
 * @property string $description
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property TblCommentProduct[] $tblCommentProducts
 * @property TblCategory $category
 * @property TblArtist $artist
 * @property TblGenre $genre
 * @property TblStyle $style
 * @property TblProductImage[] $tblProductImages
 * @property TblUserlikeProduct[] $tblUserlikeProducts
 */
class Product extends \yii\db\ActiveRecord
{

    public $comment;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'price_from', 'price_to', 'category_id', 'genre_id', 'style_id', 'artist_id', 'description', 'create_time', 'update_time'], 'required'],
            [['price_from', 'price_to', 'like', 'view', 'category_id', 'genre_id', 'style_id', 'artist_id', 'home', 'gallery', 'create_time', 'update_time'], 'integer'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'title' => 'Title',
            'price_from' => 'Price From',
            'price_to' => 'Price To',
            'like' => 'Like',
            'view' => 'View',
            'category_id' => 'Category ID',
            'genre_id' => 'Genre ID',
            'style_id' => 'Style ID',
            'artist_id' => 'Artist ID',
            'home' => 'Show in Home page',
            'gallery' => 'Gallery',
            'image' => 'Image',
            'description' => 'Description',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentProducts()
    {
        return $this->hasMany(CommentProduct::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtist()
    {
        return $this->hasOne(Artist::className(), ['artist_id' => 'artist_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStyle()
    {
        return $this->hasOne(Style::className(), ['id' => 'style_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImage::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserlikeProducts()
    {
        return $this->hasMany(UserlikeProduct::className(), ['product_id' => 'product_id']);
    }

    public function afterFind()
    {
        if(isset($this->commentProducts))
            $this->comment = count($this->commentProducts);
        else
            $this->comment = 0;
        return $this->comment;
    }

    public function defaultValue()
    {
        $this->update_time = time();
        $this->create_time = time();
        $this->like = 0;
        $this->view = 0;
    }
}
