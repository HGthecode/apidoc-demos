<?php
namespace app\common\validate;

use think\Validate;
use think\facade\Request;

class BaseValidate extends  Validate
{
    public function goCheck($scene = "")
    {
        //必须设置contetn-type:application/json
        $request = Request::instance();
        $params = $request->param();

        try {
            $result = $this->scene($scene)
                ->check($params);
            if (!$result) {
                $msg = is_array($this->error) ? implode(
                    ';', $this->error) : $this->error;
                throw new \think\exception\HttpException(415, $msg);
            }
            return $params;
        } catch (ValidateException $e) {
            // 验证失败 输出错误信息
            throw new \think\exception\HttpException(415, $e->getError());
        }

    }

}