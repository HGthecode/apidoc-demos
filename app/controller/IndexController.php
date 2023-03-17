<?php

namespace app\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;
class IndexController
{


    /**
     * 测试注解
     * @Apidoc\Url("/index1")
     */
    public function index(Request $request)
    {
        return response('hello webman');
    }

    public function view(Request $request)
    {
        return view('index/view', ['name' => 'webman']);
    }

    public function json(Request $request)
    {
        return json(['code' => 0, 'msg' => 'ok']);
    }

}
