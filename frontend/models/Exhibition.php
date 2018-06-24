<?php

namespace frontend\models;

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
            'title' => 'выставка',
            'description' => 'описание',
            'date_from' => 'открытие',
            'date_to' => 'закрытие',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExhibitionImages()
    {
        return $this->hasMany(ExhibitionImage::className(), ['exhibition_id' => 'id']);
    }
}
