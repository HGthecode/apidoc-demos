<?php

namespace app\demo\controller;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * lang(api.mock.controller.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(4)
 */
class Mock extends BaseController
{

    /**
     * lang(api.mock.index.title)
     * @Apidoc\Method("POST")
     * @Apidoc\Query ("name",type="string",mock="@cname")
     * @Apidoc\Param("number",type="int",mock="@integer(10, 100)")
     * @Apidoc\Param("boolean",type="boolean",mock="@boolean")
     * @Apidoc\Param("date",type="date",mock="@date")
     * @Apidoc\Param("time",type="time",mock="@time('H:m')")
     * @Apidoc\Param("time",type="datetime",mock="@datetime('yyyy-MM-dd HH:mm:ss')")
     * @Apidoc\Param("string",type="string",mock="@string")
     * @Apidoc\Param("name",type="string",mock="@cname")
     * @Apidoc\Param("text",type="string",mock="@cparagraph")
     * @Apidoc\Param("image",type="string",mock="@image('200x100')")
     * @Apidoc\Param("color",type="string",mock="@color")
     * @Apidoc\Param("phone",type="string",mock="@phone")
     * @Apidoc\Param("idcard",type="string",mock="@idcard")
     * @Apidoc\Param("regexp",type="string",mock="@regexp('/\[a-z]{5,10}\-/',3)")
     * @Apidoc\Param("abc",type="string",mock="@abc('666')")
     * @Apidoc\Param("array",type="array",desc="lang(api.field.array)",
     *     @Apidoc\Param("name",type="string",desc="lang(api.field.name)",mock="@cname"),
     *     @Apidoc\Param("age",type="int",desc="lang(api.field.name)",mock="@integer(0, 100)"),
     * )
     */
    public function index(Request $request){
        $params = $request->param();
        $query = $request->get();
        return show(0,"",[
            'body'=>$params,
            'query'=>$query,
        ]);
    }

}