<?php


namespace app\demo\controller;

use app\demo\services\User as UserService;
use app\demo\validate\SaveUser as SaveUserValidate;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * @Apidoc\Title("Rest风格的增删改查")
 * @Apidoc\Group("apiDemo")
 */
class UserRest
{

    /**
     * @Apidoc\Title("查询分页列表")
     * @Apidoc\Author("小飞机")
     * @Apidoc\Url("/demo/userRest/list")
     * @Apidoc\Method("GET")
     * @Apidoc\Query("keyword", type="string", desc="关键词" )
     * @Apidoc\Query( ref="pagingParam")
     * @Apidoc\Returned (ref="pagingParam")
     * @Apidoc\Returned("data", type="array",ref="app\model\User",withoutField="delete_time,password",desc="列表数据"),
     */
    public function list(Request $request){
        $keyword = $request->param("keyword");
        $page = $request->param("pageIndex",1);
        $limit = $request->param("pageSize",10);
        if ($limit>20){
            throw new \think\exception\HttpException(422, "演示功能，最大查询20条/页");
        }
        $res = (new UserService())->getPageList($keyword,$page,$limit);
        return show(0,null,$res);
    }

    /**
     * @Apidoc\Title("根据id查询信息")
     * @Apidoc\Author("小飞机")
     * @Apidoc\Url("/demo/userRest/<id>")
     * @Apidoc\Method("GET")
     * @Apidoc\ParamType("route")
     * @Apidoc\RouteParam ("id",type="int",desc="Id")
     * @Apidoc\Returned(ref="app\model\User",withoutField="delete_time,password")
     */
    public function detail(Request $request){
        (new SaveUserValidate())->goCheck("getDetail");
        $id = $request->param("id");
        $res = (new UserService())->getDetailById($id);
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title("新增")
     * @Apidoc\Author("小飞机")
     * @Apidoc\Url("/demo/userRest")
     * @Apidoc\Method("POST")
     * @Apidoc\Param( ref="app\model\User",withoutField="id,create_time,update_time")
     * @Apidoc\Returned(ref="app\model\User")
     */
    public function add(Request $request){
        (new SaveUserValidate())->goCheck("add");
        $params = $request->post();
        $res = (new UserService())->add($params);
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title("编辑")
     * @Apidoc\Url("/demo/userRest")
     * @Apidoc\Method("PUT")
     * @Apidoc\Param( ref="app\model\User",withoutField="create_time,update_time,password")
     * @Apidoc\Returned("data",type="boolean",desc="修改状态",replaceGlobal=true )
     */
    public function edit(Request $request){
        (new SaveUserValidate())->goCheck("edit");
        $params = $request->post();
        $res = (new UserService())->update($params);
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("删除")
     * @Apidoc\Url("/demo/userRest/<id>")
     * @Apidoc\Method("DELETE")
     * @Apidoc\ParamType("route")
     * @Apidoc\Param(ref="delDetail")
     * @Apidoc\Returned(ref="delDetail")
     */
    public function delete(Request $request){
        (new SaveUserValidate())->goCheck("delete");
        $params = $request->post();
        $res = (new UserService())->delete($params['id']);
        return show(0,"",$res);
    }

}