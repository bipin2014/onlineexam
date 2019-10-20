<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams;
use DB;


class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams=Exams::all();
        return view('dashboard')->with('exams',$exams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function examquestions($id)
    {
        $questions= DB::table('questions')->where('e_id', $id)->orderBy('q_no','asc')->get();
        $listening=DB::table('listenings')->where('e_id', $id)->get();
        $a=false;
        foreach($listening as $l){
           $a=true;
        }
        
        return view('Admin.questionlists')->with('questions',$questions)->with('listening',$a)->with('id',$id);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:exams,e_title'
        ]);
        $exam=new Exams();
        $exam->e_title=$request->input('title');
        $exam->save();

        return redirect('/dashboard')->with('success', 'Exam Added Sucessfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $questions=DB::table('questions')->where('e_id', $id);
        $questions->delete();


        $exam=DB::table('exams')->where('e_id', $id);
        $exam->delete();
        return redirect('/dashboard')->with('success','Sucessfully Deleted Exam and their questions.');
    }
}
