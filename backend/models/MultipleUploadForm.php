<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 05.06.2015
 * Time: 20:51
 */


namespace backend\models;


use yii\base\Model;
use yii\web\UploadedFile;

class MultipleUploadForm extends Model
{
    /**
     * @var UploadedFile[] files uploaded
     */
    public $files;
    public $title;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['files'], 'file', 'extensions' => 'jpg', 'mimeTypes' => 'image/jpeg', 'maxFiles' => 10, 'skipOnEmpty' => false],
            [['title'], 'string', 'max' => 255],
            [['title'], 'required'],
        ];
    }
}