<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_related_post".
 *
 * @property integer $id
 * @property integer $id_post
 * @property integer $related_id
 *
 * @property TblPost $related
 * @property TblPost $idPost
 */
class RelatedPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_related_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_post', 'related_id'], 'required'],
            [['id_post', 'related_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_post' => 'Id Post',
            'related_id' => 'Related ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelated()
    {
        return $this->hasOne(Post::className(), ['id' => 'related_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'id_post']);
    }
}
