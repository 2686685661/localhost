<?php
/**
 * Created by PhpStorm.
 * User: weiyalin
 * Date: 17-4-22
 * Time: 下午10:01
 */

namespace MyWeb\controller;


class Login extends Controller
{
    private $usermodel = null;
    public function __construct(){
        $this->usermodel = new \MyWeb\model\UserModel();
    }

    /**
     * 登录
     */
    public function login(){

        if ($this->isOnLine()){

            $result =  $this->usermodel->searchUserDataByName([$_SESSION['myname']]);

            $this->data = $result[0];

            $_SESSION['myid'] = $this->data['id'];

            return $this->display('backstage');

        }else{
            return $this->display('login');
        }

    }

    /**
     * 验证码
     */
    public function code($parms = null){

        echo new \MyWeb\common\Vcode(154,41,4);

    }

    /**
     * 判断用户是否登录成功
     */
    public function islogin($parms = null){

        if (!isset($_SESSION['myname'])){
            if (empty($parms['name'])){

                return $this->badJson('用户名为空');

            }

            if (!empty($parms['password'])){

                $parms['password'] = str_replace(' ', '',$parms['password']);
                if($parms['password'] == '')
                    return $this->badJson('密码为空');

            }else
                return $this->badJson('密码为空');

            if (empty($parms['code'])){

                return $this->badJson('验证码为空');

            }


            $code     = strtoupper($parms['code']);
            if ($code  != $_SESSION['code']){

                return $this->badJson('验证码错误');

            }

            $name     = $parms['name'];
            $password = md5($parms['password']);


            $rlt = $this->usermodel->find([$name,$password]);
            if ($rlt){

                $_SESSION['myname'] = $name;

                return $this->goodJson('','登录成功');

            }else{

                return $this->badJson('用户名或密码错误');

            }

        }else{

            return $this->goodJson('','登录成功');

        }

    }

    /**
     * 用户没有退出，依旧在线
     */
    static  public function isOnLine(){

        if (isset($_SESSION['myname'])){
            return true;
        }

        return false;

    }

    /**
     * 退出
     */
    public function loginOut(){

        unset($_SESSION['myid']);
        unset($_SESSION['myname']);
        unset($_SESSION['essayid']);
        return $this->display('login');

    }

}