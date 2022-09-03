<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Model\studentModel;
use GuzzleHttp\Promise\Create;

class StudentController extends Controller
{
    public function student(){
        return response()->json(studentModel::get(),200);
    }

    public function studentById($student_id){
        return response()->json(studentModel::find($student_id),200);
    }

    public function addStudent(Request $request){
        $student = studentModel::create($request->all());
        return response()->json($student,201);
    }
}
