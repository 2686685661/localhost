<?php

class ones {



//    public function a() {
//         $cs =['a','b','c'];
//        $b = count($cs);
//
//        $this->one($cs,0,$b);
//    }
//
//
//    public  function one($cs,$start,$length) {
//
//        if($start >= $length-1) {
//            $this->prints($cs);
//            return;
//        }
//
//
//        for($i = $start;$i<$length;$i++) {
//            $this->swap($cs,$start,$i);
//
//            $this->one($cs,$start+1,$length);
//
//            $this->swap($cs,$start,$i);
//        }
//
//    }
//
//    public  function swap($cs,$one,$two) {
//
//        $sat = $cs[$one];
//        $cs[$one] = $cs[$two];
//        $cs[$two] = $sat;
//    }
//
//    public static function prints($cs) {
//        for ($i=0;$i<count($cs);$i++) {
//            echo $cs[$i];
//
//        }
//
////        exit;
//    }



    public function a() {
        $arr = [];
        $cs =['a','b','c'];
        $b = count($cs);

        $this->b($cs,0,$arr);
    }

    public function b($cs,$i,$arr) {
        if($cs == null) {
            return;
        }

        if($i == count($cs) - 1) {
            echo 'fuck';
        }else {
             $num=true;

            for($j=$i;$j<count($cs);$j++) {
                $temp = $cs[$j];
                $cs[$j] = $cs[$i];
                $cs[$i] = $temp;


                $this->b($cs,$i+1,$arr);

                $temp = $cs[$j];
                $cs[$j] = $cs[$i];
                $str[$i] = $temp;
            }
        }
    }



}

$ceshi = new ones();

//$ceshi->a();