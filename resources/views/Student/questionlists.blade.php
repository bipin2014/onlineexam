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
                                        <li class="breadcrumb-item active" aria-current="page">QuestionList</li>
                                    </ol>
                                </nav>
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
                                <form action="{{  url('dashboard/'. $id .'/showresult') }}" method="POST">
                                    @csrf
                                <div class="comment-widgets scrollable">
                                    <div class="row">
                                            <div class="col-md-10 center">
                                                    <audio controls controlsList="nodownload">
                                                            <source src="/storage/listening/{{$id}}/listening_{{$id}}.mp3" >
                                                        </audio>
                                            </div>
        
                                            <div class="col-md-2">
                                                    <div id="clock">Hello</div>
                                            </div>

                                    </div>
                                    
                                    
                                    
                                    @if ($questions->count()>0)
                                    @php
                                            $sn=1
                                        @endphp
                                        @foreach ($questions as $question)
                                        <div class="d-flex flex-row comment-row m-t-0">
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
                                                            @if ($question->option1_url)

                                                            <div class='form-group'>
                                                                <div class="my-5">
                                                                    <span class="row">
                                                                        <span class="col-md-6">
                                                                            <span class='form-radio'>
                                                                                <label class='form-check-label'>
                                                                                    <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='1'> 
                                                                                    <img src="/storage/photos/{{$question->e_id}}/{{$question->option1_url}}">
                                                                                </label>
                                                                            </span>
                                                                        </span>
                                                                        <span class="col-md-6">
                                                                                <span class='form-radio'>
                                                                                    <label class='form-check-label'>
                                                                                        <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='2'> 
                                                                                        <img src="/storage/photos/{{$question->e_id}}/{{$question->option2_url}}">
                                                                                    </label>
                                                                                </span>
                                                                        </span>
                                                                        

                                                                    </span>
                                                                </div>
                                                                <div>
                                                                    <span class="row">
                                                                            <span class="col-md-6">
                                                                                    <span class='form-radio'>
                                                                                        <label class='form-check-label'>
                                                                                            <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='3'> 
                                                                                            <img src="/storage/photos/{{$question->e_id}}/{{$question->option3_url}}">
                                                                                        </label>
                                                                                    </span>
                                                                            </span>
                                                                            <span class="col-md-6">
                                                                                    <span class='form-radio'>
                                                                                        <label class='form-check-label'>
                                                                                            <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='4'> 
                                                                                            <img src="/storage/photos/{{$question->e_id}}/{{$question->option4_url}}">
                                                                                        </label>
                                                                                    </span>
                                                                            </span>
                                                                    </span>
                                                                </div>
                                                            </div>



                                                            @else
                                                            <div class='form-group'>
                                                                
                                                                    <div class='form-radio'>
                                                                      <label class='form-check-label'>
                                                                        <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='1'> 
                                                                        {{$question->option1}}
                                                                      </label>
                                                                    </div>
                                  
                                                                    <div class='form-radio'>
                                                                      <label class='form-check-label'>
                                                                        <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='2'> 
                                                                        {{$question->option2}}
                                                                      </label>
                                                                    </div>
                                  
                                                                    <div class='form-radio'>
                                                                      <label class='form-check-label'>
                                                                        <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='3'> 
                                                                        {{$question->option3}}
                                                                      </label>
                                                                    </div>
                                  
                                                                    <div class='form-radio'>
                                                                      <label class='form-check-label'>
                                                                        <input type='radio' class='form-check-input' name="a{{$sn}}" id='optionsRadios1' value='4'> 
                                                                        {{$question->option4}}
                                                                      </label>
                                                                    </div>
                                                            </div>
                                                            
                                                            @endif                                                            
                                                        
                                                </div>
                                            </div>
                                            @php
                                                $sn++
                                            @endphp
                                        @endforeach
                                    
                                    @else
                                    <div class="container text-center"> No Question has been added yet. </div>
                                    
                                    @endif
                                    
                                
                                </div>
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                            <button type="submit" onclick="return confirm('Are you sure want to submit?')" class="btn btn-success m-2">Submit Your Answers</button>
                                    </div>
                                </div>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
    
@endsection
