<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/21
 * Time: 下午7:40
 */

namespace controller;


class Admin extends Controller
{
    public function my($pram = null)
    {
        $this->display('my');
    }

    public function register($pram = null)
    {
        $this->display('register');
    }

    public function management($pram = null){
         $this->display('management');
    }



    public function login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $User = new \model\UserModel();
        $datapass = $User->select($username);
        if(md5($password)==$datapass){
            echo 1;
        }else{
           echo false; 
        }
    }

    // public function add(){

    // }



    public function delete($p = null){
        $id = $p['id'];
        $adminModel = new  \model\AdminModel();
        $adminModel->delete($id);

        echo __FUNCTION__;
        
    }
}