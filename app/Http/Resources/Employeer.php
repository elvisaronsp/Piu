<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employeer extends JsonResource
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
        'nome' => $this->employeer_data->name,
        'cargo' => $this->responsability->title,
        'carga horária' => $this->employeer_data->workload
      ];
    }
}
