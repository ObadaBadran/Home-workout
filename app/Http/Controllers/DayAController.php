<?php

namespace App\Http\Controllers;
use App\Models\Day;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Day as DayResource;

use App\Http\Controllers\BaseController as BaseController;


use Illuminate\Http\Request;

class DayAController extends BaseController
{
    public function index()
    {

        $day=Day::all();
        return $this->sendResponse(DayResource::collection($day),
            ' All days  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,['day_name'=>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $day=Day::create($input);
        return $this->sendResponse(new DayResource($day),'day added successfully');
    }
    public function show($id)
    {
        $day=Day::find($id);
        if (is_null($day)){
            return $this->sendError('something is wrong ');

        }
        return  $this->sendResponse(new DayResource($day),'day shown successfully');
    }


}
