@extends('Admin.layouts.index')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header align-center">
            <h2>TEST TYPE MANAGAMENT</h2>
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
                        <a href="{{route('testtype.create')}}"
                           class="btn btn-success waves-effect">Create Test Type</a>
                    </div>

                    <div class="body table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="btn-success">
                                <tr>
                                    <th style="width: 25%">Name</th>
                                    <th style="width: 15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($type as $type)
                                <tr>
                                    <td>{{$type->name}}</td>
                                    <td>
                                        <form action="{{URL::route('testtype.destroy' ,$type->id)}}"
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
                                        </form>

                                        <a href="{{route('testtype.edit', [$type->id])}}"
                                           class="btn btn-info"><i class="material-icons">edit</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Table -->
    </div>
</section>

@endsection