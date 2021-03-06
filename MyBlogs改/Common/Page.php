<?php

namespace MyBlogs\Controller;

class Page{
    private $total;
    private $listRows;
    private $limit;
    private $uri;
    private $pageNum;
    private $page;
    private $config=array(
        'head' =>"条记录",
        'prev' =>"<",
        'next' =>">",
        'first'=>"<<",
        'last' =>">>"
    );
    private $listNum=10;

    public function __construct($total,$listRows=10,$query="",$ord=true){

        $this->total=$total;
        $this->listRows=$listRows;

        $this->uri=$this->getUri($query);

        $this->pageNum=ceil($this->total/$this->listRows);


        if(!empty($_GET["page"])){

            $page=$_GET["page"];
        }else{
            if($ord){
                $page=1;
            }
            else{
                $page=$this->pageNum;
            }
        }


        if($total>0){
            if(preg_match('/\D/',$page)){
                $this->page= 1;
            }else{
                $this->page=$page;

            }
        }else{
            $this->page=0;
        }


        $this->limit="LIMIT ".$this->setlimit();

    }

    function __get($args){
        if($args=="limit"||$args=="page"){
            return $this->$args;
        }else{
            return null;
        }
    }

    function fpage(){
        $fpage='';
        $arr=func_get_args();

        $html[0]="<span>&nbsp;共<b>{$this->total}</b>{$this->config["head"]}&nbsp;</span>";
        $html[1]="<span>&nbsp;本页<b>".$this->disnum()."</b>条&nbsp;</span>";
        $html[2]="<span>&nbsp;本页从<b>{$this->start()}-{$this->end()}</b>条&nbsp;</span>";
        $html[3]="<span>&nbsp;<b>{$this->page}/{$this->pageNum}</b>页&nbsp;</span>";
        $html[4]=$this->firstprev();
        $html[5]=$this->pageList();
        $html[6]=$this->nextlast();
        $html[7]=$this->goPage();


        if(count($arr)<1){
            $arr=array(0,1,2,3,4,5,6,7);
        }

        for($i=0;$i<count($arr);$i++){
            $fpage.=$html[$arr[$i]];
        }

        return $fpage;

    }

    private function setLimit(){
        if($this->page>0){
            return ($this->page-1)*$this->listRows.",{$this->listRows}";
        }else{
            return 0;
        }
    }



    private function getUri($query){
        $request_uri=$_SERVER["REQUEST_URI"];

        $url=strstr($request_uri,'?') ? $request_uri:$request_uri .'?';

        if(is_array($query)){
            $url.=http_build_query($query);
        }else if($query!=""){
            $url.="&".trim($query,"?&");
        }

        $arr=parse_url($url);

        if(isset($arr["query"])){

            parse_str($arr["query"],$arrs);
            unset($arrs["page"]);
            $url=$arr["path"].'?'.http_build_query($arrs);
        }

        if(strstr($url,'?')){
            if(substr($url,-1)!='?'){
                $url=url.'?';
            }
        }
        return $url;
    }

    private function firstprev(){

        $str='<ul class="pagination">';

        if($this->page>1){
            $str.="<li><a href='{$this->uri}page=1'>{$this->config["first"]}</a></li>";
            $str.="<li><a href='{$this->uri}page=".($this->page-1)."'>{$this->config["prev"]}</a></li>";
        }
        return $str;
    }

    private function pageList(){
        $linkpage="";
        $inum=floor($this->listNum/2);

        for($i=$inum;$i>=1;$i--){
            $page=$this->page-$i;

            if($page>=1){
                $linkpage.="<li><a href='{$this->uri}page={$page}'>{$page}</a></li>";
            }
        }

        if($this->pageNum>1){
            $linkpage.="<li class='active'><a href='javascript:;'>{$this->page}</a></li>";
        }

        for($i=1;$i<$inum;$i++){
            $page=$this->page+$i;
            if($page<=$this->pageNum){
                $linkpage.="<li><a href='{$this->uri}page={$page}'>{$page}</a></li>";
            }else{
                break;
            }
        }

        return $linkpage;
    }

    private function nextlast(){
        if($this->page!=$this->pageNum){
            $str="<li><a href='{$this->uri}page=".($this->page+1)."'>{$this->config["next"]}</a></li>";
            $str.="<li><a href='{$this->uri}page=".($this->pageNum)."'>{$this->config["last"]}</a></li>";
            return $str;
        }
    }

    private function goPage(){
        if($this->pageNum>1){

            return '<input type="text" style="width:30px;" onkeydown="javascript:if(event.keyCode==13)
                    {var page=(this.value>'.$this->pageNum.')?'.$this->pageNum.':this.value; 
                    location=\''.$this->uri.'page=\'+page+\'\'}"
                    value="'.$this->page.'">
                    <input type="button" value="GO" onclick="javascript:var page
                    =(this.previousSibling.value>'.$this->pageNum.')
                    ?'.$this->pageNum.':this.previousSibling.value;
                    location=\''.$this->uri.'page=\'+page+\'\'"></ul>';
        }
    }

    private function start(){

        if($this->total==0){
            return 0;
        }else{
            return ($this->page-1)*$this->listRows+1;
        }
    }

    private function end(){
        return min($this->page * $this->listRows,$this->total);
    }

    private function disnum(){
        if($this->total>0){
            return $this->end()-$this->start()+1;
        }else{
            return 0;
        }
    }




}