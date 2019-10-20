<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{

//$urlfront="http://localhos?t:8000/storage/photos/";

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);




//        return [
//          'q_id'=> $this->q_id,
//            'q_no'=>$this->q_no,
//            'main_heading'=>$this->main_heading,
//            'q_heading'=> $this->q_heading,
//            'description'=>$this->description,
//            'description_url'=>$this->description_url,
//            'option1'=>$this->option1,
//            'option1_url'=>$this->option1_url,
//            'option2'=>$this->option2,
//            'option2_url'=>$this->option2_url,
//            'option3'=>$this->option3,
//            'option3_url'=>$this->option3_url,
//            'option4'=>$this->option4,
//            'option4_url'=>$this->option4_url,
//            'answer'=>$this->answer,
//
//        ];
    }

}
