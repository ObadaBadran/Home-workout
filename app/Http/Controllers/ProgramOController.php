<?php

namespace App\Http\Controllers;
use App\Models\Sportprogram;
use App\Http\Resources\Program as ProgramResource;
use App\Http\Controllers\BaseController as BaseController;

use Illuminate\Http\Request;

class ProgramOController extends BaseController
{
    public function index()
    {

        $program = Sportprogram::all();
        return $this->sendResponse(ProgramResource::collection($program),
            ' All programs shown  successfully');
    }

    public function show($id)
    {
        $program = Sportprogram::find($id);
        if (is_null($program)) {
            return $this->sendError('this program is not found');

        }
        return $this->sendResponse(new ProgramResource($program), 'program  shown successfully');
    }
}
