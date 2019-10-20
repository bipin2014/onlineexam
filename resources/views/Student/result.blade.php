@extends('layouts.dash')

@section('contents')

            {{-- Right Sidebar  --}}
            <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <h4 class="page-title">Result</h4>
                            <div class="d-flex align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">ExamResult</li>
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
                                            <h4 class="card-title">Result of Current Exam</h4>
                                        </div>
                                        
                                    </div>
                                    <!-- title -->
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table v-middle table-striped table-hover">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="border-top-0">Exam Title</th>
                                                <th class="border-top-0">Total Questions</th>
                                                <th class="border-top-0">Your Score</th>
                                                {{-- <th class="border-top-0">Edits</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                                    <tr>
                                                        <td>
                                                            {{$exam_title}}
                                                        </td>
                                                        <td>{{$total_question}}</td>
                                                        <td>{{$score}}</td>
                                                        
                                                    </tr>
                                        </tbody>
                                    </table>
                                </div>  
                            </div>
                            
                        </div>
                    </div>
                    
                    <!-- Table -->
                    <div class="m-5">
                        <a href="#" id="btn" class=" push-right btn btn-success text-white" >
                            View Full Detail
                        </a>
                        <a href="/dashboard"  class=" push-right btn btn-danger text-white" >
                                Go Back
                            </a>
                    </div>
                        


                        <div id="detailresult" style="display:none">
                                @if ($questions->count()>0)
                                @php
                                    $i=1;
                                @endphp
                                @foreach ($questions as $question)
                                <div class="d-flex flex-row comment-row m-t-0 m-5">
                                        <div class="m-r-10"><a class="btn btn-circle btn-primary text-white">{{ $question->q_no}}</a></div>
                                        <div class="comment-text w-100">
                                            <h3 class="font-medium">{{$question->main_heading}}</h3>
                                            <h4 class="font-medium">{{$question->q_heading}}</h4>
                                            <span class="m-b-15 d-block">{{$question->description}} </span>
                                            <div class="center">
                                                @if ($question->description_url)
                                                    <img class="rounded mx-auto d-block" src="/storage/photos/{{$question->e_id}}/{{$question->description_url}}">
                                                @endif
                                            </div>
                                                <ol class="list-group">
                                                    @if ($question->option1_url)
                                                        @if($question->answer==1)
                                                            <li class="list-group-item list-group-item-success"><img src="/storage/photos/{{$question->e_id}}/{{$question->option1_url}}"></li>
                                                        @elseif($selected_ans[$i]==1)
                                                            <li class="list-group-item list-group-item-danger"><img src="/storage/photos/{{$question->e_id}}/{{$question->option1_url}}"></li>
                                                        @else
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option1_url}}"></li>
                                                        @endif

                                                        @if($question->answer==2)
                                                            <li class="list-group-item list-group-item-success"><img src="/storage/photos/{{$question->e_id}}/{{$question->option2_url}}"></li>
                                                        @elseif($selected_ans[$i]==2)
                                                            <li class="list-group-item list-group-item-danger"><img src="/storage/photos/{{$question->e_id}}/{{$question->option2_url}}"></li>
                                                        @else
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option2_url}}"></li>
                                                        @endif

                                                        @if($question->answer==3)
                                                            <li class="list-group-item list-group-item-success"><img src="/storage/photos/{{$question->e_id}}/{{$question->option3_url}}"></li>
                                                        @elseif($selected_ans[$i]==3)
                                                            <li class="list-group-item list-group-item-danger"><img src="/storage/photos/{{$question->e_id}}/{{$question->option3_url}}"></li>
                                                        @else
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option3_url}}"></li>
                                                        @endif

                                                        @if($question->answer==4)
                                                            <li class="list-group-item list-group-item-success"><img src="/storage/photos/{{$question->e_id}}/{{$question->option4_url}}"></li>
                                                        @elseif($selected_ans[$i]==4)
                                                            <li class="list-group-item list-group-item-danger"><img src="/storage/photos/{{$question->e_id}}/{{$question->option4_url}}"></li>
                                                        @else
                                                            <li class="list-group-item"><img src="/storage/photos/{{$question->e_id}}/{{$question->option4_url}}"></li>
                                                        @endif

                                                    @else
                                                        @if($question->answer==1)
                                                            <li class="list-group-item list-group-item-success">{{$question->option1}}</li>
                                                        @elseif($selected_ans[$i]==1)
                                                            <li class="list-group-item list-group-item-danger">{{$question->option1}}</li>
                                                        @else
                                                            <li class="list-group-item">{{$question->option1}}</li>
                                                        @endif

                                                        @if($question->answer==2)
                                                            <li class="list-group-item list-group-item-success">{{$question->option2}}</li>
                                                        @elseif($selected_ans[$i]==2)
                                                            <li class="list-group-item list-group-item-danger">{{$question->option2}}</li>
                                                        @else
                                                            <li class="list-group-item">{{$question->option2}}</li>
                                                        @endif

                                                        @if($question->answer==3)
                                                            <li class="list-group-item list-group-item-success">{{$question->option3}}</li>
                                                        @elseif($selected_ans[$i]==3)
                                                            <li class="list-group-item list-group-item-danger">{{$question->option3}}</li>
                                                        @else
                                                            <li class="list-group-item">{{$question->option3}}</li>
                                                        @endif

                                                        @if($question->answer==4)
                                                            <li class="list-group-item list-group-item-success">{{$question->option4}}</li>
                                                        @elseif($selected_ans[$i]==4)
                                                            <li class="list-group-item list-group-item-danger">{{$question->option4}}</li>
                                                        @else
                                                            <li class="list-group-item">{{$question->option4}}</li>
                                                        @endif
                                                    @endif                                                            
                                                </ol> 
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                    
                                @endforeach
                            
                            @else
                            <div class="container text-center"> No Question has been added yet. </div>
                            
                            @endif                              
                        </div>
                    
                </div>

    
                
@endsection
