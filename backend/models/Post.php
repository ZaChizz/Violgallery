<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $preview_content
 * @property string $content
 * @property string $tags
 * @property integer $likes
 * @property integer $status
 * @property integer $typeView
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * @property TblComment[] $tblComments
 * @property TblUser $author
 * @property TblPostImage[] $tblPostImages
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $comment;

    public static function tableName()
    {
        return 'tbl_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'preview_content', 'content', 'likes', 'status', 'typeView', 'author_id'], 'required'],
            [['preview_content', 'content', 'tags'], 'string'],
            [['likes', 'status', 'typeView', 'create_time', 'update_time', 'author_id', 'comment'], 'integer'],
            [['title'], 'string', 'max' => 128]
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
            'preview_content' => 'Preview Content',
            'content' => 'Content',
            'tags' => 'Tags',
            'likes' => 'Likes',
            'status' => 'Status',
            'typeView' => 'Type View',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author ID',
            'comment' => 'Comments'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostImages()
    {
        return $this->hasMany(PostImage::className(), ['id_post' => 'id']);
    }

    public function afterFind()
    {
        if(isset($this->comments))
            $this->comment = count($this->comments);
        else
            $this->comment = 0;
        return $this->comment;
    }
}
