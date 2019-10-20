<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Questions;
use App\Listenings;
use Illuminate\Http\Resources\Json\Resource;

class ApiResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
          'exam_id'=> $this->e_id,
            'exam_title'=>$this->e_title,
            'questions' => QuestionResource::collection(Questions::where('e_id',$this->e_id)->get()),
            'listening' => QuestionResource::collection(Listenings::where('e_id',$this->e_id)->get()),
        ];
    }
}
