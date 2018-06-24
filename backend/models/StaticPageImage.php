<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_static_page_image".
 *
 * @property integer $id
 * @property integer $id_static_page
 * @property string $title
 * @property string $type
 *
 * @property TblStaticPage $idStaticPage
 */
class StaticPageImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $resolution;
    public $orientation;

    public static function tableName()
    {
        return 'tbl_static_page_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_static_page', 'title'], 'required'],
            [['id_static_page'], 'integer'],
            [['title', 'type'], 'string', 'max' => 255],
            [['id_static_page'], 'exist', 'skipOnError' => true, 'targetClass' => StaticPage::className(), 'targetAttribute' => ['id_static_page' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_static_page' => 'Id Static Page',
            'title' => 'Title',
            'type' => 'Type',
        ];
    }

    public function getHash()
    {
        return md5('static-' . $this->id);
    }


    public function getPath()
    {
        return Yii::getAlias('@images/staticPage/orig/' . $this->getHash() . '.jpg');
    }

    public function getUrl($size)
    {
        return Yii::getAlias('@backendImages/staticPage/'. $size .'/'. $this->getHash() . '.jpg');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdStaticPage()
    {
        return $this->hasOne(StaticPage::className(), ['id' => 'id_static_page']);
    }
}
