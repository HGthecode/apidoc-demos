<?php

namespace app\demo\controller;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * lang(api.base.index.controller)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(1)
 */
class Base extends BaseController
{


    /**
     * @Apidoc\Title("lang(api.base.index.title)")
     * @Apidoc\Author("HG")
     * @Apidoc\Tag("lang(api.base.index.tag)")
     * @Apidoc\Url ("/demo/base/index")
     * @Apidoc\Method ("GET")
     * @Apidoc\Query("name", type="string",require=true, desc="lang(api.base.index.name)",mock="@name")
     * @Apidoc\Query("phone", type="string",require=true, desc="lang(api.base.index.phone)",mock="@phone")
     * @Apidoc\Query("sex", type="int",desc="lang(api.base.index.sex)" ,mock="@integer(0, 1)")
     * @Apidoc\Returned("id", type="int", desc="id")
     * @Apidoc\Returned("name", type="string", desc="Name")
     */
    public function index(){
        $res = $this->request->get();
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title ("lang(api.base.routeParam.title)")
     * @Apidoc\Url("/demo/base/routeParam/:name/<age>")
     * @Apidoc\Method("POST")
     * @Apidoc\RouteParam("name",type="string",desc="lang(api.base.index.name)",mock="@cname")
     * @Apidoc\RouteParam("age",type="string",desc="lang(api.base.index.sex)",mock="@integer(10, 100)")
     * @Apidoc\Query("id",type="string",desc="id",mock="@integer(1, 100)")
     *
     */
    public function routeParam($name,$age,$id){
        $params = $this->request->param();
        return show(0,"",['name'=>$name,'age'=>$age,'id'=>$id,'params'=>$params]);
    }


    /**
     * @Apidoc\Title("lang(api.base.routeParam.upload)")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("file",type="file", require=true,desc="lang(api.base.routeParam.file)")
     * @Apidoc\Returned("url", type="string",desc="lang(api.base.routeParam.fileUrl)")
     */
    public function upload(){
        return show(0,"","xxx");
    }

    /**
     * @Apidoc\Title("lang(api.base.routeParam.uploads)")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("files",type="files", require=true,desc="lang(api.base.routeParam.file)")
     * @Apidoc\Returned("url", type="string",desc="lang(api.base.routeParam.fileUrl)")
     */
    public function uploads(){
        return show(0,"","xxx");
    }



    /**
     * @Apidoc\Title("lang(api.base.contentType.title)")
     * @Apidoc\Method("POST")
     * @Apidoc\ContentType("application/json")
     * @Apidoc\Param("name", type="string",require=true, desc="lang(api.base.index.name)")
     * @Apidoc\Param("sex", type="int",default="1",desc="lang(api.base.index.sex)" )
     * @Apidoc\Returned ("name", type="string", desc="lang(api.base.index.name)")
     * @Apidoc\Returned("sex", type="int",desc="lang(api.base.index.sex)" )
     */
    public function contentType(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * lang(api.base.multipleMethod.title)
     * @Apidoc\Method("GET,POST,PUT,DELETE")
     * @Apidoc\Param("name",type="string",desc="lang(api.base.index.name)")
     * @Apidoc\Param("age",type="int",desc="lang(api.base.index.age)")
     *
     */
    public function multipleMethod(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * NotParse
     * @Apidoc\Param("name",type="string",desc="姓名")
     */
    public function notParseApi(){
        return show(0,"通过 notApi 标记该方法不解析");
    }

    /**
     * lang(api.base.customResponses.title)
     * @Apidoc\Method("GET")
     * @Apidoc\Query("name",type="string",desc="姓名",mock="@cname")
     * @Apidoc\Query("age",type="string",desc="年龄",mock="@integer(10, 100)")
     */
    public function customResponses(){
        $res = $this->request->get();
        dump($res);
    }


}