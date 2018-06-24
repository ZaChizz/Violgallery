<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_exhibition".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $date_from
 * @property integer $date_to
 *
 * @property TblExhibitionImage[] $tblExhibitionImages
 */
class Exhibition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $resolution;
    public $orientation;

    public static function tableName()
    {
        return 'tbl_exhibition';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'date_from', 'date_to'], 'required'],
            [['description'], 'string'],
            [['date_from', 'date_to'], 'integer'],
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
            'description' => 'Description',
            'date_from' => 'Open',
            'date_to' => 'End',
        ];
    }

    public function getHash()
    {
        return md5('coverimage-' . $this->id);
    }


    public function getPath()
    {
        return Yii::getAlias('@images/exhibition/orig/' . $this->getHash() . '.jpg');
    }

    public function getCoverPath()
    {
        return Yii::getAlias('@images/exhibition/cover/orig/' . $this->getHash() . '.jpg');
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@backendImages/exhibition/'. $size .'/'. $this->getHash() . '.jpg');
    }

    public function getUrlCover($size)
    {
        return Yii::getAlias('@backendImages/exhibition/cover/'. $size .'/'. $this->getHash() . '.jpg');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExhibitionImages()
    {
        return $this->hasMany(ExhibitionImage::className(), ['exhibition_id' => 'id']);
    }
}
