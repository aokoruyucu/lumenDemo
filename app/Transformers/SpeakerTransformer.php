<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Speaker;

class SpeakerTransformer extends TransformerAbstract
{





    public function transform(Speaker $speaker)
    {
        return [
            'name' => $speaker->firstname.' '.$speaker->lastname,
            'title' =>$speaker->title

        ];
    }




}