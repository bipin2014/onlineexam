<?php

namespace App\Http\Controllers;

use App\Exams;
use App\Http\Resources\ApiResource;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function index()
    {
        $exams=Exams::all();

        return ApiResource::collection($exams);
//        return new ApiResource($exams);

//        return new ApiResource($exams)

    }

    public function show($id){
        $exam=Exams::findOrFail($id);

        return new ApiResource($exam);
    }
}
