@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="block-header align-center">
        <h2>CREATE TEST TYPE</h2>
    </div>
    <!-- Horizontal Layout -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">
                    <form class="form-horizontal"
                          action="{{route('testtype.store')}}"
                          method="POST"
                          enctype="multipart/form-data">
                        <input type="hidden"
                               name="_token"
                               value="{{csrf_token()}}" />
                        <div class="row clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                <label for="test_name">Name:</label>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text"
                                               id="name"
                                               name="name"
                                               class="form-control">
                                    </div>
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