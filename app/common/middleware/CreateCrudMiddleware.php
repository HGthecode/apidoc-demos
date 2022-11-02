<?php

namespace app\common\middleware;

/**
 * 生成器创建Crud中间件
 */
class CreateCrudMiddleware
{


    public function before ($tplParams){
        throw new \think\exception\HttpException(415, "演示项目，暂不支持文件生成，请自行部署来体验");
    }

    public function after($tplParams){

    }




}