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
            'id' => $this->id,
            'Lançado por' => $this->reliasedBy(),
            'Nota' => $this->value,
            'Matéria' => $this->stuff->title,
            'Turma' => $this->student_group->group->title,
            'Período' => $this->unit->title,
            'Data de lançamento' => $this->created_at->format('d/m/Y H:i')
        ];
    }

    private function reliasedBy(){
      if($this->employeer_id == 0){
        return 'Lançado pela instituição';
      }
      return $this->employeer->name;
    }
}
