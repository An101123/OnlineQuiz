@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="block-header align-center">
        <h2>CREATE QUESTION</h2>
    </div>
    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form class="form-horizontal"
                          action="{{route('question.store')}}"
                          method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden"
                               name="_token"
                               value="{{csrf_token()}}" />
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="question_content">Question content:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4"
                                                  id="content"
                                                  name="content"
                                                  class="form-control no-resize"
                                                  maxlength="1000"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="answer">Correct Answer:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="correct_answer"
                                               name="correct_answer"
                                               class="form-control"
                                               maxlength="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="answer_1">Answer 1:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="answer_1"
                                               name="answer_1"
                                               class="form-control"
                                               maxlength="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="answer_2">Answer 2:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="answer_2"
                                               name="answer_2"
                                               class="form-control"
                                               maxlength="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="answer_3">Answer 3:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="answer_3"
                                               name="answer_3"
                                               class="form-control"
                                               maxlength="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password">Tests:</label>
                            </div>
                            <div class="col-lg-10 col-md-3 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <select name="list_test[]"
                                            multiple
                                            class="form-control"
                                            id="exampleFormControlSelect2">
                                        @foreach($test as $t)
                                        <option value="{{$t->id}}">{{$t->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="submit"
                                        class="btn btn-success m-t-15 w-90 waves-effect">Save</button>
                                <button type="button"
                                        class="btn btn-warning m-t-15 w-90 waves-effect">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Horizontal Layout -->
</section>
@endsection