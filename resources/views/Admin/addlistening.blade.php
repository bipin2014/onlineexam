@extends('layouts.dash')

@section('contents')

            {{-- Right Sidebar  --}}
            <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h4 class="page-title">Dashboard</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Listenig</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
                <!-- End right sidebar toggle -->
            
                <!-- Container fluid  -->
                <div class="container-fluid">

                        <div >
                                <div class="card">
                                    <div class="card-body">
                                        {{Form::open(array('action'=>['ListeningController@store',$id] ,'method'=>'POST', 'class'=>'form-horizontal form-material' ,'enctype'=>'multipart/form-data' )) }}

                                        {{-- <input type="hidden" name="e_id" value="{{$id}}"> --}}
                                            <div class="form-group">
                                                <label class="col-md-12">Insert Listening File</label>
                                                <div class="col-md-12">
                                                        <input type="file" name="listening" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-success" value="Add Listening">
                                                </div>
                                            </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                    
                </div>
                
                <!-- End Container fluid  -->
    
@endsection
