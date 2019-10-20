<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exams;
use App\Questions;
use DB;
use ValidateForm;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('Admin.addquestionform')->with('id',$id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=$request->input('e_id');
        $prequestion=DB::table('questions')->where('e_id',$id)->get();
        $questions=new Questions();

        if($request->input('qno')!=null){
            $qno=(int)$request->input('qno');
            foreach($prequestion as $q){
                if($q->q_no==$qno){
                    return redirect('/admin/dashboard/'.$id.'/addquestion')->with('error','This Question number is already inserted');
                }

                echo $q->q_no;
            }
            $questions->q_no=(int) $request->input('qno');
        }else{
            return redirect('/admin/dashboard/'.$id.'/addquestion')->with('error','Question number must be entered');
        }
        

        if($request->input('heading')!=null){
            $questions->main_heading=$request->input('heading');
        }

        if($request->input('Q_heading')!=null){
            $questions->q_heading=$request->input('Q_heading');
        }

        if($request->input('description')!=null){
            $questions->description=$request->input('description');
        }

        if($request->file('description_image')!=null){
            $str="description_image";
            $descriptionname=$this->upload($str,$request,$id);
            $questions->description_url=$descriptionname;
        }

        if($request->input('option1')!=null){
            $questions->option1=$request->input('option1');
        }else{

        }
        if($request->input('option2')!=null){
            $questions->option2=$request->input('option2');
        }else{
            
        }

        if($request->input('option3')!=null){
            $questions->option3=$request->input('option3');
        }else{
            
        }

        if($request->input('option4')!=null){
            $questions->option4=$request->input('option4');
        }else{
            
        }

        if($request->file('option1_image')!=null){
            $str='option1_image';
            $option1name=$this->upload($str,$request,$id);
            $questions->option1_url=$option1name;
        }

        if($request->file('option2_image')!=null){
            $str='option2_image';
            $option2name=$this->upload($str,$request,$id);
            $questions->option2_url=$option2name;
          
        }
        if($request->file('option3_image')!=null){
            $str='option3_image';
            $option3name=$this->upload($str,$request,$id);
            $questions->option3_url=$option3name;
           
        }
        if($request->file('option4_image')!=null){
            $str='option4_image';
            $option4name=$this->upload($str,$request,$id);
            $questions->option4_url=$option4name;
        }

        $questions->e_id=$id;
        $questions->answer=$request->input('answer');
        $questions->save();
        
        return redirect('/admin/dashboard/'.$id)->with('success','One Question Added Sucessfully');
    }

    public function upload($str,Request $request,$id){
        $filenameWithExt= $request->file($str)->getClientOriginalName();

        //get just filename
        $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);

        //get extension
        $extension=$request->file($str)->getClientOriginalExtension();

        //filename to store
        $filenameToStore=$filename.'_'.time().'_'.$str. '.' . $extension;
        
        //path to save a file
        $path=$request->file($str)->storeAs('public/photos/'.$id.'/',$filenameToStore);

        return $filenameToStore;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('Admin.addquestionform')->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$q_id)
    {
        $questions=DB::table('questions')->where('q_id',$q_id)->get();
        return view('Admin.editquestionform')->with('questions',$questions)->with('q_id',$q_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $q_id)
    {
    
        $questions=Questions::where('q_id',$q_id)->first();



        $id=$request->input('e_id');

        // if($request->input('qno')!=null){
        //     $qno=(int)$request->input('qno');
        //     $questions->q_no=$qno;
        // }else{
        //     return redirect('/admin/dashboard/'.$id.'/editquestion/'.$q_id)->with('error','Question number must be entered');
        // }
        

        if($request->input('heading')!=null){
            $questions->main_heading=$request->input('heading');
        }

        // if($request->input('Q_heading')!=null){
        //     $questions->q_heading=$request->input('Q_heading');
        // }

        // if($request->input('description')!=null){
        //     $questions->description=$request->input('description');
        // }

        // if($request->file('description_image')!=null){
        //     $str="description_image";
        //     $descriptionname=$this->upload($str,$request,$id);
        //     $questions->description_url=$descriptionname;
        // }

        // if($request->input('option1')!=null){
        //     $questions->option1=$request->input('option1');
        // }else{

        // }
        // if($request->input('option2')!=null){
        //     $questions->option2=$request->input('option2');
        // }else{
            
        // }

        // if($request->input('option3')!=null){
        //     $questions->option3=$request->input('option3');
        // }else{
            
        // }

        // if($request->input('option4')!=null){
        //     $questions->option4=$request->input('option4');
        // }else{
            
        // }

        // if($request->file('option1_image')!=null){
        //     $str='option1_image';
        //     $option1name=$this->upload($str,$request,$id);
        //     $questions->option1_url=$option1name;
        // }

        // if($request->file('option2_image')!=null){
        //     $str='option2_image';
        //     $option2name=$this->upload($str,$request,$id);
        //     $questions->option2_url=$option2name;
          
        // }
        // if($request->file('option3_image')!=null){
        //     $str='option3_image';
        //     $option3name=$this->upload($str,$request,$id);
        //     $questions->option3_url=$option3name;
           
        // }
        // if($request->file('option4_image')!=null){
        //     $str='option4_image';
        //     $option4name=$this->upload($str,$request,$id);
        //     $questions->option4_url=$option4name;
        // }

        // $questions->e_id=$id;
        // $questions->answer=$request->input('answer');
        $questions->save();
        
        return redirect('/admin/dashboard/'.$id)->with('success','Question Updated Sucessfully');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        
        $question=DB::table('questions')->where('q_id',$id);
        $question->delete();
        $e_id=$request->input('e_id');
        return redirect('/admin/dashboard/'.$e_id)->with('success','Sucessfully deleted Question');
    }
}
