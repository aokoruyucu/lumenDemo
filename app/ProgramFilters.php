<?php

/**
 * Created by PhpStorm.
 * User: ahmetoguz
 * Date: 11/01/2017
 * Time: 15:21
 */
namespace  App;
class ProgramFilters extends QueryFilter
{
    public function sort($order = 'asc'){
        $this->builder->orderBy('date',$order);
    }

    public function title($title){
        $this->builder->where('title','LIKE','%'.$title.'%');
    }

    public function date($date){
        $this->builder->where('date',$date);
    }
     public function tag($tag){
         $this->builder->where('name','=',$tag);
     }
}