<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    //指定表名
    protected $table = 'student';


    //指定id
    protected $primaryKey = 'id';


    //自动维护时间戳
    public $timestamps = true;



    //指定允许批量赋值的字段
    protected $fillable = ['name','age'];



    //指定不允许批量赋值的字段
    protected $guarded = [];


    /**
     * 指定存储的时间为Unix时间戳
     * @return int
     */
    protected function getDateFormat()
    {

        return time();
    }


    /**
     * 使从表中查询的时间戳不自动转化为时间
     * @param mixed $value
     * @return mixed
     */
    protected function asDateTime($value)
    {
        return $value;
    }

}