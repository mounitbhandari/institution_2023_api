<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed description
 * @property mixed course_duration
 * @property mixed full_name
 * @property mixed short_name
 */
class Course extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */
    private $course_code;


    protected $hidden = [
        "inforce","created_at","updated_at"
    ];
    protected $guarded = ['id'];
    /**
     * @var mixed
     */
    private $duration_type_id;
    /**
     * @var mixed
     */
    private $fees_mode_type_id;

    /**
     * @var mixed
     */


    public function fees_mode_type()
    {
        return $this->belongsTo(FeesModeType::class,'fees_mode_type_id');
    }
    public function duration_type()
    {
        return $this->belongsTo(DurationType::class,'duration_type_id');
    }
}
