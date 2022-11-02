<?php


namespace app\demo\services;

use app\model\User as UserModel;
use hg\apidoc\annotation as Apidoc;

class User
{

    /**
     * 查询分页数据
     * @param $keyword 关键词
     * @param $page 分页数
     * @param $limit 分页条数
     * @Apidoc\Param( ref="pagingParam")
     * @Apidoc\Param( "keyword",type="string",desc="关键词 name、phone")
     * @Apidoc\Returned( ref="pagingParam")
     * @Apidoc\Returned("data", type="array",ref="app\model\User", desc="用户列表")
     */
    public function getPageList($keyword,$page,$limit){
        $where = [];
        if (!empty($keyword)){
            $where[]=['name|nickname|username','like', "%$keyword%"];
        }
        $res = (new UserModel())->where($where)->withoutField(["delete_time","password"])
            ->paginate(['page' => $page,'list_rows'=> $limit])
            ->toArray();
        return $res;
    }

    /**
     * 根据id查询明细
     * @param $id
     * @return array|\think\Model|null
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function getDetailById($id){
        $res = (new UserModel())->withoutField(["delete_time","password"])->where('id',$id)->find();
        return $res;
    }

    /**
     * 新增
     * @param $params
     * @return UserModel|\think\Model
     */
    public function add($params){
        $res = (new UserModel())->create($params);
        return $res;
    }

    /**
     * 编辑
     * @param $params
     * @return bool
     */
    public function update($params){
        $res = (new UserModel())->where(["id" => $params['id']])->field(true)->save($params);
        return $res==1;
    }

    public function delete($id){
        $res = (new UserModel())->where('id',$id)->delete();
        return $res==1;
    }

}