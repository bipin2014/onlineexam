<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Listenings;

class ListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view('Admin.addlistening')->with('id',$id);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $this->validate($request,[
            'listening'=>'required|mimes:mpga,wav',
        ]);

            $str="listening";
            $filenameWithExt= $request->file($str)->getClientOriginalName();

            //get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            //get extension
            $extension=$request->file($str)->getClientOriginalExtension();
    
            //filename to store
            $filenameToStore=$str. '_' .$id. '.'. $extension;

            //path to save a file
            $request->file($str)->storeAs('public/listening/'.$id.'/',$filenameToStore);

            $listening= new Listenings();
            $listening->e_id=$id;
            $listening->listening_url=$filenameToStore;
            $listening->save();
    
            return redirect('/admin/dashboard/'.$id)->with('success','Listening Added Sucessfully');
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
        return view('Admin.editlistening')->with('id',$id);
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
        echo $id;
        $this->validate($request,[
            'listening'=>'required|mimes:mpga,wav',
        ]);

            $str="listening";
            $filenameWithExt= $request->file($str)->getClientOriginalName();

            //get just filename
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
    
            //get extension
            $extension=$request->file($str)->getClientOriginalExtension();
    
            //filename to store
            $filenameToStore=$str. '_' .$id. '.'. $extension;

            //path to save a file
            $request->file($str)->storeAs('public/listening/'.$id.'/',$filenameToStore);

            $listening= Listenings::where('e_id',$id)->first();
            $listening->listening_url=$filenameToStore;
            $listening->save();
    
            return redirect('/admin/dashboard/'.$id)->with('success','Listening Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
