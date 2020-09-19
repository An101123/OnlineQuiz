@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header align-center">
            <h2>QUESTION MANAGAMENT</h2>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    @if(session('notification'))
                    <div class="alert alert-success">
                        {{session('notification')}}
                    </div>
                    @endif
                    <div class="header">
                        <a href="{{route('question.create')}}"
                           class="btn btn-success waves-effect">Create question</a>
                    </div>

                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="btn-success">
                                <tr>
                                    <th style="width: 25%">Question content</th>
                                    <th style="width: 15%">Correct Answer</th>
                                    <th style="width: 15%">Answer 1</th>
                                    <th style="width: 15%">Answer 2</th>
                                    <th style="width: 15%">Answer 3</th>
                                    <th style="width: 15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($question as $question)
                                <tr>
                                    <td>{{$question->content}}</td>
                                    <td>{{$question->correct_answer}}</td>
                                    <td>{{$question->answer_1}}</td>
                                    <td>{{$question->answer_2}}</td>
                                    <td>{{$question->answer_3}}</td>
                                    <td>
                                        <form action="{{URL::route('question.destroy' ,$question->id)}}"
                                              method="POST">
                                            <input type="hidden"
                                                   name="_method"
                                                   value="DELETE">
                                            <input type="hidden"
                                                   name="_token"
                                                   value="{{ csrf_token() }}">
                                            <button class="btn btn-danger btn-delete"
                                                    onclick="return confirm('Are you sure?')"><i
                                                   class="material-icons">delete</button>
                                            <!-- <a href="{{route('question.destroy' ,$question->id)}}"
                                               class="btn btn-danger btn-delete"><i
                                                   class="material-icons">delete</i></a> -->
                                        </form>
                                        <a href="{{route('question.edit', [$question->id])}}"
                                           class="btn btn-info"><i class="material-icons">edit</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <center>
                            <ul class="pagination">
                                <li><a href="#">&laquo</a></li>
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">&raquo</a></li>
                            </ul>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
    </div>
</section>

@endsection