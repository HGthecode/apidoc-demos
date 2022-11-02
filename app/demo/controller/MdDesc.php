<?php

namespace app\demo\controller;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;


/**
 * lang(api.mdDesc.controller.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(6)
 */
class MdDesc extends BaseController
{


    /**
     * lang(api.mdDesc.mdDesc.title)
     * @Apidoc\Method("GET")
     * @Apidoc\Md(" ## 说明

    这里可以使用Markdown语法

    ### 字段说明
    ```javascript
    var a = 1;
    ```");
     * @Apidoc\Method("GET")
     * @Apidoc\Param("username", type="string",require=true, desc="lang(api.field.username)")
     */
    public function mdDesc(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * lang(api.mdDesc.mdRefDesc.title)
     * @Apidoc\Desc("lang(api.mdDesc.mdRefDesc.desc)")
     * @Apidoc\Method("GET")
     * @Apidoc\Md (ref="/docs/apiDesc.md#引用Md文档说明")
     * @Apidoc\Param("username", type="string",require=true, desc="lang(api.field.username)")
     */
    public function mdRefDesc(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * lang(api.mdDesc.mdDoc.title)
     * @Apidoc\Desc("lang(api.mdDesc.mdDoc.desc)")
     * @Apidoc\Method("GET")
     * @Apidoc\Md (ref="/docs/mdApi.md")
     * NotResponses
     * NotParams
     * NotHeaders
     * NotQuerys
     */
    public function mdDoc(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }



    /**
     * lang(api.mdDesc.mdApiFieldDesc.title)
     * @Apidoc\Method("GET")
     * @Apidoc\Param("username", type="string",require=true, desc="lang(api.field.username)" ,md="
### username字段说明
```javascript
  var a = 1;
```
    ")
    * @Apidoc\Returned ("username1", type="string",require=true, desc="lang(api.field.username)" ,md="
    ### username字段说明
    ```javascript
    var a = 2;
    ```
    ")
     */
    public function mdApiFieldDesc(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }


    /**
     * lang(api.mdDesc.refMdApiFieldDesc.title)
     * @Apidoc\Method("GET")
     * @Apidoc\Param("mdField", type="string",require=true, mdRef="/docs/apiDesc.md#name字段" )
     * @Apidoc\Param(ref="app\model\User@getDetail")
     * @Apidoc\Returned ("name1", type="string",require=true, mdRef="/docs/apiDesc.md#name字段" )
     */
    public function refMdApiFieldDesc(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }





}