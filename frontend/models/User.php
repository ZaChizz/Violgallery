<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $profile
 * @property string $src
 *
 * @property TblComment[] $tblComments
 * @property TblPost[] $tblPosts
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'src'], 'required'],
            [['profile'], 'string'],
            [['username', 'password', 'email'], 'string', 'max' => 128],
            [['src'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'profile' => 'Profile',
            'src' => 'Src',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblComments()
    {
        return $this->hasMany(Comment::className(), ['author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPosts()
    {
        return $this->hasMany(Post::className(), ['author_id' => 'id']);
    }

    public function getUrl($type=null)
    {
        switch($type){
            case '48x48': return Yii::getAlias('@frontendWebroot/images/user/48x48/' . $this->src);
            case '96x96':  return Yii::getAlias('@frontendWebroot/images/user/96x96/' . $this->src);
            case '72x72': return Yii::getAlias('@frontendWebroot/images/user/72x72/' . $this->src);
            default: return Yii::getAlias('@frontendWebroot/images/user/96x96/' . $this->src);
        }

    }
}
