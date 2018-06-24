<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 14.05.2015
 * Time: 6:35
 */

namespace common\components\rbac;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use common\models\User;

class UserRoleRule extends Rule
{
    public $name = 'userRole';
    public function execute($user, $item, $params)
    {
        //Получаем массив пользователя из базы
        $user = ArrayHelper::getValue($params, 'user', User::findOne($user));
        if ($user) {
            $role = Yii::$app->authManager->getRolesByUser($user->id); //Значение из поля role базы данных
            if ($item->name === 'admin') {
                return $role == User::ROLE_ADMIN;
            } elseif ($item->name === 'author') {
                //moder является потомком admin, который получает его права
                return $role == User::ROLE_ADMIN || $role == User::ROLE_AUTHOR;
            }
            elseif ($item->name === 'user') {
                return $role == User::ROLE_ADMIN || $role == User::ROLE_AUTHOR
                || $role == User::ROLE_USER;
            }
        }
        return false;
    }
}