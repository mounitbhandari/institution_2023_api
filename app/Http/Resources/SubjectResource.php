<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed subject_code
 * @property mixed subject_short_name
 * @property mixed subject_full_name
 * @property mixed subject_duration
 * @property mixed subjectDescription
 * @property mixed subject_description
 */
class SubjectResource extends JsonResource
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
            'subjectCode'=>$this->subject_code,
            'subjectShortName'=>$this->subject_short_name,
            'subjectFullName'=>$this->subject_full_name,
            'subjectDuration'=>$this->subject_duration,
            'subjectDescription'=>$this->subject_description,
        ];
    }
}
