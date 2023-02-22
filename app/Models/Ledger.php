<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    use HasFactory;

    /**
     * @var mixed|string
     */
    private $episode_id;
    /**
     * @var mixed
     */
    private $student_name;
    /**
     * @var mixed
     */
    private $father_name;
    /**
     * @var mixed
     */
    private $mother_name;
    /**
     * @var mixed
     */
    private $guardian_name;
    /**
     * @var mixed
     */
    private $relation_to_guardian;
    /**
     * @var mixed
     */
    private $dob;
    /**
     * @var mixed
     */
    private $sex;
    /**
     * @var mixed
     */
    private $address;
    /**
     * @var mixed
     */
    private $city;
    /**
     * @var mixed
     */
    private $ledger_name;
    /**
     * @var mixed
     */
    private $billing_name;
    /**
     * @var int|mixed
     */
    private $ledger_group_id;
    /**
     * @var mixed
     */
    private $entry_date;
    /**
     * @var mixed
     */
    private $district;
    /**
     * @var mixed
     */
    private $state_id;
    /**
     * @var mixed
     */
    private $pin;
    /**
     * @var mixed
     */
    private $guardian_contact_number;
    /**
     * @var mixed
     */
    private $whatsapp_number;
    /**
     * @var mixed
     */
    private $email_id;
    /**
     * @var mixed
     */
    private $qualification;
    /**
     * @var int|mixed
     */
    private $is_student;

    protected $hidden = [
        "inforce","created_at","updated_at"
    ];
    protected $guarded = ['id'];

    public function ledger_group()
    {
        return $this->belongsTo('App\Models\LedgerGroup','ledger_group_id');
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State','state_id');
    }
    public function registeredCourses()
    {
        return $this->hasMany(StudentCourseRegistration::class,'ledger_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class,StudentCourseRegistration::class,'ledger_id','course_id');;
    }
    public function complete_courses()
    {
        return $this->belongsToMany(Course::class,StudentCourseRegistration::class,'ledger_id','course_id')->wherePivot('is_completed', '=', 1);;
    }
    public function incomplete_courses()
    {
        return $this->belongsToMany(Course::class,StudentCourseRegistration::class,'ledger_id','course_id')->wherePivot('is_completed', '=', 0);;
    }
    public function course_registered() {
        return $this->hasMany(StudentCourseRegistration::class, 'ledger_id');
    }
}


/*
    Sample Student Data
    "studentId": 35,
    "episodeId": "CODER-00215-2122",
    "studentName": "9098 23",
    "billingName": "Mr. dBimale Paul",
    "fatherName": "Atanu Paul",
    "motherName": "Aroti Paul",
    "guardianName": null,
    "relationToGuardian": null,
    "dob": "1977-08-14",
    "sex": "M",
    "address": "56\/7,Rabindrapally",
    "city": "Barrackpore",
    "district": "North 24 Parganas",
    "stateId": 22,
    "pin": 700122,
    "stateId": 22,
    "guardianContactNumber": 9832700122,
    "whatsappNumber": 7985241065,
    "email": "bimalpaul@gmail.com",
    "qualification": "HS"
 *
 * */
