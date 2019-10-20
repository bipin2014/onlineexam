<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questions;
use App\Exams;

class ResultController extends Controller
{
    public function showResult(Request $request ,$id)
    {
        $i=1;
        $score=0;
        $total_question=0;
        // echo $id." <br>";
        $exam=Exams::where('e_id',$id)->get();
        foreach ($exam as $e) {
            $exam_title=$e->e_title;
        }
        $selected_ans=array();
        
        $questions=Questions::where('e_id',$id)->orderBy('q_no','asc')->get();
        foreach ($questions as $question) 
        {
         
            if($question->answer==$request->input('a'. $i)){
                $score++;
            }
            $selected_ans += [$i => $request->input('a'. $i)];
            $i++;
            $total_question++;
        }
        // echo "Score=". $score;     
        return view('Student.result')
        ->with('score',$score)
        ->with('questions',$questions)
        ->with('exam_title',$exam_title)
        ->with('total_question',$total_question)
        ->with('selected_ans',$selected_ans); 
    }
}
