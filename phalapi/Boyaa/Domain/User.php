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
    public function setbanner(){
        $base64_image_content = $_POST['img_src'];
        //匹配出图片的格式
        preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result);
            $type = $result[2];
            $new_file = dirname(__DIR__)."/Common/img/";
//            print_r($new_file);
        if(!file_exists($new_file))
        {
            //检查是否有该文件夹，如果没有就创建，并给予最高权限
            mkdir($new_file, 0700);
        }
            $time=time();
            $new_file = $new_file.$time.".{$type}";

        file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)));
        $_POST['img_src']="http://www.boyaa_api.com/Boyaa/Common/img/".$time.".{$type}";

        $Model_User = new Model_User();
        $thisdata=$Model_User->setbanner($_POST);
        if (!$thisdata) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $thisdata;
    }
    public function AllRemoveBanner(){
        $Model_User = new Model_User();
        $data=$Model_User->AllRemoveBanner($_POST);
        if (!$data) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $data;
    }
    public function Oneamend(){
        if($_POST['create']!='false'){
            $base64_image_content = $_POST['img_src'];
            //匹配出图片的格式
            preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image_content, $result);
            $type = $result[2];
            $new_file = dirname(__DIR__)."/Common/img/";
            //            print_r($new_file);
            if(!file_exists($new_file))
            {
                //检查是否有该文件夹，如果没有就创建，并给予最高权限
                mkdir($new_file, 0700);
            }
            $time=time();
            $new_file = $new_file.$time.".{$type}";

            file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64_image_content)));
            $_POST['img_src']="http://www.boyaa_api.com/Boyaa/Common/img/".$time.".{$type}";
        }
        $Model_User = new Model_User();
        $thisdata=$Model_User->Oneamend($_POST);
        if (!$thisdata) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $thisdata;
    }
    public function Ascdata(){
        $Model_User = new Model_User();
        $data=$Model_User->Ascdata($_POST);
        if (!$data) {
            throw new PhalApi_Exception_BadRequest(T("No UserList"), -1);
        }
        return $data;
    }
}