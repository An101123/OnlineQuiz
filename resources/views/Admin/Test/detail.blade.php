@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header align-center">
            <h2>TEST DETAIL</h2>
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

                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="btn-success">
                                <tr>
                                    <th style="width: 10%">Question ID</th>

                                    <th style="width: 50%">Question</th>
                                    <th style="width: 10%">Correct Answer</th>
                                    <th style="width: 10%">Answer 1</th>
                                    <th style="width: 10%">Answer 2</th>
                                    <th style="width: 10%">Answer 3</th>
                                    <!-- <th style="width: 10%"></th> -->

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($test as $test)
                                <tr>
                                    <td>{{$test->question_id}}</td>
                                    <td>{{$test->content}}</td>
                                    <td>{{$test->correct_answer}}</td>
                                    <td>{{$test->answer_1}}</td>
                                    <td>{{$test->answer_2}}</td>
                                    <td>{{$test->answer_3}}</td>

                                    <!-- <td>
                                        <a href=""
                                           class="btn btn-danger btn-delete"><i class="material-icons">delete</i></a>

                                    </td> -->
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