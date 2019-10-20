<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams;
use App\Questions;
use DB;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function student()
    {
        $exams= Exams::all();

        return view('home')->with('exams',$exams);
    }

    public function examquestions($id)
    {
        $questions= DB::table('questions')->where('e_id', $id)->orderBy('q_no','asc')->get();
    
        return view('Student.questionlists')->with('id',$id)->with('questions',$questions);
    }

    
}
