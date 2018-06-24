<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_static_page".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 *
 * @property TblStaticPageImage[] $tblStaticPageImages
 */
class StaticPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_static_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'body'], 'required'],
            [['body'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'body' => 'Body',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStaticPageImages()
    {
        return $this->hasMany(StaticPageImage::className(), ['id_static_page' => 'id']);
    }
}
