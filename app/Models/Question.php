<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed question_level_id
 * @property mixed chapter_id
 * @property mixed question_type_id
 * @property mixed question
 * @property mixed questionTypeId
 */
class Question extends Model
{
    use HasFactory;
    public function options()
    {
        return $this->hasMany(Option::class,'question_id');
    }
}
