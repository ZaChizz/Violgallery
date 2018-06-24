<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_comment".
 *
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $post_id
 * @property integer $author_id
 * @property integer $create_time
 * @property integer $update_time
 *
 * @property TblPost $post
 * @property TblUser $author
 * @property TblCommentStatus $status0
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const DRAFT_VALUE = 1;
    const PUBLISHED_VALUE = 2;
    const ARCHIVE_VALUE = 3;

    const DRAFT_LABEL = 'draft';
    const PUBLISHED_LABEL = 'published';
    const ARCHIVE_LABEL = 'archive';

    public static function tableName()
    {
        return 'tbl_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'status', 'post_id', 'author_id', 'create_time', 'update_time'], 'required'],
            [['content'], 'string'],
            [['status', 'post_id', 'author_id', 'create_time', 'update_time'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'post_id' => 'Post ID',
            'author_id' => 'Author ID',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
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
    public function getStatus0()
    {
        return $this->hasOne(CommentStatus::className(), ['status_value' => 'status']);
    }
}
