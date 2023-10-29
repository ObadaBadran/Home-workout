<?php

namespace App\Http\Controllers;
use App\Models\Organic;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Organic as OrganicResource;

use App\Http\Controllers\BaseController as BaseController;

use Illuminate\Http\Request;

class OrganicAController extends BaseController
{
    public function index()
    {

        $organic=Organic::all();
        return $this->sendResponse(OrganicResource::collection($organic),
            ' All programs shown  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,['begenning_date'=>'required',
            'finishing_date'=>'required',
            'eating_times'=>'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $program=Organic::create($input);
        return $this->sendResponse(new OrganicResource($program),'program added successfully');
    }
    public function show($id)
    {
        $program=Organic::find($id);
        if (is_null($program)){
            return $this->sendError('this program is not found');

        }
        return  $this->sendResponse(new OrganicResource($program),'program  shown successfully');
    }
    public function update(Request $request, $program)
    {
        $input=$request->all();
        $validator=Validator::make($input,['begenning_date'=>'required',
            'finishing_date'=>'required',
            'eating_times'=>'required|min:1|max:6',
        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $program->begenning_date=$input['begenning_date'];
        $program->finishing_date=$input['finishing_date'];
        $program->eating_times=$input['eating_times'];
        $program->save();
        return  $this->sendResponse(new OrganicResource($program),'this program updated successfully');

    }
    public function destroy(Organic $program)
    {
        $program->delete();
        return  $this->sendResponse(new OrganicResource($program),'program deleted successfully');

    }
}
