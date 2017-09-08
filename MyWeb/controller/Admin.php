<?php

namespace MyWeb\controller;


class Admin extends Controller {

    private $usermodel = null;

    public function __construct() {

        $this->usermodel = new \MyWeb\model\UserModel();

    }

    /**
     * 判断是否在线并显示页面
     */
    public function index()
    {

        if (Login::isOnLine()){

            $result =  $this->usermodel->searchUserDataByName([$_SESSION['myname']]);

            $this->data = $result[0];

            $_SESSION['myid'] = $this->data['id'];

            return $this->display('backstage');

        }else{

            return $this->display('login');

        }

    }


    /**
     *首页
     * @return mixed|string
     */
    public function home(){

        $result = $this->usermodel->searchUserDataByName(['魏亚林']);

        if(count($result) !== 0){

            $this->data = $result[0];

            return $this->display('home');

        }else{

            return '站主名错误';

        }

    }

}
