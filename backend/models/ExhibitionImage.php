<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_exhibition_image".
 *
 * @property integer $id
 * @property string $title
 * @property integer $exhibition_id
 * @property integer $home
 * @property string $resolution
 * @property string $orientation
 *
 * @property TblExhibition $exhibition
 */
class ExhibitionImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_exhibition_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'exhibition_id'], 'required'],
            [['exhibition_id', 'home'], 'integer'],
            [['title', 'resolution', 'orientation'], 'string', 'max' => 255],
            [['exhibition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Exhibition::className(), 'targetAttribute' => ['exhibition_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'заголовок картинки',
            'exhibition_id' => 'выставка',
            'home' => 'постер',
            'resolution' => 'разрешение',
            'orientation' => 'ориентация',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExhibition()
    {
        return $this->hasOne(Exhibition::className(), ['id' => 'exhibition_id']);
    }

    public function getHash()
    {
        return md5($this->exhibition_id . '-' . $this->id);
    }


    public function getPath()
    {
        return Yii::getAlias('@images/exhibition/orig/' . $this->getHash() . '.jpg');
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@backendImages/exhibition/'. $size .'/'. $this->getHash() . '.jpg');
    }
}
