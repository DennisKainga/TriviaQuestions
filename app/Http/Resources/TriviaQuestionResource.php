<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TriviaQuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    // public static $wrap = 'triviaquestions';
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            "id"=>$this->id,
            "category"=>$this->category,
            "difficulty"=>$this->difficulty,
            "question"=>$this->question,
            "correct_answer"=>$this->correct_answer,
            "incorrect_answers"=>$this->incorrect_answers
        ];
    }
}
