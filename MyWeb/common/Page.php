<?php

namespace MyWeb\common;

class Page
{
    private $total;                         //数据表中总记录数
    private $listRows;                      //每页显示行数
    private $pageNum;                       //总页数
    private $page;                          //当前页
    private $limit;                         //SQL语句使用limit从句，限制获取记录个数
    private $methodName;                    //方法名
    private $config = array(
        'head'=>'条记录',
        'prev'=>'上一页',
        'next'=>'下一页',
        'first'=>'首页',
        'last'=>'尾页'
    );                                      //在分页信息中显示内容，可以通过set()设置

    private $listNum = 4;                   //默认分页列表显示的个数

    public function __construct($methodName, $total, $page = 1,  $listRows = 10, $ord = true){

        $this->methodName = $methodName;
        $this->total = $total;
        $this->listRows = $listRows;
        $this->pageNum = ceil($this->total/$this->listRows);

        if($page < 1)
            $this->page = 1;
        elseif ($page > $this->pageNum)
            $this->page = $this->pageNum;
        else
            $this->page = $page;

        $this->limit = "LIMIT ".$this->setlimit();

    }
    //设置显示文件的信息
    function set($param,$value){

        if(array_key_exists($param, $this->config))
            $this->config[$param] = $value;

        return $this;

    }
    //通过该方法在外部获取私有成员属性limit和page的值
    function __get($args){

        if($args == 'limit' || $args == 'page'){

            return $this->$args;

        }else{

            return null;

        }

    }
    //按指定的格式输出分页
    function fpage(){

        $arr = func_get_args();

        $html[0] = "&nbsp;共<b>{$this->total} </b>{$this->config['head']}&nbsp;>";
        $html[1] = "&nbsp;本页<b>".$this->disnum()." </b>条&nbsp;>";
        $html[2] = "&nbsp;本页从<b>{$this->start()}-{$this->end()} </b>条&nbsp;>";
        $html[3] = "&nbsp;<b>{$this->page}/{$this->pageNum} </b>页&nbsp;>";

        $html[4] = $this->firstprev();
        $html[5] = $this->pageList();
        $html[6] = $this->nextlast();
        $html[7] = $this->goPage();

        $fpage = '<div class="fpage" style="font-size: 16px;">';

        if(count($arr) < 1){
            $arr = array(0, 1, 2, 3, 4, 5, 6, 7);
        }

        for ($i = 0; $i < count($arr); $i++){

            $fpage .= $html[$arr[$i]];

        }

        $fpage .= '</div>';

        return $fpage;

    }

    private function setLimit(){

        if($this->page > 0){
            return ($this->page - 1)*$this->listRows.",".$this->listRows;
        }else{
            return 0;
        }
    }
    //获取当前页开始的记录数
    private function start(){

        if($this->total == 0)
            return 0;
        else
            return ($this->page-1)*$this->listRows+1;

    }
    //获取当前页结束的记录数
    private function end(){

        return min($this->page*$this->listRows,$this->total);

    }
    //获取上一页和首页的操作信息
    private function firstprev(){

        if($this->page > 1){

            $topage = $this->page-1;
            $str = "&nbsp; <a href='javascript:{$this->methodName}(1);'>{$this->config['first']}</a>&nbsp;";
            $str .= "<a href='javascript:{$this->methodName}($topage)'>{$this->config['prev']}</a>&nbsp;";

            return $str;
        }

    }
    //获取页数列表信息
    private function pageList(){

        $linkPage = "&nbsp;<b>";

        $inum = floor($this->listNum/2);
        //当前页前面的列表
        for ($i = $inum; $i >= 1; $i--){

            $page = $this->page-$i;

            if($page >=1)
                $linkPage .= "<a href='javascript:{$this->methodName}({$page});'>{$page}</a>&nbsp;";

        }
        //当前页信息
        if($this->pageNum > 1)
            $linkPage .= "<span id='mypage' style='padding: 1px 2px; background: #bbb;color: white;
                         display: inline-block'>{$this->page}</span>&nbsp;";
        //当前页后面的列表
        for ($i = 1; $i <= $inum; $i++){

            $page = $this->page+$i;

            if($page <= $this->pageNum)
                $linkPage .= "<a href='javascript:{$this->methodName}({$page});'>{$page}</a>&nbsp;";
            else
                break;

        }

        $linkPage .= '</b>';
        return $linkPage;

    }
    //获取下一页和尾页的操作信息
    private function nextlast(){

        if($this->page != $this->pageNum){

            $topage = $this->page+1;
            $str = "&nbsp;<a href='javascript:{$this->methodName}($topage);'>{$this->config['next']}</a>&nbsp;";
            $str .= "&nbsp;<a href='javascript:{$this->methodName}({$this->pageNum});'>{$this->config['last']}</a>&nbsp;";

            return $str;
        }

    }
    //用于显示和处理跳转页面
    private function goPage(){

        if($this->pageNum > 1){

            return "&nbsp;<input id='{$this->methodName}GO' style='width: 30px;!important;height: 18px;'
                     type='text' value='{$this->page}'>
                     <input style='cursor:pointer; width:35px; ' type='button'
                      value='GO' onclick='{$this->methodName}(\"go\");'>&nbsp;";

        }

    }
    //获取本页的记录条数
    private function disnum(){

        if($this->total > 0)
            return $this->end()-$this->start()+1;
        else
            return 0;

    }

}