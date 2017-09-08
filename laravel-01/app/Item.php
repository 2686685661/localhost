<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Item extends Model
{

    use Searchable;

    public $fillable = ['title','created_at','updated_at'];

    /**
     * 获取模型的索引名称
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'items_index';
    }

    public $timestamps = true;

    protected function getDateFormat() {
        return time();
    }

    protected function asDateTime($val) {
        return $val;
    }
}