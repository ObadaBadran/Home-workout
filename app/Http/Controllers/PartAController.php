<?php

namespace App\Http\Controllers;
use App\Models\Part;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Part as PartResource;
use App\Http\Controllers\BaseController as BaseController;



use Illuminate\Http\Request;

class PartAController extends BaseController
{

    public function index()
    {

        $part=Part::all();
        return $this->sendResponse(PartResource::collection($part),
            ' All body parts  successfully');
    }
    public function store(Request $request)
    {
        $input = $request->all();

        $validator=Validator::make($input,['name_of_part'=>'required',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }

          $part=Part::create($input);
        return $this->sendResponse(new PartResource($part),'part added successfully');
    }

    public function show($id)
    {
        $part=Part::find($id);
        if (is_null($part)){
            return $this->sendError('this part is not found');

        }
        return  $this->sendResponse(new PartResource($part),'part of body shown successfully');
    }
    public function update(Request $request, $part)
    {
        $input=$request->all();
        $validator=Validator::make($input,['name_of_part'=>'required|max:30',

        ]);
        if ($validator->fails()){
            return $this->sendError('something is wrong',$validator->errors());
        }
        $part->name_of_part=$input['name_of_part'];
      //  $part->image_url=$input['image_url'];
        $part->save();
        return  $this->sendResponse(new PartResource($part),'this part of body updated successfully');

    }
    public function destroy(Part $part)
    {
        $part->delete();
        return  $this->sendResponse(new PartResource($part),'exercise deleted successfully');

    }




}
