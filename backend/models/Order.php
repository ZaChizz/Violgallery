<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_order".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $message
 * @property integer $status
 * @property integer $create_time
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'message', 'status', 'create_time'], 'required'],
            [['product_id', 'status', 'create_time'], 'integer'],
            [['message'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'message' => 'Message',
            'status' => 'Status',
            'create_time' => 'Create Time',
        ];
    }
}
