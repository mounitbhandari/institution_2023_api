<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed course_code
 * @property mixed short_name
 * @property mixed full_name
 * @property mixed course_duration
 * @property mixed description
 * @property mixed id
 * @property mixed fees_mode_type
 * @property mixed duration_type_id
 */
class CourseResource extends JsonResource
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
            "courseId"=>$this->id,
            "courseCode"=>$this->course_code,
            "shortName"=>$this->short_name,
            "fullName"=>$this->full_name,
            "durationTypeId"=>$this->duration_type_id,
            "courseDuration"=>$this->course_duration,
            "description"=>$this->description,
            "feesModeType"=>new FeesModeTypeResource($this->fees_mode_type)
        ];
    }
}
