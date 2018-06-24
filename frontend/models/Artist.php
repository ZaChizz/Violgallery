<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tbl_artist".
 *
 * @property integer $artist_id
 * @property string $name
 * @property string $lastname
 * @property string $about
 * @property string $image
 * @property integer $like
 * @property integer $view
 *
 * @property TblProduct[] $tblProducts
 */
class Artist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    //public $goroskop;

    public static function tableName()
    {
        return 'tbl_artist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'lastname', 'about', 'image', 'like', 'view'], 'required'],
            [['about'], 'string'],
            [['like', 'view'], 'integer'],
            [['name', 'lastname', 'image'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'artist_id' => 'Artist ID',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'about' => 'About',
            'image' => 'Image',
            'like' => 'Like',
            'view' => 'View',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['artist_id' => 'artist_id']);
    }
	
	public function getUrl($type=null)
    {
        switch($type){
            case '48x48': return Yii::getAlias('@frontendWebroot/images/artist/48x48/' . $this->image);
			case '72x72':  return Yii::getAlias('@frontendWebroot/images/artist/72x72/' . $this->image);
			case '96x96':  return Yii::getAlias('@frontendWebroot/images/artist/96x96/' . $this->image);
            default: return Yii::getAlias('@frontendWebroot/images/product/72x72/' . $this->image);
        }

    }
}
