<?php

namespace app\test\controller\v1;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * 基础示例
 * @Apidoc\Group("user")
 * @Apidoc\Sort(1)
 */
class Index extends BaseController
{


    /**
     * @Apidoc\Title("基础的接口演示v1")
     * @Apidoc\Desc("一些基础的注解参数使用")
     * @Apidoc\Author("HG")
     * @Apidoc\Tag("基础,示例")
     * @Apidoc\Url ("/demo/base/index")
     * @Apidoc\Method ("GET")
     * @Apidoc\Query("abc",type="string",require=true,default="1",desc="abc标识")
     * @Apidoc\Query("qdatas",type="string",desc="qqq",mock="@cname")
     * @Apidoc\Param("name", type="string",require=true, desc="姓名",mock="@name")
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号",mock="@phone")
     * @Apidoc\Param("sex", type="int",desc="性别" ,mock="@integer(0, 1)")
     * @Apidoc\Returned("id", type="int", desc="id")
     */
    public function index(){
        $res = $this->request->get();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title ("路由带参")
     * @Apidoc\Url("/demo/base/routeParam/:name/<age>")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("name",type="string",desc="姓名",mock="@cname")
     * @Apidoc\Param("age",type="string",desc="年龄",mock="@integer(10, 100)")
     * @Apidoc\Param("id",type="string",desc="id",mock="@integer(1, 100)")
     * @Apidoc\ParamType("route")
     *
     */
    public function routeParam($name,$age,$id){
        $params = $this->request->param();
        return show(0,"",['name'=>$name,'age'=>$age,'id'=>$id,'params'=>$params]);
    }


    /**
     * @Apidoc\Title("文件上传")
     * @Apidoc\Desc("需 ParamType 为 formdata")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("file",type="file", require=true,desc="附件")
     * @Apidoc\Returned("url", type="string",desc="文件地址")
     */
    public function upload(){
        return show(0,"","xxx");
    }

    /**
     * @Apidoc\Title("多文件上传")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("files",type="files", require=true,desc="附件")
     * @Apidoc\Returned("url", type="string",desc="文件地址")
     */
    public function uploads(){
        return show(0,"","xxx");
    }



    /**
     * @Apidoc\Title("指定请求ContentType")
     * @Apidoc\Method("POST")
     * @Apidoc\ContentType("application/json")
     * @Apidoc\Param("name", type="string",require=true, desc="姓名")
     * @Apidoc\Param("sex", type="int",default="1",desc="性别" )
     * @Apidoc\Returned("mssage", type="string", desc="消息",replaceGlobal=true)
     * @Apidoc\Returned("data", type="array", desc="返回数据",replaceGlobal=true,
     *     @Apidoc\Returned("id", type="int", desc="id"),
     * )
     */
    public function contentType(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * 多个请求类型
     * @Apidoc\Method("GET,POST,PUT,DELETE")
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="int",desc="年龄")
     *
     */
    public function multipleMethod(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * NotParse
     * @Apidoc\Param("name",type="string",desc="姓名")
     * @Apidoc\Param("age",type="string",desc="年龄")
     */
    public function notParseApi(){
        return show(0,"通过 notApi 标记该方法不解析");
    }



}