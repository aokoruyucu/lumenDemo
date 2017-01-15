<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Tag;

class TagTransformer extends TransformerAbstract
{





    public function transform(Tag $tag)
    {
        return [
            'name' => $tag->name,
            'id' =>$tag->id

        ];
    }




}