<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourseRegistration extends Model
{
    use HasFactory;

    /**
     * @var int|mixed
     */
    private $reference_number;
    /**
     * @var mixed|string
     */
    private $ledger_id;
    /**
     * @var mixed
     */
    private $course_id;
    /**
     * @var mixed
     */
    private $base_fee;
    /**
     * @var mixed
     */
    private $discount_allowed;
    /**
     * @var mixed
     */
    private $joining_date;
    /**
     * @var mixed
     */
    private $effective_date;
    /**
     * @var mixed
     */
    private $completion_date;
    /**
     * @var mixed
     */
    private $is_started;

    public function student()
    {
        return $this->belongsTo(Ledger::class,'ledger_id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
