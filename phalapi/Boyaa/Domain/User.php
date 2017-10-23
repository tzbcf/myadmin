<?php
/**
 * Created by PhpStorm.
 * User: TerrorbladeChen
 * Date: 2017/10/16
 * Time: 11:52
 */
class Domain_User {
    public function Userlogin($data) {

        $Model_User = new Model_User();
        $user = $Model_User->Userlogin($data);
        if (!$user) {
            throw new PhalApi_Exception_BadRequest(T("No UserInfo"), -1);
        }
        return $user;
    }
    public function getbanner(){
        $Model_User = new Model_User();
        $bannerlist=$Model_User->getbanner();
        if (!$bannerlist) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $bannerlist;
    }
    public function setbanner($data){
        $Model_User = new Model_User();
        $thisdata=$Model_User->setbanner($data);
        if (!$thisdata) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return 1;
    }
    public function deletebanner($data){
        $Model_User = new Model_User();
        $data=$Model_User->deletebanner($data);
        if (!$data) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $data;
    }
}