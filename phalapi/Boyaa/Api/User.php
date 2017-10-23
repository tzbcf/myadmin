<?php
/**
 * Created by PhpStorm.
 * User: TerrorbladeChen
 * Date: 2017/10/16
 * Time: 11:15
 */

class Api_User extends PhalApi_Api {
    public function getRules() {
        return array(
            'userlogin'=>array(
                "username" => array(
                    'name'    => 'username',
                    'type'    => 'string',
                    'min'     => 6,
                    'max'     => 25,
                    'require' => true,
                    'desc'    => '用户的名称'
                ),
                "password" => array(
                    'name'    => 'password',
                    'type'    => 'string',
                    'min'     => 8,
                    'max'     => 32,
                    'require' => true,
                    'desc'    => '用户的密码'
                ),
            ),
            'setbanner'=>array(
//                'img_src'=>array(
//                    'name'=>'img_src',
//                    "type"=>'string',
//                ),
//                "link"=>array(
//                    'name'=>'link',
//                    "type"=>"string",
//                    "min"=>0,
//                    "max"=>2555,
//                ),
//                "banner_title"=>array(
//                    "name"=>"banner_title",
//                    "type"=>"string",
//                    "min"=>0,
//                    "max"=>2555
//                ),
//                "sort"=>array(
//                    "name"=>"sort",
//                    "type"=>"int",
//                )
            ),
            "deletebanner"=>array(
                "sort"=>array(
                    "name"=>"sort",
                    "type"=>"int"
                )
            )
        );
    }
    public function userlogin() {
        $Domain_User = new  Domain_User();
        return $Domain_User->Userlogin($this);
    }
    public function getbanner(){
        $Domain_User = new  Domain_User();
        return $Domain_User->getbanner($this);

    }
    public function setbanner(){
        $Domain_User = new  Domain_User();
        return $Domain_User->setbanner($_POST);
    }
    public function deletebanner(){
        $Domain_User = new  Domain_User();
        return $Domain_User->deletebanner($this);
    }
}