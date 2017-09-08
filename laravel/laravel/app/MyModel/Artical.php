<?php

namespace App\MyModel;


use Illuminate\Database\Eloquent\Model;

class Artical extends Model

{

    protected $table = 'artical';

    public $timestamps = true;

    protected $fillable = ['headline','publishperson','articalcontent','picture'];


    protected function getDateFormat() {

        return time();

    }


    protected function asDateTime($val) {

        return $val;

    }


    public function comments() {

        return $this->hasMany('App\MyModel\Artiment','articalid');

    }


//    public function select_array() {
//
//        $select = null;
//        if(func_num_args() == 0) {
//            return false;
//        }
//
//        $args = func_get_args();
//        $instance = new static;
//
//        for ($i = 0;$i<count($args[0]);$i++) {
//            $select = $instance->$args[0][$i]($args[1][$i]);
//        }
//        return $select;
//
//    }

}