<?php


namespace app\common\controller;

use hg\apidoc\annotation\Param;
use hg\apidoc\annotation\Returned;
use hg\apidoc\annotation\Query;
use hg\apidoc\annotation\Before;
use hg\apidoc\annotation\After;
use hg\apidoc\annotation\Header;

/**
 * NotParse
 */
class Definitions
{
    /**
     * 获取分页数据列表的参数
     * @Query("pageIndex",type="int",require=true,default="1",desc="查询页数")
     * @Query("pageSize",type="int",require=true,default="20",desc="查询条数")
     * @returned("total",type="int",desc="总条数")
     * @returned("per_page",type="int",desc="每页条数")
     * @returned("current_page",type="int",desc="当前页码")
     * @returned("last_page",type="int",desc="最大页码")
     */
    public function pagingParam(){}


    /**
     * 获取一条数据明细
     * @Query("id",type="int",require=true,desc="唯一id")
     */
    public function getDetail(){}

    /**
     * 删除一条数据明细
     * @Param("id",type="int",require=true,desc="唯一id")
     * @Returned("data",type="boolean",replaceGlobal=true,desc="删除状态")
     */
    public function delDetail(){}

    /**
     * 返回字典数据
     * @returned("id",type="int",desc="唯一id")
     * @returned("name",type="string",desc="字典名")
     * @returned("value",type="string",desc="字典值")
     */
    public function dictionary(){}


    /**
     * @header("Authorization",type="string",require=true,default="test",desc="身份票据123")
     */
    public function auth(){}

    /**
     * 表单验证公用事件
     * @Before(event="ajax",url="/demo/test/getFormToken",method="POST",contentType="appicateion-json",
     *    @Before(event="setParam",key="abc",value="params.phone"),
     *    @Before(event="setParam",key="cc",value="123456"),
     *    @After(event="setHeader",key="X-CSRF-TOKEN",value="res.data.data")
     * )
     */
    public function formTokenEvent(){}


}