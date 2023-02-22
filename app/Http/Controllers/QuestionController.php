<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Models\Option;
use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class QuestionController extends ApiController
{
    public function index()
    {
        $question= Question::get();
        return $this->successResponse(QuestionResource::collection($question));
    }
    public function questionsByTypeId($questionTypeId)
    {
        $question= Question::whereQuestionTypeId($questionTypeId)->get();
        return $this->successResponse(QuestionResource::collection($question));
    }
    public function questionsByLevelId($questionLevelId)
    {
        $question= Question::whereQuestionTypeId($questionLevelId)->get();
        return $this->successResponse(QuestionResource::collection($question));
    }
    public function questionsByOptionAndLevelId($questionTypeId,$questionLevelId)
    {
        $question= Question::whereQuestionTypeIdAndQuestionLevelId($questionTypeId,$questionLevelId)->get();
        return $this->successResponse(QuestionResource::collection($question));
    }
    public function updateQuestionLevel($id,$questionLevelId)
    {
        $question= Question::findOrFail($id);
        $question->question_level_id = $questionLevelId;
        $question->save();
        return $this->successResponse(new QuestionResource($question));
    }


    public function save_question(Request $request){
        $input=($request->json()->all());

        $input_question=(object)($input['question']);
        $options=($input['options']);

//        return $this->successResponse($input_question);
        $result_array=array();
        DB::beginTransaction();
        try{

            $question = new Question();
            $question->question_level_id=$input_question->questionLevelId;
            $question->chapter_id=$input_question->chapterId;
            $question->question_type_id=$input_question->questionTypeId;
            $question->question=$input_question->question;
            $question->save();
            $result_array['question']=$question;

            $details_array=array();
            foreach($options as $option){
                $detail = (object)$option;
                $option = new Option();
                $option->question_id=$question->id;
                $option->option=$detail->option;
                $option->is_answer=$detail->isAnswer;
                $option->save();
                $details_array[]=$options;
            }
            DB::commit();
            $result_array['options']=$details_array;
            return $this->successResponse($result_array);

        }catch (\Exception $e ){
            DB::rollBack();
            return $this->errorResponse($e->getMessage(),500);
        }
    }
}
