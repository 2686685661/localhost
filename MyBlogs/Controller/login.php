<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-10
 * Time: 上午10:52
 */

namespace MyBlogs\Controller;


class login extends Controller
{
    private $model = null;
    private $user_id = null;
    private $user_account = null;
    private $user_password = null;
    public function __construct() {

        $this->model = new \MyBlogs\Model\conModel;
        $my = $this->model->querymy("user");
        foreach ($my as $row) {
            $this->user_id = $row['id'];
            $this->user_account = $row['account'];
            $this->user_password = $row['password'];
        }
    }

    public function islogin($parms = null) {
        if(!isset($_SESSION['myaccount'])) {

            if($parms['account'] == '') {
                echo json_encode(0);                //0账号为空
                return;
            }

            if($parms['password'] == '') {
                echo json_encode(1);             //1密码为空
                return;
            }

            if($parms['code'] =='') {
                echo json_encode(2);                //2验证码为空
                return;
            }


            if($parms['code'] != $_SESSION['code']) {
                echo json_encode(3);               //3验证码错误
                return;
            }

            if($parms['account'] != $this->user_account) {
                echo json_encode(4);                  //4账号错误
                return;
            }else{

                if($parms['password'] != $this->user_password) {
                    echo json_encode(5);              //5密码错误
                    return;
                }else{

                    $_SESSION['myaccount'] = $parms['account'];
//                    header("/MyBlogs/index.php/Admin/backManage");
                    echo json_encode(6);
                }


            }
        }else{
            echo json_encode(6);
        }
    }

    /**
     * 用户关闭页面没有退出依旧在线
     */
    public static function stillLine() {
        if(isset($_SESSION['myaccount'])) {
            return true;
        }
        return false;
    }

    /**
     * 退出
     */
    public function sugnOut() {
        unset($_SESSION['myid']);
        unset($_SESSION['myaccount']);

        $this->display("register");
    }





}