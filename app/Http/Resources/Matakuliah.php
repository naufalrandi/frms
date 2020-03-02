<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Matakuliah extends JsonResource
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
            'kode' => $this->kode,
            'matkulwajib' => $this->matkulwajib,
            'sks' => $this->sks,
            'prasyarat' => $this->prasyarat,
            'cosyarat' => $this->cosyarat,
            'semester_id' => $this->semester_id,
            'created_at' => $this->created_at->format('d/m/Y'),
            'updated_at' => $this->updated_at->format('d/m/Y'),
        ];
    }
}
