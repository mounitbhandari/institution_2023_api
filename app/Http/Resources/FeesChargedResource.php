<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\StudentCourseRegistration;

/**
 * @property mixed fees_details
 * @property mixed fees_total
 * @property mixed student_course_registration_id
 */
class FeesChargedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $student=StudentCourseRegistration::findOrFail($this->student_course_registration_id)->student;
        $course=StudentCourseRegistration::findOrFail($this->student_course_registration_id)->course;

        return [
            'studentCourseRegistrationId'=>$this->student_course_registration_id,
            'feesTotal'=>$this->fees_total,
            'studentName'=>$student->ledger_name,
            'courseName'=>$course->full_name,
            'feesDetails'=> $this->fees_details
        ];
    }
}
