<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Portfolio extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'text'  => $this->title,
            'img'   => $this->img->mini,
        ];
    }
}
