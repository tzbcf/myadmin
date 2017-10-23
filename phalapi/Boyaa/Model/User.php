<?php
/**
 * Created by PhpStorm.
 * User: TerrorbladeChen
 * Date: 2017/10/16
 * Time: 11:54
 */
class Model_User extends PhalApi_Model_NotORM {
    public function Userlogin($data) {
        return DI()->notorm->user->select("username")->where("username", $data->username)->where("password", $data->password)->fetch();
    }
    public function getbanner() {
        return DI()->notorm->banner->order("sort asc")->fetchAll();
    }
    public function setbanner($data) {
        return DI()->notorm->banner->insert(array(
            "img_src" => $data->img_src,
            "banner_title" => $data->banner_title,
            "link"    => $data->link,
            "sort"=>$data->sort
        ));
    }
    public function deletebanner($data){
        return DI()->notorm->banner->where("sort",$data->sort)->delete();
    }
}
