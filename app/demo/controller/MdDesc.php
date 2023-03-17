<?php

namespace app\demo\controller;

use support\Request;
use hg\apidoc\annotation as Apidoc;


#[Apidoc\Title("Markdown编写接口描述")]
#[Apidoc\Group("base")]
#[Apidoc\Sort(6)]
class MdDesc
{


    #[
        Apidoc\Title("使用md语法写接口说明"),
        Apidoc\Method("POST"),
        Apidoc\Md("
        ## 说明
        
    这里可以使用Markdown语法

    ### 字段说明
    ```javascript
    var a = 1;
    ```
        "),
        Apidoc\Param(name:"name",type: "string",require: true,desc: "姓名",mock: "@string"),
        Apidoc\Returned(name:"name",type: "string",desc: "姓名"),
    ]
    public function mdDesc(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }



    #[
        Apidoc\Title("引用md文档写接口说明"),
        Apidoc\Method("POST"),
        Apidoc\Md(ref: "/docs/apiDesc.md#引用Md文档说明"),
        Apidoc\Param(name:"name",type: "string",require: true,desc: "姓名",mock: "@string"),
        Apidoc\Returned(name:"name",type: "string",desc: "姓名"),
    ]
    public function mdRefDesc(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }


    /**
     * NotResponses
     * NotParams
     * NotHeaders
     * NotQuerys
     */
    #[Apidoc\Title("自定义文档内容")]
    #[Apidoc\Md(ref: "/docs/mdApi.md")]
    public function mdDoc(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }




    #[
        Apidoc\Title("字段描述使用md语法"),
        Apidoc\Method("POST"),
        Apidoc\Param(name:"name",type: "string",require: true,desc: "姓名",md: "
        ### username字段说明
```javascript
  var a = 1;
```
        "),
        Apidoc\Returned(name:"name",type: "string",desc: "姓名",md: "/docs/apiDesc.md#name字段"),
    ]
    public function mdApiFieldDesc(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }



    #[
        Apidoc\Title("使用md定义成功响应体"),
        Apidoc\Method("POST"),
        Apidoc\Param(name:"name",type: "string",require: true,desc: "姓名"),
        Apidoc\ResponseSuccessMd(ref: "/docs/mdResponse.md"),
    ]
    public function mdResponseSuccess(Request $request){
        $params = $request->all();
        return json(['code' => 0, 'data'=> $params]);
    }



}