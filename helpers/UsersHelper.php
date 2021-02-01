<?php

namespace app\helpers;

use app\models\User;

class UsersHelper
{
    public static function readUsersFile()
    {
        $userFileContent = file_get_contents(\Yii::$app->basePath . '/users');
        return json_decode($userFileContent, true);
    }

    public static function writeUsersFile($user)
    {
        if (isset(User::$users[$user->id]) && User::$users[$user->id]['errorLoginCount'] < 3) {
            User::$users[$user->id]['errorLoginCount'] = isset(User::$users[$user->id]['errorLoginCount']) ? (User::$users[$user->id]['errorLoginCount'] + 1) : 1;
            User::$users[$user->id]['errorExpireLoginTimestamp'] = time() + 300;
            file_put_contents(\Yii::$app->basePath . '/users', json_encode(User::$users));
            self::updateUsersArr();
        }
    }

    public static function updateUsersArr()
    {
        User::$users = array_replace(User::$users, self::readUsersFile());
    }

    public static function clearUserExpire($user)
    {
        if (isset(User::$users[$user->id])) {
            User::$users[$user->id]['errorLoginCount'] = 0;
            User::$users[$user->id]['errorExpireLoginTimestamp'] = 0;
            file_put_contents(\Yii::$app->basePath . '/users', json_encode(User::$users));
        }
    }
}