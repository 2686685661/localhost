<?php

namespace MyWeb\controller;


class ForgetPassword extends Controller
{

    private $forgetModel = null;

    public function __construct(){

        $this->forgetModel = new \MyWeb\model\ForgetModel();

    }
    /**
     * 显示忘记密码页面
     */
    public function showForgetPassword(){

        return $this->display('forgetPassword');

    }

    /**
     * 根据姓名查询密保问题
     * @param $parms
     * @return string
     */
    public function selectQuestionByname($parms){

        $result = $this->forgetModel->selectQuestionByname($parms);

        if($result){

            $this->data = $result[0];

            $this->setData('name',$parms['name']);

            $content = $this->display('selectQuestionByname');

            return $this->goodJson($content);

        }else{

            return $this->badJson('用户不存在');

        }
    }


    /**
     * 重置密码
     * @param $parms
     * @return string
     */
    public function resetPassword($parms){

        if (empty($parms['name'])){

            return $this->badJson('用户名错误');

        }

        if (empty($parms['answer'])){

            return $this->badJson('密保答案为空');

        }

        if (!empty($parms['newPassword'])){

            $parms['newPassword'] = str_replace(' ', '',$parms['newPassword']);
            if($parms['newPassword'] == '')
                return $this->badJson('新密码为空');

        }else
            return $this->badJson('新密码为空');

        if (!empty($parms['confirmPassword'])){

            $parms['confirmPassword'] = str_replace(' ', '',$parms['confirmPassword']);
            if($parms['confirmPassword'] == '')
                return $this->badJson('确认密码为空');

        }else
            return $this->badJson('确认密码为空');

        if($parms['newPassword'] !== $parms['confirmPassword']){

            return $this->badJson('两次密码不一致');

        }

        $result = $this->forgetModel->find([$parms['name'],$parms['answer']]);

        if($result){

            $result2 = $this->forgetModel->resetPassword([md5($parms['newPassword']),$parms['name']]);

            if($result2){

                return $this->goodJson('','修改成功');

            }else{

                return $this->badJson('修改失败');

            }

        }else{

            return $this->badJson('答案错误'.$parms['answer'].",".$parms['name']);

        }

    }

}