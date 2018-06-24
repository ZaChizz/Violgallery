<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_post_image".
 *
 * @property integer $id
 * @property string $title
 * @property integer $id_post
 * @property string $resolution
 * @property string $orientation
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
            [['title', 'id_post', ], 'required'],
            [['id_post'], 'integer'],
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
            'id_post' => 'Id Post',
            'resolution' => 'Resolution',
            'orientation' => 'Orientation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }

    public function getHash()
    {
        return md5($this->id_post . '-' . $this->id);
    }

    public function getPath()
    {
        return Yii::getAlias('@images/post/orig/' . $this->getHash() . '.jpg');
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@backendImages/post/'. $size .'/'. $this->getHash() . '.jpg');
    }
}
