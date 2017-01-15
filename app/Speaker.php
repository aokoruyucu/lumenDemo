<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname','title','url','description'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'isActive','created_at','updated_at'
    ];


    public function program(){
        return $this->belongsToMany("App\Program");
    }









}
