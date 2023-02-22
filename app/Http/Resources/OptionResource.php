<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed question_id
 * @property mixed option
 * @property mixed is_answer
 */
class OptionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'optionId' => $this->id,
            'questionId' => $this->question_id,
            'option' => $this->option,
            'isAnswer' => $this->is_answer
        ];
    }
}
