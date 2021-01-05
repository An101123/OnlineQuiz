@extends('Admin.layouts.index')
@section('content')

<section class="content">

    <div class="block-header align-center">
        <h2>EDIT TEST</h2>
    </div>
    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form class="form-horizontal"
                          action="{{route('test.update', [$test->test_id])}}"
                          method="POST"
                          enctype="multipart/form-data">
                        @method('PUT')

                        <input type="hidden"
                               name="_token"
                               value="{{csrf_token()}}" />

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="test_name">Test name:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="test_name"
                                               name="test_name"
                                               class="form-control"
                                               value="{{$test->test_name}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="test_name">Active:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <input class="form-check-input"
                                       type="radio"
                                       name="active"
                                       id="exampleRadios1"
                                       value="1"
                                       checked>
                                <label class="form-check-label"
                                       for="exampleRadios1">
                                    Active </label>

                                <input class="form-check-input"
                                       type="radio"
                                       name="active"
                                       id="exampleRadios2"
                                       value="2">
                                <label class="form-check-label"
                                       for="exampleRadios2">
                                    Inactive </label>

                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="description">Description:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea rows="4"
                                                  name="description"
                                                  class="form-control no-resize">{{$test->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="test_time">Test time (minutes):</label>
                            </div>
                            <div class="col-lg-10 col-md-2 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number"
                                               id="test_time"
                                               name="test_time"
                                               class="form-control"
                                               min="0000"
                                               max="9999"
                                               value="{{$test->test_time}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="question_number">Question number:</label>
                            </div>
                            <div class="col-lg-10 col-md-2 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number"
                                               id="question_number"
                                               name="question_number"
                                               class="form-control"
                                               min="0000"
                                               max="9999"
                                               value="{{$test->question_number}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="exampleFormControlSelect1">Type name:</label>
                            </div>
                            <div class="col-lg-10 col-md-2 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control"
                                                name="test_type_id"
                                                id="exampleFormControlSelect1">
                                            @foreach($type as $type1)
                                            <option value="{{$type1->id}}"
                                                    <?php foreach($typeSelect as $item) { if($item->test_type_id == $type1->id ) echo ' selected="selected"';} ?>>
                                                {{$type1->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password">Password:</label>
                            </div>
                            <div class="col-lg-10 col-md-3 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password"
                                               id="password"
                                               name="password"
                                               class="form-control"
                                               value="{{$test->password}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        \
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="password">Questions:</label>
                            </div>
                            <div class="col-lg-10 col-md-3 col-sm-2 col-xs-1">
                                <div class="form-group">
                                    <select name="list_question[]"
                                            multiple
                                            class="form-control"
                                            id="exampleFormControlSelect2">
                                        @foreach($question as $qt)
                                        <option value="{{$qt->id}}"
                                                <?php foreach($questionSelect as $item) { if($item->id == $qt->id ) echo ' selected="selected"';}  ?>>
                                            {{$qt->id}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <button type="submit"
                                        class="btn btn-success m-t-15 w-90 waves-effect">Save</button>
                                <button type="cancel"
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


<script type="text/javascript">
$(document).ready(function() {
    $("input[name='active']").change(function() {
        console.log($(this).val());
    });
    $('#select_all').click(function() {
        $('#demoSel[] option').prop('selected', true);
    });

});
</script>
@endsection