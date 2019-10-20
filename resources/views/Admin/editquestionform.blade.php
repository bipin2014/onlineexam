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
                                        <li class="breadcrumb-item active" aria-current="page">Edit Question</li>
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
                                        

                                        {{Form::open(array('action'=>['QuestionController@update',$q_id], 'class'=>'form-horizontal form-material' ,'method'=>'PUT', 'enctype'=>'multipart/form-data'))}}

                                        @foreach ($questions as $question)
                                        <input type="hidden" name="e_id" value="{{$question->e_id}}">
                                            <div class="form-group">
                                                    <label class="col-md-12">Question Number</label>
                                                    <div class="col-md-12">
                                                    <input type="text" placeholder="Question Number" name="qno" value="{{$question->q_no}}" class="form-control form-control-line">
                                                    </div>
                                                    @error('error')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Main Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Heading" name="heading" value="{{$question->main_heading}}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"> Question Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" placeholder="Question Heading" value="{{$question->q_heading}}" name="Q_heading" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Description</label>
                                                <div class="col-md-12">
                                                    <textarea name="description" class="form-control form-control-line">{{$question->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Description Image</label>
                                                <div class="col-md-12">
                                                        <input id="description_image" type="file" class="form-control" name="description_image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                    <label class="col-md-12"> Option1</label>
                                                    <div class="col-md-12">
                                                        <input type="text" name="option1" value="{{$question->option1}}" placeholder="option1" class="form-control form-control-line">
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Option1 Image</label>
                                                <div class="col-md-12">
                                                        <input id="option1_image" type="file" class="form-control" name="option1_image">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12"> Option2</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="option2" placeholder="option2" value="{{$question->option2}}" class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Option2 Image</label>
                                                <div class="col-md-12">
                                                        <input id="description_image" type="file" class="form-control" name="option2_image">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12"> Option3</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="option3" placeholder="option3" value="{{$question->option3}}" class="form-control form-control-line">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-12">Option3 Image</label>
                                                <div class="col-md-12">
                                                        <input id="option3_image" type="file" class="form-control" name="option3_image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12"> Option4</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="option4" placeholder="option4" value="{{$question->option4}}" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Option4 Image</label>
                                                <div class="col-md-12">
                                                        <input id="option4_image" type="file" class="form-control" name="option4_image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Answer:</label>
                                                <div class="col-md-12">
                                                    Option1
                                                    @if ($question->answer==1)
                                                    <input type="radio" class="form-control" name="answer" value="1" checked>
                                                    @else
                                                    <input type="radio" class="form-control" name="answer" value="1" >
                                                    @endif
                                                    
                                                    Option2
                                                    @if ($question->answer==2)
                                                    <input type="radio" class="form-control" name="answer" value="2" checked>
                                                    @else
                                                    <input type="radio" class="form-control" name="answer" value="2">
                                                    @endif
                                                    
                                                    Option3
                                                    @if ($question->answer==3)
                                                    <input type="radio" class="form-control" name="answer" value="3" checked>
                                                    @else
                                                    <input type="radio" class="form-control" name="answer" value="3">
                                                    @endif
                                                    

                                                    Option4
                                                    @if ($question->answer==4)
                                                    <input type="radio" class="form-control" name="answer" value="4" checked>
                                                    @else
                                                    <input type="radio" class="form-control" name="answer" value="4">
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                            
                                        @endforeach
                                        
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-default">Edit Question</button>
                                                </div>
                                            </div>
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                    
                </div>
                
                <!-- End Container fluid  -->
    
@endsection
