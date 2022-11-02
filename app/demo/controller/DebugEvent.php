<?php

namespace app\demo\controller;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * lang(api.debugEvent.controller.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(5)
 */
class DebugEvent extends BaseController
{

    /**
     * @Apidoc\Title ("lang(api.debugEvent.index.title)")
     * @Apidoc\Method("POST")
     * @Apidoc\Param("name",type="string",desc="lang(api.field.name)",mock="@cname")
     * @Apidoc\Param("phone",type="string",desc="lang(api.field.phone)",mock="@phone")
     * @Apidoc\Param("scrfToken",type="string",desc="lang(api.debugEvent.index.scrfToken)",mock="@string")
     * @Apidoc\Before(event="setHeader",key="X-CSRF-TOKEN",value="body.phone")
     * @Apidoc\Before(event="clearBody",key="name")
     * @Apidoc\After(event="check",key="res.status",value="200",desc="断言请求状态码为200")
     * @Apidoc\After(event="check",key="res.data.code",value="0",desc="断言响应code为0")
     */
    public function index(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * @Apidoc\Title ("lang(api.debugEvent.login.title)")
     * @Apidoc\Desc("lang(api.debugEvent.login.desc)")
     * @Apidoc\Method("POST")
     * @Apidoc\Param("username",type="string",desc="lang(api.field.username)",mock="@name")
     * @Apidoc\Param("password",type="string",desc="lang(api.field.password)",mock="@phone")
     * @Apidoc\Before(event="setBody",key="password",handleValue="md5",value="body.password")
     * @Apidoc\After(event="setGlobalHeader",key="Authorization",value="res.data.token",desc="lang(api.field.token)")
     */
    public function login(Request $request){
        $params = $request->param();
        $res = [
            'uid'=>1,
            'username'=>  $params['username'],
            'token' =>  "Bearer xxxxxxxx".uniqid()
        ];
        return show(0,"",$res);
    }


    /**
     * @Apidoc\Title ("lang(api.debugEvent.formToken.title)")
     * @Apidoc\Desc("lang(api.debugEvent.formToken.desc)")
     * @Apidoc\Method("POST")
     * @Apidoc\Param("name",type="string",desc="lang(api.field.name)",mock="@cname")
     * @Apidoc\Param("phone",type="string",desc="lang(api.field.phone)",mock="@phone")
     * @Apidoc\Param("age",type="int",desc="lang(api.field.age)",mock="@integer(1, 100)")
     * @Apidoc\Before(event="ajax",url="/demo/test/getFormToken",method="POST",contentType="appicateion-json",
     *    @Apidoc\Before(event="setBody",value="body."),
     *    @Apidoc\After(event="setHeader",key="X-CSRF-TOKEN",value="res.data.data")
     * )
     * @Apidoc\Before(event="setBody",key="password",handleValue="md5",value="body.password")
     */
    public function formToken(Request $request){
        $params = $request->param();
        $header = $request->header();
        $token = $request->header("x-csrf-token");
        $res = [
            "params"=>$params,
            "header"=>$header,
            'token'=>urldecode($token)
        ];
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title ("lang(api.debugEvent.eventRef.title)")
     * @Apidoc\Method("POST,GET")
     * @Apidoc\Param("name",type="string",desc="lang(api.field.name)")
     * @Apidoc\Param("phone",type="string",desc="lang(api.field.phone)")
     * @Apidoc\Before(event="setParam",key="abc",value="6666")
     * @Apidoc\Before(ref="formTokenEvent")
     * @Apidoc\After (ref="formTokenEvent")
     */
    public function eventRef(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }



}