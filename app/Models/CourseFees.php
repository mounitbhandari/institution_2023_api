<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CourseFees extends Model
{
    use HasFactory;

    /**
     * @var mixed
     */


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

   
}
