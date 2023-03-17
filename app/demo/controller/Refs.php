<?php

namespace app\demo\controller;

use app\BaseController;
use hg\apidoc\annotation as Apidoc;
use app\model\User;

/**
 * lang(api.refs.controller.title)
 * @Apidoc\Group("base")
 * @Apidoc\Sort(3)
 */
class Refs extends BaseController
{

    /**
     * @Apidoc\Title("lang(api.refs.definitions.title)")
     * @Apidoc\Desc("lang(api.refs.definitions.desc)")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("GET")
     * @Apidoc\Header( ref="auth")
     * @Apidoc\Query ( ref="pagingParam")
     * @Apidoc\Query ("users",type="int",desc="aa",ref={User::class})
     * @Apidoc\Returned("list", type="array",ref="dictionary", desc="lang(api.field.list)")
     */
    public function definitions(){
        $res = $this->request->param();
        return show(0,"",$res);
    }



    /**
     * @Apidoc\Title("lang(api.refs.model.title)")
     * @Apidoc\Desc("lang(api.refs.model.desc)")
     * @Apidoc\Author("HG")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\model\User@getDetail")
     * @Apidoc\Returned(ref="app\model\User")
     */
    public function model(){
        $res = $this->request->param();
        return show(0,"",$res);
    }

    /**
     * @Apidoc\Title("lang(api.refs.service.title)")
     * @Apidoc\Desc("lang(api.refs.service.desc)")
     * @Apidoc\Method("POST")
     * @Apidoc\Param(ref="app\demo\services\User\getPageList")
     * @Apidoc\Returned(ref="app\demo\services\User\getPageList")
     */
    public function service(){
        $res = $this->request->param();
        return show(0,"",$res);
    }


}