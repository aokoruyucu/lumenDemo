<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'isActive','created_at','updated_at'
    ];

    public function speaker(){
        return $this->belongsToMany("App\Speaker")->where("program.isActive","=","1");
    }
    public function program(){
        return $this->belongsToMany("App\Program")->where("program.isActive","=","1");
    }









}
