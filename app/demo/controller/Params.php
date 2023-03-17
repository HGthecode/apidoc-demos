<?php

namespace app\demo\controller;

use app\admin\services\ApiDoc as ApiDocService;
use app\admin\services\AuthFunction;
use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;
use hg\apidoc\generator\ParseTemplate;
use think\facade\Cookie;


/**
 * lang(api.params.controller.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(2)
 */
class Params extends BaseController
{


    /**
     * @Apidoc\Title("lang(api.params.index.title)")
     * @Apidoc\Query ("username", type="abc",require=true, desc="lang(api.field.username)")
     * @Apidoc\Query("password", type="string",require=true, desc="lang(api.field.password)")
     * @Apidoc\Query("phone", type="string",require=true, desc="lang(api.field.phone)")
     * @Apidoc\Query("sex", type="int",default=2,desc="lang(api.field.sex)" )
     * @Apidoc\Returned("id", type="int", desc="id")
     */
    public function index(){
        $res = $this->request->param();
        return show(0,"",$res);
    }


    /**
     * @Apidoc\Title("lang(api.params.getParams.title)")
     * @Apidoc\Query("info",type="object",desc="lang(api.field.object)",children={
     *     @Apidoc\Query ("name", type="string",desc="lang(api.field.name)",mock="@name"),
     *     @Apidoc\Query ("sex", type="string",desc="lang(api.field.sex)",default="1"),
     *     @Apidoc\Query ("data", type="object",desc="lang(api.field.data)",children={
     *          @Apidoc\Query ("id", type="int",desc="Id",mock="@integer(10, 1000)"),
     *          @Apidoc\Query ("type", type="string",desc="lang(api.field.dataType)",mock="@integer(10, 100)"),
     *     }),
     * })
     * @Apidoc\Query ("reg", type="array",require=true, desc="lang(api.field.array)",children={
     *         @Apidoc\Query ("id", type="int",desc="Id",mock="@integer(10, 100)"),
     *         @Apidoc\Query ("type", type="string",desc="lang(api.field.dataType)",mock="@integer(10, 100)"),
     * })
     * @Apidoc\Query ("username", type="abc",require=true, desc="lang(api.field.username)",mock="@cname")
     * @Apidoc\Query("phone", type="string",require=true, desc="lang(api.field.phone)")
     * @Apidoc\Returned("id", type="int", desc="id")
     */
    public function getParams(){
        $res = $this->request->param();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("lang(api.params.formdata.title)")
     * @Apidoc\Desc("lang(api.params.formdata.desc)")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\ParamType("formdata")
     * @Apidoc\Param("name",type="string", require=true,default="1",desc="lang(api.field.username)",mock="@name")
     * @Apidoc\Param("phone",type="string", require=true,desc="lang(api.field.phone)",mock="@phone")
     * @Apidoc\Returned("res", type="boolean",desc="保存状态")
     */
    public function formdata(Request $request){
        $params = $request->param();
        return show(0,"",$params);
    }

    /**
     * lang(api.params.depth.title)
     * @Apidoc\Desc("lang(api.params.depth.desc)")
     * @Apidoc\Method("post")
     * @Apidoc\Param("info",type="object",desc="lang(api.field.info)",children={
     *     @Apidoc\Param ("name",type="string",desc="lang(api.field.name)"),
     *     @Apidoc\Param ("sex",type="string",desc="lang(api.field.sex)"),
     *     @Apidoc\Param ("group",type="object",desc="lang(api.field.group)",children={
     *          @Apidoc\Param ("groupName",type="string",desc="lang(api.field.groupName)"),
     *          @Apidoc\Param ("groupId",type="int",desc="Id"),
     *     })
     * })
     * @Apidoc\Returned("userList",type="array",desc="lang(api.field.userList)",children={
     *     @Apidoc\Returned ("userInfo",type="object",ref="app\model\User",desc="lang(api.params.depth.refDesc)",children={
     *          @Apidoc\Returned ("group",type="object",desc="lang(api.field.group)",children={
     *               @Apidoc\Returned ("groupName",type="string",desc="lang(api.field.groupName)"),
     *               @Apidoc\Returned ("groupId",type="int",desc="Id"),
     *          })
     *     })
     * })
     */
    public function depth(){
        $res = $this->request->param();
        return show(0,"",$res);
    }


    /**
     * lang(api.params.complex.title)
     * @Apidoc\Method("post")
     * @Apidoc\Param("array_string",type="array",childrenType="boolean",desc="lang(api.field.array)")
     * @Apidoc\Param("array_object",type="array",childrenType="object",desc="lang(api.field.objectArray)",children={
     *     @Apidoc\Param("name",type="string",desc="lang(api.field.name)"),
     *     @Apidoc\Param("code",type="string",desc="lang(api.field.code)"),
     * })
     * * @Apidoc\Param("array_object_object",type="array",childrenType="object",desc="lang(api.field.depthObject)",children={
     *      @Apidoc\Param("name",type="string",desc="lang(api.field.name)"),
     *      @Apidoc\Param("arrObj",type="object",desc="lang(api.field.depthChildren)",children={
     *          @Apidoc\Param("name",type="string",desc="lang(api.field.name)"),
     *          @Apidoc\Param("code",type="string",desc="lang(api.field.code)"),
     *     }),
     * })
     * @Apidoc\Param("array_array_object",type="array",childrenType="array",desc="lang(api.field.depthArray)",children={
     *     @Apidoc\Param("arrObj",type="object",desc="lang(api.field.depthChildren)",children={
     *          @Apidoc\Param("name",type="string",desc="lang(api.field.name)"),
     *          @Apidoc\Param("code",type="string",desc="lang(api.field.code)"),
     *     }),
     * })
     */
    public function complex(){
        $res = $this->request->param();
        return show(0,"",$res);
    }


    /**
     * @Apidoc\Title ("lang(api.params.tree.title)")
     * @Apidoc\Method("POST")
     * @Apidoc\Param("treeData",type="tree", desc="lang(api.field.tree)",childrenField="children",childrenDesc="lang(api.field.treeChildren)",children={
     *     @Apidoc\Param("name",type="string",desc="lang(api.field.name)"),
     *     @Apidoc\Param("code",type="int",desc="lang(api.field.code)"),
     * })
     * @Apidoc\Returned("userData", type="tree", ref="app\model\User",desc="lang(api.field.refTree)",childrenField="children")
     */
    public function tree(){
        $res = $this->request->param();
        return show(0,"",$res);
    }





}