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
                                        <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">QuestionList</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="text-right upgrade-btn">
                                @if ($listening)
                            <a href="/{{Request::path()}}/addlistening/{{$id}}/edit" class="btn btn-default text-white">Edit Listening</a>
                                @else
                                <a href="/{{Request::path()}}/addlistening" class="btn btn-danger text-white">Add Listening</a>
                                @endif  
                            <a href="/{{Request::path()}}/addquestion" class="btn btn-danger text-white">Add New Question</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- End right sidebar toggle -->
            
                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Recent comment and chats -->
                    <div class="row">
                        <!-- column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Questions</h4>
                                </div>
                                <div class="comment-widgets scrollable">

                                    @if ($questions->count()>0)
                                        @foreach ($questions as $question)
                                        <h3 class="font-medium">{{$question->main_heading}}</h3>
                                        <div class="d-flex flex-row comment-row m-t-0">
                                                
                                                <div class="m-r-10"><a class="btn btn-circle btn-primary text-white">{{ $question->q_no}}</a></div>
                                                <div class="comment-text w-100">
                                                    {{-- <h3 class="font-medium">{{$question->main_heading}}</h3> --}}
                                                    <h4 class="font-medium">{{$question->q_heading}}</h4>
                                                    <span class="m-b-15 d-block">{{$question->description}} </span>
                                                    <div class="center">
                                                        @if ($question->description_url)
                                                        <img class="rounded mx-auto d-block" src="/storage/photos/{{$question->e_id}}/{{$question->description_url}}">
                                                        @endif
                                                    </div>
                                                        <ol class="list-group">
                                                            @if ($question->option1_url)
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option1_url}}"></li>
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option2_url}}"></li>
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option3_url}}"></li>
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option4_url}}"></li>

                                                            @else
                                                            <li class="list-group-item">{{$question->option1}}</li>
                                                            <li class="list-group-item">{{$question->option2}}</li>
                                                            <li class="list-group-item">{{$question->option3}}</li>
                                                            <li class="list-group-item">{{$question->option4}}</li>
                                                                
                                                            @endif                                                            
                                                        </ol> 
                                                        <div class="row m-2">
                                                            <div class="col-md-1">
                                                            <a href="/admin/dashboard/{{$question->e_id}}/editquestion/{{$question->q_id}}" class="btn btn-default">Edit Question</a>
                                                            </div>
                                                            <div class="col-md-6 float-left">
                                                                {{Form::open(array('action'=>['QuestionController@destroy',$question->q_id], 'method'=>'DELETE', 'onclick'=>"return confirm('Are yOu sure want to delete this Question?')")) }}
                                                                    <input type="hidden" name="e_id" value="{{$question->e_id}}">
                                                                    <input type="submit" class="btn btn-danger" value="DELETE Question">
                                                                {{Form::close()}}
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            
                                        @endforeach
                                    
                                    @else
                                    <div class="container text-center"> No Question has been added yet. </div>
                                    
                                    @endif
                                    
                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Recent comment and chats -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->

     
    
@endsection
