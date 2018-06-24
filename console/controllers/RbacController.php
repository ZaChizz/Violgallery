<?php
/**
 * Created by PhpStorm.
 * User: Ievgen
 * Date: 14.05.2015
 * Time: 6:37
 */

namespace console\controllers;
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные

        // add "createPost" permission
        $createPost = $auth->createPermission('createPost');
        $createPost->description = 'Create a post';
        $auth->add($createPost);

        // add "updatePost" permission
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Update post';
        $auth->add($updatePost);

        // add "deletePost" permission
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = 'Delete post';
        $auth->add($deletePost);

        // add "like" permission
        $like = $auth->createPermission('like');
        $like->description = 'action like';
        $auth->add($like);

        // add "comment" permission
        $comment = $auth->createPermission('comment');
        $comment->description = 'action comment';
        $auth->add($comment);

        // add "admin" permission
        $manage = $auth->createPermission('manage');
        $manage->description = 'action manage';
        $auth->add($manage);

        // add "user" role and give this role the "like" permission
        $user = $auth->createRole('user');
        $auth->add($user);
        $auth->addChild($user, $like);
        $auth->addChild($user, $comment);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $updatePost);
        $auth->addChild($author, $deletePost);
        $auth->addChild($author, $like);


        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        //$auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $manage);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($user, 6);
        $auth->assign($admin, 1);
        $auth->assign($user, 3);
    }
    public function actionDelete()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удаляем старые данные
    }
}