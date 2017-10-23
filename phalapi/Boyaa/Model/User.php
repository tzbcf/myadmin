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
    public function setbanner() {
        return DI()->notorm->banner->insert(array(
            "img_src" => $_POST['img_src'],
            "banner_title" => $_POST['banner_title'],
            "link"    => $_POST['link'],
            "sort"=>$_POST['sort'],
        ));
    }
    public function deletebanner($data){
        return DI()->notorm->banner->where("sort",$data->sort)->delete();
    }
}
