<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    public $program;
    public function __construct($program = [])
    {
        if($program){
            $this->program=$program;
            return $this->program;
        }
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'title','subtitle', 'start','end','date','description'
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
        return $this->belongsToMany("App\Speaker");
    }

    public function tag(){
        return $this->belongsToMany("App\Tag");
    }

    public function scopeFilter($query,QueryFilter $filters){
        return $filters->apply($query);
    }

    public function withPivot(){
        return $this->belongsToMany("App\Tag")->withPivot('isActive')  ;
    }













}
