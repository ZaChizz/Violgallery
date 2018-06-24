<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_comment_status".
 *
 * @property integer $id
 * @property integer $status_value
 * @property string $status_label
 *
 * @property TblComment[] $tblComments
 * @property TblCommentProduct[] $tblCommentProducts
 */
class CommentStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_comment_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_value', 'status_label'], 'required'],
            [['status_value'], 'integer'],
            [['status_label'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_value' => 'Status Value',
            'status_label' => 'Status Label',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblComments()
    {
        return $this->hasMany(Comment::className(), ['status' => 'status_value']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblCommentProducts()
    {
        return $this->hasMany(CommentProduct::className(), ['status' => 'status_value']);
    }
}
