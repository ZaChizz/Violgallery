<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_post_image".
 *
 * @property integer $id
 * @property string $title
 * @property string $src
 * @property integer $id_post
 *
 * @property TblPost $idPost
 */
class PostImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_post_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'src', 'id_post'], 'required'],
            [['id_post'], 'integer'],
            [['title', 'src'], 'string', 'max' => 255]
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
            'src' => 'Src',
            'id_post' => 'Id Post',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }

    public function getHash()
    {
        return md5($this->id_post . '-' . $this->id);
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@frontendWebroot/images/post/'. $size .'/'. $this->getHash() . '.jpg');

    }


}
