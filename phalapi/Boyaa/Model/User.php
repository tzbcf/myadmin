<?php
/**
 * Created by PhpStorm.
 * User: TerrorbladeChen
 * Date: 2017/10/16
 * Time: 11:54
 */
class Model_User extends PhalApi_Model_NotORM {
    public function Userlogin($data) {
        return DI()->notorm->user->select("role1,role2,role3,username")->where("username", $data->username)->where("password", $data->password)->fetch();
    }
    public function getbanner() {
        return DI()->notorm->banner->order("sort asc")->fetchAll();
    }
    public function setbanner() {
        $maxsort=DI()->notorm->banner->max("sort");//让新建的banner数据索引加1
         DI()->notorm->banner->insert(array(
            "img_src" => $_POST['img_src'],
            "banner_title" => $_POST['banner_title'],
            "link"    => $_POST['link'],
            "sort"=>$maxsort+1,
        ));
        return $maxsort+1;
    }
    public function AllRemoveBanner(){
        $arry=explode(",",$_POST['sort']);//把字符串变成数组，然后查询删除
        return DI()->notorm->banner->where("sort",$arry)->fetchAll();//delete()只能用于实际项目中！测试阶段不用;
    }
    public function Oneamend(){
        unset($_POST['create']);
        $data=$_POST;
        return DI()->notorm->banner->where("sort",$_POST['sort'])->Update($data);
    }
    public function Ascdata() {
        $array=explode(",",$_POST['asc']);
        $id=DI()->notorm->banner->select("Id")->where("sort",$array[0])->fetch();
        DI()->notorm->banner->where("sort",$array[1])->Update(array("sort"=>$array[0]));
        return DI()->notorm->banner->where("Id",$id)->Update(array("sort"=>$array[1]));
    }
    public function userlist() {
        return DI()->notorm->user->select("username,time,name,phone,role1,role2,role3")->order("role1 asc")->fetchAll();
    }
    public function Alluserlist(){
        $arry=explode(",",$_POST['id']);//把字符串变成数组，然后查询删除
        return DI()->notorm->banner->where("id",$arry)->fetchAll();//delete()只能用于实际项目中！测试阶段不用;
    }
    public function Bmodule() {
        return DI()->notorm->role1->select("sort,bmodule")->order("sort asc")->fetchAll();
    }
    public function Smodule() {
        return DI()->notorm->role2->select("pid,smodule")->where("sort",$_POST['sort'])->order("pid asc")->fetchAll();
    }
}
