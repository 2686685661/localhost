<?php

namespace MyWeb\controller;


class UserInformation extends Controller
{
    private $usermodel = null;

    public function __construct() {

        $this->usermodel = new \MyWeb\model\UserModel();

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }

    }

    /**
     * 显示用户资料页面
     * @return string
     */
    public function userData(){

        $result = $this->usermodel->searchUserDataById([$_SESSION['myid']]);

        if(count($result)){

            $this->data = $result[0];

            $content = $this->display('userData');

            return $this->goodJson($content);

        }else{

            return $this->badJson('用户不存在');

        }

    }

    /**
     * 显示修改用户资料页面
     * @return string
     */
    public function resetUserData(){

        $result = $this->usermodel->searchUserDataById([$_SESSION['myid']]);

        if(count($result)){

            $this->data = $result[0];

            $content = $this->display('resetUserData');

            return $this->goodJson($content);

        }else{

            return $this->badJson('用户不存在');

        }
    }

    /**
     *设置用户资料
     * @param $parms
     * @return string
     */
    public function setUserData($parms){


        if (empty(trim($parms['name']))){

            return $this->badJson('用户名为空');

        }

        $result = $this->usermodel->setUserData($parms);

        if($result){

            $up = new \MyWeb\common\FileUpload();

            $up->set('path','./img');

            $uploadresult = $up->upload('head');

            if($uploadresult){

                $fileName = $up->getFileName();

                $result  = [];
                $isError = false;

                foreach ($fileName as $key => $value){

                    $result[$key] = $this->usermodel->setUserhead([$value]);

                    if(!$result[$key]){

                        $isError = true;

                    }

                }

                if($isError)
                    return $this->badJson($result);
                else
                    return $this->goodJson('',count($fileName).'头像修改成功,修改用户资料成功');

            }else{

                return $this->badJson("用户信息修改成功,头像更改失败");

            }


        }else{

            return $this->badJson('修改失败');

        }

    }

    /**
     * 显示账号安全页面
     */
    public function security(){

        $content = $this->display('security');

        return $this->goodJson($content);

    }

    /**
     * 判断用户密码
     * @param $parms
     * @return string
     */
    public function findById($parms){

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }

        $password = $parms['password'];

        if(empty($password)){

            return $this->badJson('密码为空');

        }

        $result = $this->usermodel->findById([$_SESSION['myid'],md5($password)]);

        if(count($result) == 0){

            return $this->badJson('密码错误');

        }else{

            $this->data = $result[0];

            $content = $this->display('findById');

            return $this->goodJson($content);

        }

    }

    /**
     * 修改密码/密保问题/密保答案
     * @param $parms
     * @return string
     */
    public function replaceSecurityData($parms){

        $question = $parms['question'];

        if(!empty($question)){

            $question = str_replace(' ', '',$question);
            if($question == '')
                return $this->badJson('密保问题为空');

        }else
            return $this->badJson('密保问题为空');

        $answer = $parms['answer'];

        if(!empty($answer)){

            $answer = str_replace(' ', '',$answer);
            if($answer == '')
                return $this->badJson('密保答案为空');

        }else
            return $this->badJson('密保答案为空');


        $password = $parms['password'];

        if(!empty($password)){

            $password = str_replace(' ', '',$password);
            if($password == '')
                return $this->badJson('更新密码为空');

        }else
            return $this->badJson('更新密码为空');

        $newpassword = $parms['newpassword'];

        if(!empty($newpassword)){

            $newpassword = str_replace(' ', '',$newpassword);
            if($newpassword == '')
                return $this->badJson('确认密码为空');

        }else
            return $this->badJson('确认密码为空');

        if($password !== $newpassword){

            return $this->badJson('两次密码不一致');

        }

        $result = $this->usermodel->replaceSecurityData([$question,$answer,md5($password)]);

        if ($result == 0){

            return $this->badJson('修改失败');

        }else{

            return $this->goodJson('','修改成功');

        }

    }

    public function home(){

        $result = $this->usermodel->searchUserDataByName(['魏亚林']);

        if(count($result) !== 0){

            return $this->display('home');

        }else{

            return '站主名错误';

        }

    }

}