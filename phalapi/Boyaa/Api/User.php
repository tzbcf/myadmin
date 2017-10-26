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
                    'min'     => 1,
                    'max'     => 25,
                    'require' => true,
                    'desc'    => '用户的名称'
                ),
                "password" => array(
                    'name'    => 'password',
                    'type'    => 'string',
                    'min'     => 1,
                    'max'     => 32,
                    'require' => true,
                    'desc'    => '用户的密码'
                ),
            ),
            'getbanner'=>array(),
            'setbanner'=>array(),
            "AllRemoveBanner"=>array()
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
    public function AllRemoveBanner(){
        $Domain_User = new  Domain_User();
        return $Domain_User->AllRemoveBanner($_POST);
    }
    public function Oneamend(){
        $Domain_User = new  Domain_User();
        return $Domain_User->Oneamend($_POST);
    }
    public function ascdata(){
        $Domain_User = new  Domain_User();
        return $Domain_User->Ascdata($_POST);
    }
}