<?php

namespace app\demo\controller;

use app\BaseController;
use app\Request;
use hg\apidoc\annotation as Apidoc;

/**
 * 测试用
 * @Apidoc\Group("sub2")
 */
class Test extends BaseController
{

    /**
     * @Apidoc\Title("获取表单验证的token")
     * @Apidoc\Desc("模拟测试用")
     * @Apidoc\Tag("测试")
     * @Apidoc\Method ("POST")
     * @Apidoc\Param("data", type="object",require=true, desc="表单接口的参数")
     * @Apidoc\Returned("token", type="string", desc="token")
     */
    public function getFormToken(Request $request){
        // 忽略业务代码
        return show(0,"","key:".uniqid());
    }


}