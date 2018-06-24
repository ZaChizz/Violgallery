<?php

namespace frontend\models;

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
 * @property integer $views
 * @property integer $category_id
 * @property integer $status
 * @property integer $typeView
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * @property TblComment[] $tblComments
 * @property TblUser $author
 * @property TblCategory $category
 * @property TblPostImage[] $tblPostImages
 * @property TblRelatedPost[] $tblRelatedPosts
 * @property TblRelatedPost[] $tblRelatedPosts0
 * @property TblUserlikePost[] $tblUserlikePosts
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['title', 'preview_content', 'content', 'category_id', 'status', 'typeView', 'author_id'], 'required'],
            [['preview_content', 'content', 'tags'], 'string'],
            [['likes', 'views', 'category_id', 'status', 'typeView', 'create_time', 'update_time', 'author_id'], 'integer'],
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
            'views' => 'Views',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'typeView' => 'Type View',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'author_id' => 'Author ID',
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostImage()
    {
        return $this->hasMany(PostImage::className(), ['id_post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelatedPosts()
    {
        return $this->hasMany(RelatedPost::className(), ['related_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserlikePosts()
    {
        return $this->hasMany(UserlikePost::className(), ['post_id' => 'id']);
    }

    public function like()
    {
        if(!$this->find_like()) {
            $model = new UserlikePost;
            $model->user_id = Yii::$app->getUser()->id;
            $model->post_id = $this->id;
            $model->save();
            $this->likes++;
            $this->save();
        }
        else{
            $model = UserlikePost::find()
                ->where(['user_id' => Yii::$app->getUser()->id, 'post_id' => $this->id])
                ->one();
            $model->delete();
            $this->likes--;
            $this->save();
        }

        $res = array(
            'body'    => $this->likes,
            'auth' => $this->find_like()?'icon-heart-o':'icon-heart',
            'success' => true,
        );

        return $res;
    }

    public function find_like()
    {
        if(isset($this->userlikePosts))
        {
            foreach($this->userlikePosts as $value)
            {
                if($value->user_id === Yii::$app->getUser()->id)
                    return true;
            }
        }

        return false;
    }
}
