<?php

namespace app\demo\controller;

use app\middleware\ApiCrossDomain;
use app\middleware\TestMiddleware;
use support\Request;
use hg\apidoc\annotation as Apidoc;


#[Apidoc\Title("调试时事件")]
#[Apidoc\Group("base")]
#[Apidoc\Sort(5)]
class DebugEvent
{

    #[Apidoc\Title("基础事件")]
    #[Apidoc\Method("POST")]
    #[Apidoc\Param("name",type: "string",require: true,desc: "姓名",mock: "@name")]
    #[Apidoc\Param("scrfToken",type: "string",require: true,desc: "请求时将该值设置为请求头参数",mock: "@string")]
    #[Apidoc\Before(event: "setHeader",key: "X-CSRF-TOKEN",value: "body.scrfToken")]
    #[Apidoc\Before(event: "clearBody",key: "name")]
    public function index(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data' => $params]);
    }


    #[Apidoc\Title("登录事件")]
    #[Apidoc\Desc("调试时自动将password字段md5加密，请求响应后自动将token设置在全局参数中")]
    #[Apidoc\Method("POST")]
    #[Apidoc\Param("username",type: "string",require: true,desc: "用户名",mock: "@name")]
    #[Apidoc\Param("password",type: "string",require: true,desc: "登录密码",mock: "@string")]
    #[Apidoc\Before(event: "md5",key: "password",value: "body.password",desc: "咪咪咪咪")]
    #[Apidoc\After(event: "setGlobalHeader",key: "Authorization",value: "res.data.data.token",desc: "Token")]
    public function login(Request $request){
        $params=$request->all();
        $res = [
            'uid'=>1,
            'username'=>  $params['username'],
            'token' =>  "Bearer ".uniqid(),
            'refresh_token'=>uniqid()
        ];
        return json(['code' => 0, 'data' => $res]);
    }


    #[Apidoc\Title("表单验证")]
    #[Apidoc\Desc("在接口请求前通过事件发起一个请求，将该请求响应参数作为该接口的请求头/参数")]
    #[Apidoc\Method("POST")]
    #[Apidoc\Param("name",type: "string",require: true,desc: "姓名",mock: "@name")]
    #[Apidoc\Param("phone",type: "string",require: true,desc: "电话",mock: "@phone")]
    #[Apidoc\Before(event: "ajax",value: "body.",url: "/demo/debugEvent/getFormToken",method: "GET",after: [
        ['event'=>'setHeader',"key"=>"X-CSRF-TOKEN","value"=>"res.data.data.token"]
    ])]
    public function formToken(Request $request){
        $params = $request->all();
        $header = $request->header();
        $res = [
            "params"=>$params,
            "header"=>$header,
        ];
        return json(['code' => 0, 'data' => $res]);
    }

    #[Apidoc\Title("获取表单Token")]
    #[Apidoc\Method("GET")]
    public function getFormToken(Request $request){
        $res = [
            'uid'=>1,
            'token' =>  "Bearer ".uniqid(),
            'refresh_token'=>uniqid()
        ];
        return json(['code' => 0, 'data' => $res]);
    }


    #[Apidoc\Title("事件引用")]
    #[Apidoc\Method("POST")]
    #[Apidoc\Before(ref:"formTokenEvent")]
    #[Apidoc\After(ref:"formTokenEvent")]
    public function eventRef(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data' => $params]);
    }

    #[Apidoc\Title("自定义事件")]
    #[Apidoc\Method("POST")]
    #[Apidoc\Before(event:"renderGetUrl")]
    public function testMyEvent(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data' => $params]);
    }
}