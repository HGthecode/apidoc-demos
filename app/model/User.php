<?php


namespace app\model;

use think\Model;
use hg\apidoc\annotation\Field;
use hg\apidoc\annotation\WithoutField;
use hg\apidoc\annotation\AddField;
use hg\apidoc\annotation\Param;

class User extends Model
{


    /**
     * @AddField("username",type="string",desc="重写用户名的描述",mdRef="/docs/apiDesc.md#name字段")
     * @AddField("openid",type="string",default="abc",desc="微信openid",md="
    ### openid字段说明
    ```javascript
    var a = 3;
    ```
    ")
     * @AddField("senkey",type="string",default="key",desc="微信key")

     */
    public function getDetail($id){
        $res = $this->get($id);
        return $res;
    }
}