<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Goal as GoalResource;

use App\Http\Controllers\BaseController as BaseController;



class GoalController extends BaseController
{
    public function index()
    {

        $goal=Goal::all();
        return $this->sendResponse(GoalResource::collection($goal),
            ' All goals shown  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,['goal_name'=>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $goal=Goal::create($input);
        return $this->sendResponse(new GoalResource($goal),'goal added successfully');
    }
}
