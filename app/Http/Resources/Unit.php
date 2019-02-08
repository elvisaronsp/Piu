<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Unit extends JsonResource
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
            'id' => $this->id,
            'título' => $this->title
        ];
    }
}
