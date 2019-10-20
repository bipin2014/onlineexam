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
                                        <li class="breadcrumb-item active" aria-current="page">ExamList</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-7">
                            @if (Auth::user()->is_admin)
                                <div class="text-right upgrade-btn">
                                    <a data-toggle="modal" data-target="#examtitleModal" class="btn btn-danger text-white">Create New Exam</a>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
                
                <!-- End right sidebar toggle -->
            
                <!-- Container fluid  -->
                <div class="container-fluid">

                    <div class="row">
                        <!-- column -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- title -->
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Lists Of Exam</h4>
                                        </div>
                                        
                                    </div>
                                    <!-- title -->
                                </div>
                                
                                @if($exams->count()>0) 
                                    @if (Auth::user()->is_admin)
                                        <div class="table-responsive">
                                            <table class="table v-middle table-striped table-hover">
                                                <thead>
                                                    <tr class="bg-light">
                                                        <th class="border-top-0">Products</th>
                                                        <th class="border-top-0">Time</th>
                                                        <th class="border-top-0">Edits</th>
                                                        <th class="border-top-0">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
            
                                                    
                                                        @foreach ($exams as $exam)
                                                            <tr >
                                                                <td class='clickable-row' data-href='{{url('/admin/dashboard/'.$exam->e_id)}}'>
                                                                    <div class="d-flex align-items-center">
                                                                    <div class="m-r-10"><a class="btn btn-circle btn-primary text-white">{{strtoupper(substr( $exam->e_title, 0, 2 ))}}</a></div>
                                                                        <div class="">
                                                                            <h4 class="m-b-0 font-16"> {{ $exam->e_title}}</h4>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class='clickable-row' data-href='{{url('/admin/dashboard/'.$exam->e_id)}}'>50 min</td>
                                                                <td>
                                                                    <a data-toggle="modal" data-target="#editexamtitleModal" class="btn btn-success btn-sm text-white" >
                                                                            Edit Title
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    {{-- <form action="{{ url('/exam/'. $exam->e_id) }}" method="DELETE" onclick="return confirm('Are you sure want to delete?')">
                                                                        @csrf
                                                                        <input type="hidden" name="e_id" value="{{$exam->e_id}}" >
                                                                        <input type="submit" value="DELETE" class="btn btn-danger btn-sm text-white" >
                                                                    </form> --}}

                                                                    {{ Form::open(array('action' => ['ExamController@destroy',$exam->e_id],'method' => 'DELETE', 'onclick'=>"return confirm('Are you sure want to delete?')")) }}
                                                                    {{-- <input type="hidden" name="e_id" value="{{$exam->e_id}}" > --}}
                                                                        <input type="submit" value="DELETE" class="btn btn-danger btn-sm text-white" >
                                                                    {{ Form::close() }}
                                                                   
                                                                    
                                                                </td>
                                                                
                                                            </tr>
                                                            
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div> 
                                        @else
                                        <div class="table-responsive">
                                            <table class="table v-middle table-striped table-hover">
                                                <thead>
                                                    <tr class="bg-light">
                                                        <th class="border-top-0">Exams List</th>
                                                        <th class="border-top-0">Time</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        @foreach ($exams as $exam)
                                                            <tr >
                                                                <td class='clickable-row' data-href='{{url('dashboard/'.$exam->e_id)}}'>
                                                                    <div class="d-flex align-items-center">
                                                                    <div class="m-r-10"><a class="btn btn-circle btn-primary text-white">{{strtoupper(substr( $exam->e_title, 0, 2 ))}}</a></div>
                                                                        <div class="">
                                                                            <h4 class="m-b-0 font-16"> {{ $exam->e_title}}</h4>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class='clickable-row' data-href='{{url('dashboard/'.$exam->e_id)}}'>50 min</td>
                                                            </tr>
                                                            
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div> 
                                    @endif
                                @else
                                    <div class="container text-center"> No Exam has been Created. </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <!-- Table -->
                    
                    
                </div>
                
                <!-- End Container fluid  -->

                              
    
@endsection
