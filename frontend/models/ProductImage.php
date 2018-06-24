<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_product_image".
 *
 * @property integer $id
 * @property string $title
 * @property integer $product_id
 * @property integer $home
 * @property string $resolution
 * @property string $orientation
 *
 * @property TblProduct $product
 */
class ProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'product_id'], 'required'],
            [['product_id', 'home'], 'integer'],
            [['title', 'resolution', 'orientation'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'product_id' => 'Product ID',
            'home' => 'Home',
            'resolution' => 'Resolution',
            'orientation' => 'Orientation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    public function getHash()
    {
        return md5($this->product_id . '-' . $this->id);
    }


    public function getPath()
    {
        return Yii::getAlias('@images/product/orig/' . $this->getHash() . '.jpg');
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@backendImages/product/'. $size .'/'. $this->getHash() . '.jpg');
    }
}
