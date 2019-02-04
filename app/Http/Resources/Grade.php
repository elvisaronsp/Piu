<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Grade extends JsonResource
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
            'Lançado por' => $this->employeer->name,
            'Nota' => $this->value,
            'Turma' => $this->student_group->group->title,
            'Data de lançamento' => $this->created->format('d/m/Y H:i')
        ];
    }
}
