<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_userlike_product".
 *
 * @property integer $user_id
 * @property integer $product_id
 *
 * @property TblProduct $product
 * @property TblUser $user
 */
class UserlikeProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_userlike_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'product_id'], 'required'],
            [['user_id', 'product_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'product_id' => 'Product ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return UserlikeProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserlikeProductQuery(get_called_class());
    }
}
