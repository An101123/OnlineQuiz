@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header align-center">
            <h2>TEST MANAGAMENT</h2>
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
                        <a href="{{route('test.create')}}"
                           class="btn btn-success waves-effect">Create test</a>
                    </div>
                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="btn-success">
                                <tr>
                                    <th style="width: 10%">Quiz name</th>
                                    <th style="width: 10%">Total times</th>
                                    <th style="width: 15%">Total Questions</th>
                                    <th style="width: 20%">Description</th>
                                    <th style="width: 9%">Quiz type</th>
                                    <th style="width: 27%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test as $test)
                                <tr>
                                    <td><a href="{{route('test.show', [$test->id])}}">{{$test->test_name}}</a></td>
                                    <td>{{$test->test_time}}</td>
                                    <td>{{$test->question_number}}</td>
                                    <td>{{$test->description}}</td>
                                    <td>{{$test->name }}</td>
                                    <td>
                                        <a href=""
                                           class="btn btn-danger btn-delete"><i class="material-icons">delete</i></a>
                                        <a href="{{route('test.edit', [$test->id])}}"
                                           class="btn btn-info"><i class="material-icons font-16">edit</i></a>
                                        <a href="input-question.html"
                                           class="btn btn-success">Create question</a>
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