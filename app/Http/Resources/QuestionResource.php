<?php

namespace App\Http\Resources;

use App\Models\Option;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed id
 * @property mixed question_level_id
 * @property mixed chapter_id
 * @property mixed question_type_id
 * @property mixed question
 * @property mixed options
 */
class QuestionResource extends JsonResource
{
    /**
     * @var mixed
     */

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'questionId' => $this->id,
            'questionLevelId' => $this->question_level_id,
            'chapterId' => $this->chapter_id,
            'questionTypeId' => $this->question_type_id,
            'question' => $this->question,
            'options' => OptionResource::collection($this->options)->shuffle()
        ];
    }
}
