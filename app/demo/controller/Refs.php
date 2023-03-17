<?php

namespace app\demo\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;
use app\common\controller\Definitions;
use app\model\User as UserModel;
use app\demo\services\User as UserService;

#[Apidoc\Title("Ref注解引用")]
#[Apidoc\Group("base")]
#[Apidoc\Sort(3)]
class Refs
{


    #[
        Apidoc\Title("引用公共注解"),
        Apidoc\Method("POST"),
        Apidoc\Header(ref:"authToken"),
        Apidoc\Param(ref:[Definitions::class,"pagingParam"] ),
        Apidoc\Returned(ref: [Definitions::class,"pagingParam"]),
        Apidoc\Returned(name: "data",type: "array",desc: "业务数据",children: [
            ['name'=>'name','type'=>'string','desc'=>'姓名'],
            ['name'=>'age','type'=>'int','desc'=>'年龄'],
        ]),
    ]
    public function definitions(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }



    #[
        Apidoc\Title("引用模型注解"),
        Apidoc\Method("POST"),
        Apidoc\Param(name: "userInfo1",ref:[UserModel::class,"getInfo"],desc: "引用模型中指定的方法"),
        Apidoc\Param(name: "userInfo2",ref:UserModel::class,desc: "引用模型数据表字段"),
        Apidoc\Param(name: "userInfo3",ref:"app\model\User",desc: "引用模型数据表字段"),
        Apidoc\Returned(ref:UserModel::class),
    ]
    public function model(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }


    #[
        Apidoc\Title("引用其它类注解"),
        Apidoc\Method("POST"),
        Apidoc\Param(name: "userInfo",type: "object",ref:[UserService::class,"getList"]),
        Apidoc\Returned(ref:[UserService::class,"getList"]),
    ]
    public function service(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }


}