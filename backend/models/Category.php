<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property integer $category_id
 * @property string $title
 * @property string $option_value
 *
 * @property TblPost[] $tblPosts
 * @property TblProduct[] $tblProducts
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'option_value'], 'required'],
            [['title', 'option_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'ID',
            'title' => 'Title',
            'option_value' => 'Option Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(TblPost::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(TblProduct::className(), ['category_id' => 'category_id']);
    }
}
