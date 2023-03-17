<?php

namespace app\demo\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;
use app\model\User as UserModel;


#[Apidoc\Title("接口参数的注解")]
#[Apidoc\Group("base")]
#[Apidoc\Sort(2)]
class Params
{

    #[Apidoc\Title("基础参数")]
    #[Apidoc\Url("/demo/params/index/{userid}")]
    #[Apidoc\Method("POST")]
    #[Apidoc\RouteParam(name:"userid",type: "int",require: true,desc: "路由参数，会员id",mock: "@integer(10, 100)")]
    #[Apidoc\Query(name:"name",type: "string",require: true,desc: "Url的Query参数，姓名",mock: "@cname")]
    #[Apidoc\Query(name:"age",type: "int",require: true,desc: "Url的Query参数，年龄",mock: "@integer(10, 100)")]
    #[Apidoc\Param(name:"username",type: "string",require: true,desc: "请求体中的Body参数，用户名",mock: "@string")]
    #[Apidoc\Param(name:"password",type: "string",require: true,desc: "请求体中的Body参数，密码",mock: "@string")]
    #[Apidoc\Returned(name:"id",type: "int",desc: "响应体中的参数，id")]
    #[Apidoc\Returned(name:"name",type: "string",desc: "响应体中的参数，name")]
    public function index(Request $request,$userid){
        $res = $request->all();
        return json(['code' => 0, 'userid' => $userid,'all'=> $res]);
    }



    #[
        Apidoc\Title("formData传参"),
        Apidoc\Method("POST"),
        Apidoc\ParamType("formdata"),
        Apidoc\Param(name:"name",type: "string",require: true,desc: "姓名",mock: "@string"),
        Apidoc\Param(name:"phone",type: "string",require: true,desc: "电话",mock: "@phone"),
        Apidoc\Returned(name:"name",type: "string",desc: "姓名"),
        Apidoc\Returned(name:"phone",type: "string",desc: "电话"),
    ]
    public function formdata(Request $request){
        $res = $request->all();
        return json(['code' => 0, 'data'=> $res]);
    }


    #[
        Apidoc\Title("深层级数据结构"),
        Apidoc\Method("POST"),
        Apidoc\Param(name:"userInfo",type: "object",require: true,desc: "会员信息",children: [
            ['name'=>'name','type'=>'string','desc'=>'姓名'],
            ['name'=>'sex','type'=>'string','desc'=>'性别'],
            ['name'=>'group','type'=>'object','desc'=>'所属分组','children'=>[
                ['name'=>'groupId','type'=>'int','desc'=>'分组id','md'=>'## 点对点'],
                ['name'=>'groupName','type'=>'string','desc'=>'分组名'],
            ]],
        ]),
        Apidoc\Returned(name:"userList",type: "array",require: true,desc: "会员信息列表",children: [
            ['name'=>'userInfo','type'=>'object','ref'=>UserModel::class,'desc'=>'会员信息','children'=>[
                ['name'=>'openid','type'=>'string','desc'=>'ref引入追加字段，Openid'],
                ['name'=>'email','type'=>'string','desc'=>'ref引入追加字段，邮箱'],
                ['name'=>'group','type'=>'object','desc'=>'ref引入追加字段，所属分组','children'=>[
                    ['name'=>'groupId','type'=>'int','desc'=>'分组id'],
                    ['name'=>'groupName','type'=>'string','desc'=>'分组名'],
                ]],
            ]],
        ]),
    ]
    public function depth(Request $request){
        $res = $request->all();
        return json(['code' => 0, 'data'=> $res]);
    }



    #[
        Apidoc\Title("Tree树形数据结构"),
        Apidoc\Method("POST"),
        Apidoc\Param(name:"treeData",type: "tree",require: true,desc: "会员信息",children: [
            ['name'=>'name','type'=>'string','desc'=>'姓名'],
            ['name'=>'sex','type'=>'string','desc'=>'性别'],
        ]),
        Apidoc\Returned(name:"userData",type: "tree",ref: "app\model\User",desc: "refTree",childrenField: "childs"),
    ]
    public function tree(Request $request){
        $res = $request->all();
        return json(['code' => 0, 'data'=> $res]);
    }

}