<?php


namespace app\common\controller;

use hg\apidoc\annotation as Apidoc;

/**
 * NotParse
 */
class Definitions
{

    #[
        Apidoc\Query("pageIndex",type: "int",require: true,default: 1,desc: "查询页数"),
        Apidoc\Query("pageSize",type: "int",require: true,default: 20,desc: "查询条数"),
    ]
    #[
        Apidoc\Param("pageIndex",type: "int",require: true,default: 1,desc: "查询页数"),
        Apidoc\Param("pageSize",type: "int",require: true,default: 20,desc: "查询条数"),
    ]
    #[
        Apidoc\Returned("total",type: "int",desc: "总条数"),
        Apidoc\Returned("per_page",type: "int",desc: "每页条数"),
        Apidoc\Returned("current_page",type: "int",desc: "当前页码"),
        Apidoc\Returned("last_page",type: "int",desc: "最大页码"),
    ]
    public function pagingParam(){}



    #[Apidoc\Before(event: "ajax",url: "/demo/debugEvent/getFormToken",method: "GET",before: [
        ['event'=>'setQuery',"key"=>"abc","value"=>"body.phone"],
        ['event'=>'setQuery',"key"=>"cc","value"=>"123456"],
    ],after: [
        ['event'=>'setHeader',"key"=>"X-CSRF-TOKEN","value"=>"res.data.data.token"],
    ])]
    #[Apidoc\After(event: "setGlobalHeader",key: "X-CSRF-TOKEN",value: "66666")]
    public function formTokenEvent(){}


    #[ Apidoc\Header("Authorization",type: "string",require: true,desc: "Auto Token")]
    public function authToken(){}


}