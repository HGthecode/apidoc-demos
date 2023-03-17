<?php

namespace app\demo\controller;

use app\common\controller\Definitions;
use app\demo\services\User;
use app\model\User as UserModel;
use support\Request;
use hg\apidoc\annotation as Apidoc;
use app\middleware\TestMiddleware;

#[Apidoc\Title("基础示例")]
#[Apidoc\Group("base")]

class Base
{


    #[
        Apidoc\Title("基础的演示"),
        Apidoc\Desc("一些基础的注解参数使用方式"),
        Apidoc\Author("HG"),
        Apidoc\Method("GET"),
        Apidoc\Tag("基础,示例"),
        Apidoc\Url("/demo/base/index"),
        Apidoc\Query(name:"userid",type: "int",require: true,desc: "会员id"),
        Apidoc\Query(name:"page",type: "array",ref: [Definitions::class,"pagingParam"]),
        Apidoc\Query(name: "abc",type: "string",desc: "ddd",mock: "@name"),
    ]
    public function index(Request $request){
        return json(['code' => 0, 'msg' => 'ok']);
    }


    #[
        Apidoc\Title("路由传参"),
        Apidoc\Method("POST"),
        Apidoc\RouteMiddleware([TestMiddleware::class]),
        Apidoc\Url("/demo/base/routeParam/{name}/{phone}"),
        Apidoc\RouteParam("name",type: "string",require: true,desc: "姓名",md: "/docs/apiDesc.md",mock: "@name"),
        Apidoc\RouteParam("phone",type: "string",require: true,desc: "电话",mock: "@phone"),
     ]
    public function routeParam(Request $request,$name,$phone=""){
        return json(['code' => 0, 'name' => $name,'phone'=>$phone]);
    }

    #[
        Apidoc\Title("文件上传"),
        Apidoc\Method("POST"),
        Apidoc\ParamType("formdata"),
        Apidoc\Param("file",type: "file",require: true,desc: "附件"),
        Apidoc\Returned("url",type: "string",require: true,desc: "地址"),
    ]
    public function upload(){
        return json(['code' => 0, 'msg' => 'ok']);
    }

    #[
        Apidoc\Title("多文件上传"),
        Apidoc\Method("POST"),
        Apidoc\ParamType("formdata"),
        Apidoc\Param("file",type: "files",require: true,desc: "附件"),
        Apidoc\Returned("urls",type: "string",require: true,desc: "地址"),
    ]
    public function uploads(){
        return json(['code' => 0, 'msg' => 'ok']);
    }

    #[
        Apidoc\Title("指定请求ContentType"),
        Apidoc\Method("POST"),
        Apidoc\ContentType("application/json"),
        Apidoc\Param("name",type: "string",require: true,desc: "姓名"),
        Apidoc\Returned("name",type: "string",require: true,desc: "姓名"),
    ]
    public function contentType(){
        return json(['code' => 0, 'msg' => 'ok']);
    }

    #[
        Apidoc\Title("多请求类型"),
        Apidoc\Method("GET,POST,PUT,DELETE"),
        Apidoc\Param("name",type: "string",require: true,desc: "姓名"),
        Apidoc\Returned("name",type: "string",require: true,desc: "姓名"),
    ]
    public function multipleMethod(Request $request){
        return json(['code' => 0, 'msg' => 'ok']);
    }

    /**
     * NotParse
     */
    #[
        Apidoc\Title("不解析的接口"),
        Apidoc\Param("name",type: "string",require: true,desc: "姓名"),
        Apidoc\Returned("name",type: "string",require: true,desc: "姓名"),
    ]
    public function notParseApi(){
        return json(['code' => 0, 'msg' => 'ok']);
    }

}