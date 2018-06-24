<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_style".
 *
 * @property integer $id
 * @property string $title
 * @property string $option_value
 *
 * @property TblProduct[] $tblProducts
 */
class Style extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_style';
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
            'id' => 'ID',
            'title' => 'Title',
            'option_value' => 'Option Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProducts()
    {
        return $this->hasMany(TblProduct::className(), ['style_id' => 'id']);
    }
}
