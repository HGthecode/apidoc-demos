<?php


namespace app\demo\controller\user;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * 多级路由
 * @Apidoc\Group("sub1")
 */
class Blog
{
    /**
     * @Apidoc\Title("多级路由")
     * @Apidoc\Method("GET")
     * @Apidoc\Param("username", type="abc",require=true, desc="用户名" )
     * @Apidoc\Param("password", type="string",require=true, desc="密码" )
     * @Apidoc\Param("phone", type="string",require=true, desc="手机号" )
     * @Apidoc\Returned("id", type="int", desc="id"),
     */
    public function index(Request $request)
    {
        $params = $request->param();
        return show(0,"",$params);
    }
}