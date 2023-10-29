<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\Sportprogram;
use Illuminate\Http\Request;
use App\Models\Exercise;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Exercise as ExerciseResource;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\DB;

class ExerciseAController extends BaseController
{
    public function indexA(){
           $exercise=Exercise::all();
      //  $exercise->increment('points');

        return $this->sendResponse(ExerciseResource::collection($exercise),
            ' All exercises  successfully');
    }

    public function index()
    {

        $exercise=Exercise::all();
     /* $exercises1=DB::table('exercises')->join('exercise_sprograms','exercises.id',"=",'exercise_sprograms.exercise_id')
          ->join('sport_programs','sport_programs.id',"=",'exercise_sprograms.sportprogram_id')->get();
      $exercises2=DB::table('exercises')->join('part_exercises','exercises.id',"=",'part_exercises.exercise_id')
          ->join('parts','parts.id',"=",'part_exercises.part_id')->get();
       // $exercises=DB::table($exercises1)->join($exercises2,$exercises1->exercise_id,"=",$exercises2->exercise_id)->get();
        foreach( $exercises1 as $ex1){
        foreach ($exercises2 as $ex2){
            if($ex1->name."=".$ex2->name){
                $exercise=$ex2;
            }

    }*/
   //     $exercise->increment('points');


        return $this->sendResponse(ExerciseResource::collection($exercise),
           ' All exercises  successfully');
    }




    public function store(Request $request)
    {
      $input = $request->all();
     /* $validator=Validator::make($input,['name'=>'required',
         'counter'=>'required',
          'duration'=>'required',
          'description'=>'required',
          'calories'=>'required',
          'gif_url'=>'required|img:jpeg,png,bmp,jpg,gif,svg|max:2048',
          'sportprogram_id'=>'required',
          'part_id'=>'required'
      ]);
     /* if ($validator->fails()){
        return $this->sendError('something is wrong',$validator->errors());
      }*/   $gif_url = $this -> saveImage($request->gif_url,folder:'images/');
        $exercise= Exercise::create([
            'name'=>$request->name,
            'counter'=>$request->counter,
            'duration'=>$request->duration,
            'description'=>$request->description,
            'calories'=>$request->calories,
            'gif_url'=>$request->gif_url,
           'part_id'=>$request->part_id,
            'goal_id'=>$request->goal_id,
             'level_id'=>$request->level_id,
            // 'sportprogram_id'=>$request->sportprogram_id,
           // 'part_id'=>$request->part_id,

        ]);

     //   $exercise=Exercise::create($input);
      return $this->sendResponse(new ExerciseResource($exercise),'exercise added successfully');
    }


    public function show($id)
    {
        $exercise=Exercise::find($id);

        if (is_null($exercise)){
            return $this->sendError('exercise is not found');

        }
        $exercise->increment('points');

        return  $this->sendResponse(new ExerciseResource($exercise),'exercise shown successfully');
    }

    public function update(Request $request, $exercise)
    {
      $input=$request->all();
      $validator=Validator::make($input,['name'=>'required|max:30',
          'counter'=>'required|min:3|max:50',
          'duration'=>'required',
          'description'=>'required',
          'calories'=>'required',
      ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $exercise->name=$input['name'];
        $exercise->counter=$input['counter'];
        $exercise->name=$input['duration'];
        $exercise->name=$input['description'];
        $exercise->name=$input['calories'];
        $exercise->save();
        return  $this->sendResponse(new ExerciseResource($exercise),'exercise updated successfully');

    }


    public function destroy(Exercise $exercise)
    {
     $exercise->delete();
        return  $this->sendResponse(new ExerciseResource($exercise),'exercise deleted successfully');

    }
    public function saveImage($photo ,$folder){
        $newimage = $photo->getclientOriginalExtension();
        $gif_url = time().'.'.$newimage;
        $path = $folder;
        $photo ->move($path, $gif_url);
        return $gif_url;
    }
    public function indexexercise(){
         $exercises1=DB::table('exercises')->join('goals','exercises.id',"=",'goals.id')
          ->select('exercises.name','exercises.counter','exercises.description','exercises.duration')->get();
      $exercises2=DB::table('exercises')->join('levels','exercises.id',"=",'levels.id')
          ->select('exercises.name','exercises.counter','exercises.description','exercises.duration')->get();
        $exercises3=DB::table('exercises')->join('parts','exercises.id',"=",'parts.id')
            ->select('exercises.name','exercises.counter','exercises.description','exercises.duration')->get();
        foreach( $exercises1 as $ex1){
        foreach ($exercises2 as $ex2){
            foreach($exercises3 as $ex3){
                if($ex1->name."=".$ex2->name."=".$ex3->name){
                    $exercise=$ex3;
                    return $this->SendResponse(new ExerciseResource($exercise),'successfully');
            }
        }
        }

    }

}}
