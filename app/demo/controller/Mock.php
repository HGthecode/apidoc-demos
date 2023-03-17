<?php

namespace app\demo\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;


#[Apidoc\Title("Mock请求数据")]
#[Apidoc\Group("base")]
#[Apidoc\Sort(4)]
class Mock
{

    #[
        Apidoc\Title("调试时自动生成Mock数据"),
        Apidoc\Method("POST"),
        Apidoc\Param(name:"name",type: "string",desc: "姓名",mock: "@cname"),
        Apidoc\Param(name:"number",type: "int",desc: "数字",mock: "@integer(10, 100)"),
        Apidoc\Param(name:"boolean",type: "boolean",desc: "Boolean",mock: "@boolean"),
        Apidoc\Param(name:"date",type: "date",desc: "日期",mock: "@date"),
        Apidoc\Param(name:"time",type: "time",desc: "时间",mock: "@time('H:m')"),
        Apidoc\Param(name:"datetime",type: "datetime",desc: "日期时间",mock: "@datetime('yyyy-MM-dd HH:mm:ss')"),
        Apidoc\Param(name:"string",type: "string",desc: "字符串",mock: "@string"),
        Apidoc\Param(name:"text",type: "string",desc: "文本",mock: "@cparagraph"),
        Apidoc\Param(name:"image",type: "string",desc: "图片",mock: "@image('200x100')"),
        Apidoc\Param(name:"color",type: "string",desc: "颜色",mock: "@color"),
        Apidoc\Param(name:"phone",type: "string",desc: "手机号",mock: "@phone"),
        Apidoc\Param(name:"idcard",type: "string",desc: "身份证",mock: "@idcard"),
        Apidoc\Param(name:"regexp",type: "string",desc: "正则",mock: "@regexp('/\[a-z]{5,10}\-/',3)"),
        Apidoc\Param(name:"custom",type: "string",desc: "自定义",mock: "@abc('666')"),
    ]
    public function index(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }

}