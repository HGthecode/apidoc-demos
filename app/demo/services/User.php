<?php

namespace app\demo\services;

use hg\apidoc\annotation as Apidoc;

class User
{
    #[
        Apidoc\Param('username',type: "string",desc: "用户名"),
        Apidoc\Param('nickname',type: "string",desc: "昵称"),
    ]
    #[
        Apidoc\Returned(ref: \app\model\User::class),
    ]
    public function getList(){

    }
}