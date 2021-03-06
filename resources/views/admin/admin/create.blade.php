@extends('layouts.app')
@section('content')


        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Users') </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">@lang('admin.Users')</a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('admin.Add new item')
                        </li>
                    </ol>
                </div>
            </div>
        </div>

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">

        <div class="card-body">
            <form class="form"
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\AdminController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">
                <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Add new item')</h4>


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name"  value="{{ old('name') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Email')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"> </div>
                </div>



                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.Password')</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Group name') </label>
                    <div class="col-md-9">
                        <select name="groupId" class="form-control select2">
                            <option value="" >@lang('admin.Choose') </option>
                            @foreach($allGroup as $data)
                                <option value="{{ $data->name }}" > {{ $data->name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>




            </div>
                <div class="form-actions text-center">
                    <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1">
                        <i class="la la-check-square-o"></i>
                        @lang('admin.Save') </button>
                    <a onclick="window.history.back()"
                       class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i class="ft-x"></i>
                        @lang('admin.Cancel')
                    </a></div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




