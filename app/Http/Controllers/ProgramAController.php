<?php

namespace App\Http\Controllers;
use App\Models\Sportprogram;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Program as ProgramResource;

use App\Http\Controllers\BaseController as BaseController;

use Illuminate\Http\Request;

class ProgramAController extends BaseController
{
    public function index()
    {

        $program=Sportprogram::all();
        return $this->sendResponse(ProgramResource::collection($program),
            ' All programs shown  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,['begenning_date'=>'required',
            'finishing_date'=>'required',
            'periods'=>'required',
            'times_in_week'=>'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $program=Sportprogram::create($input);
        return $this->sendResponse(new ProgramResource($program),'program added successfully');
    }
    public function show($id)
    {
        $program=Sportprogram::find($id);
        if (is_null($program)){
            return $this->sendError('this program is not found');

        }
        return  $this->sendResponse(new ProgramResource($program),'program  shown successfully');
    }
    public function update(Request $request, $program)
    {
        $input=$request->all();
        $validator=Validator::make($input,['begenning_date'=>'required',
            'finishing_date'=>'required',
            'periods'=>'required',
            'times_in_week'=>'required|max:10|min:2',
        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $program->begenning_date=$input['begenning_date'];
        $program->finishing_date=$input['finishing_date'];
        $program->periods=$input['periods'];
        $program->times_in_week=$input['times_in_week'];

        $program->save();
        return  $this->sendResponse(new ProgramResource($program),'this program updated successfully');

    }
    public function destroy(Sportprogram $program)
    {
        $program->delete();
        return  $this->sendResponse(new ProgramResource($program),'program deleted successfully');

    }
}
