<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Controllers\BaseController as BaseController;


use Illuminate\Http\Request;

class CategoryController extends BaseController
{

    public function index()
    {
        $category=Category::all();
        return $this->sendResponse(CategoryResource::collection($category),
            ' All categories sent successfully');

    }


    public function store(Request $request)
    {
        $input=$request->all();
        $validator=Validator::make($input,[ 'type_of_food'=>'required',
            'calories'=>'required'
        ]);
        if ($validator->fails()) {
            return $this->sendError('please validate error',$validator->errors());
        }
        $category=Category::create($input);
        return $this->sendResponse(new CategoryResource($category),'user created successfully');

    }


    public function show($id)
    {
        $category=Category::find($id);
        if (is_null($category)) {
            return $this->sendError('category not found');
        }
        return $this->sendResponse(new CategoryResource($category),'user shown successfully');
    }


    public function update(Request $request, $category)
    {
        $input=$request->all();
        $validator=Validator::make($input,[
            'type_of_food'=>'required',
            'calories'=>'required']);
        if ($validator->fails()) {
            return $this->sendError('please validate error',$validator->errors());
        }
        $category->type_of_food=$input['type_of_food'];
        $category->calories=$input['calories'];
        $category->save();
        return $this->sendResponse(new CategoryResource($category),'user updated successfully');
    }


    public function destroy($category)
    {
        $category->delete();
        return $this->sendResponse(new CategoryResource($category),'user deleted successfully');
    }
}
