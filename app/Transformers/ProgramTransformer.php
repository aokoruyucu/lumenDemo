<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Program;

class ProgramTransformer extends TransformerAbstract
{



    protected  $defaultIncludes = [];
    protected $basicResponseFlag = false;

    public function __construct($flag="")
    {
        if($flag == "both"){
            $this->defaultIncludes=["speaker","tag"];
        }else if($flag == "speaker"){
            $this->defaultIncludes=["speaker"];
        }else if($flag == "tag"){
            $this->defaultIncludes=["tag"];
        }
    }

    public function setFlag($flag)
    {


        $this->basicResponseFlag = $flag;
        if($this->basicResponseFlag == "both"){
            $this->defaultIncludes=["speaker","tag"];
        }else if($this->basicResponseFlag == "speaker"){
            $this->defaultIncludes=["speaker"];
        }else if($this->basicResponseFlag == "tag"){
            $this->defaultIncludes=["tag"];
        }
    }



    public function transform(Program $program)
    {


            $size= count(Program::all());
            return [
                'id' => $program->id,
                'name' => $program->title,
                'subtitle' =>$program->subtitle,
                'start_hour' =>$program->start,
                'end_hour' => $program -> end,
                'date' => date('d.m.Y', strtotime($program->date)),
                //'speakers'=>$program->speaker,
                'size' => $size,

            ];



    }

    public function includeSpeaker(Program $program){
        $speaker=$program->speaker;
        return $this->collection($speaker,new SpeakerTransformer);

    }
    public function includeTag(Program $program){
        $tag=$program->tag;
        return $this->collection($tag,new TagTransformer);

    }




}