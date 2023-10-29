<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Level as LevelResource;

use App\Http\Controllers\BaseController as BaseController;

use Illuminate\Http\Request;

class LevelAdController extends BaseController
{
    public function index()
    {

        $level=Level::all();
        return $this->sendResponse(LevelResource::collection($level),
            ' All levels  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator=Validator::make($input,['level_name'=>'required|max:30',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $level=Level::create($input);
        return $this->sendResponse(new LevelResource($level),'level added successfully');
    }
    public function show($id)
    {
        $level=Level::find($id);
        if (is_null($level)){
            return $this->sendError('something is wrong ');

        }
        return  $this->sendResponse(new LevelResource($level),'level shown successfully');
    }
    public function destroy(Level $level)
    {
        $level->delete();
        return  $this->sendResponse(new LevelResource($level),'level deleted successfully');

    }

}
