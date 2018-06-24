<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_category".
 *
 * @property integer $category_id
 * @property string $title
 *
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
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
			[['option_value'], 'required'],
            [['option_value'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'title' => 'Title',
			'option_value' => 'Option value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProducts()
    {
        return $this->hasMany(TblProduct::className(), ['category_id' => 'category_id']);
    }
}
