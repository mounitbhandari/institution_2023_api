<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed episode_id
 * @property mixed relation_to_guardian
 * @property mixed ledger_name
 * @property mixed billing_name
 * @property mixed father_name
 * @property mixed mother_name
 * @property mixed id
 * @property mixed guardian_name
 * @property mixed dob
 * @property mixed sex
 * @property mixed address
 * @property mixed city
 * @property mixed district
 * @property mixed state_id
 * @property mixed pin
 * @property mixed guardian_contact_number
 * @property mixed whatsapp_number
 * @property mixed email_id
 * @property mixed qualification
 * @property mixed state
 */
class StudentResource extends JsonResource
{
    /**
     * @var mixed
     */


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'studentId'=>$this->id,
            'episodeId'=>$this->episode_id,
            'studentName'=>$this->ledger_name,
            'billingName'=>$this->billing_name,
            'fatherName' => $this->father_name,
            'motherName' => $this->mother_name,
            'guardianName' => $this->guardian_name,
            'relationToGuardian' => $this->relation_to_guardian,
            'dob' => $this->dob,
            'sex' => $this->sex,
            'address' => $this->address,
            'city' => $this->city,
            'district' => $this->district,
            'stateId' => $this->state_id,
            'pin' => $this->pin,
            'state'=>new StateResource($this->state ),
            'guardianContactNumber' => $this->guardian_contact_number,
            'whatsappNumber' => $this->whatsapp_number,
            'email' => $this->email_id,
            'qualification' => $this->qualification
        ];
    }
    /*
        "studentName": "yiyiyig",
        "billingName": "fgh Das",
        "fatherName": "Abinash Kundu",
        "motherName": "Sulekha Kundu",
        "guardianName": "Abinash Kundu",
        "relationTogGurdian" : "father",
        "dob" : "2000-03-25",
        "sex" : "M",
        "address": "15/b M.G Road",
        "city": "kolkata",
        "ditrict":"kolkata",
        "stateId":1,
        "pin": "70014",
        "gurdianContactNumber":"798524103",
        "whatsappNumber" : "70033105284",
        "email": "saikata234@gmail.com",
        "qualification" : "HS",

        "sex": "F",
        "stateId": 28
    */
}
