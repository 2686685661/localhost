<?php
/**
 * Created by PhpStorm.
 * User: weiyalin
 * Date: 17-5-7
 * Time: 下午4:22
 */

namespace MyWeb\controller;


class Enroll extends Controller
{
    private $enrollmodel = null;

    public function __construct() {

        $this->enrollmodel = new \MyWeb\model\EnrollModel();

        if(!isset($_SESSION['myid'])){
            return $this->display('login');
        }

    }

    /**
     * 游客注册页面
     * @return mixed|string
     */
    public function enroll(){

        return $this->display('enroll');

    }

    /**
     * 游客注册
     * @param $parms
     * @return string
     */
    public function subEnroll($parms){

        if(!isset($parms['name']))
            return $this->badJson('用户名为空');

        if(isset($parms['password'])){
            $parms['password'] = str_replace(' ', '',$parms['password']);
            if($parms['password'] == '')
                return $this->badJson('用户密码为空');
        }else
            return $this->badJson('用户密码为空');

        if(isset($parms['confirmpassword'])){
            $parms['confirmpassword'] = str_replace(' ', '',$parms['confirmpassword']);
            if($parms['confirmpassword'] == '')
                return $this->badJson('确认密码为空');
        }else
            return $this->badJson("确认密码为空");
        if(!isset($parms['code']))
            return $this->badJson("验证码为空");
        if(strtoupper($parms['code']) !== $_SESSION['code'])
            return $this->badJson('验证码错误');
        if($parms["password"] !== $parms["confirmpassword"])
            return $this->badJson('用户密码与确认密码不一致');

        $result = $this->enrollmodel->searchEnrollByName([$parms['name']]);

        if(count($result))
            return $this->badJson('用户名已存在');

        $time = date('Y-m-d H:i:s');
        $result2 = $this->enrollmodel->enroll([$parms['name'],md5($parms['password']),$time]);

        if ($result2)
            return $this->goodJson('','注册成功');
        else
            return $this->badJson('注册失败');

    }

    /**
     * 判断游客账号是否正确
     * @param $parms
     * @return string
     */
    public function find($parms){

        if(!isset($parms['name']) || !isset($parms['password']))
            return $this->badJson('请填写完整信息');

        $parms['name'] = str_replace(' ', '',$parms['name']);
        $parms['password'] = str_replace(' ', '',$parms['password']);

        $result = $this->enrollmodel->find([$parms['name'],md5($parms['password'])]);

        if($result)
            return $this->goodJson('','信息正确');
        else
            return $this->badJson('信息错误');

    }

    /**
     *分页查询
     * @return string
     */
    public function searchEnroll($parms){

        $total =  count($this->enrollmodel->searchEnroll());

        $page = new \MyWeb\common\Page($parms['methodName'],$total,$parms['page'],20);

        $pageData = $this->enrollmodel->searchEnroll($page->limit);

        if(count($pageData) !== 0){

            $this->data = $pageData;

            $pageContent = $page->fpage();

            $content = $this->display('searchEnroll');

            return $this->goodJson([$content,$pageContent]);

        }else{

            return $this->badJson('查询失败'.$page->limit);

        }

    }

    /**
     * 删除注册用户
     * @param $parms
     * @return string
     */
    public function delEnroll($parms){

        $result = $this->enrollmodel->delEnroll($parms);

        if ($result)
            return $this->goodJson('','删除成功');
        else
            return $this->badJson('删除失败');

    }

}