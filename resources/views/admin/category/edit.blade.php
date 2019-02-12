@extends('layouts.app')
@section('content')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Categories') </h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.Categories')</a>
                    </li>
                    <li class="breadcrumb-item active"> @lang('admin.Edit item')
                    </li>
                </ol>
            </div>
        </div>
    </div>

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">

        <div class="card-body">
            <form class="form" role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\CateoryController@update' , $main->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>


                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="tabbable-custom ">


                        <div class="tab-content">


                            <div class="form-body">

                                <div class="form-group last">
                                    <label class="control-label col-md-3">  @lang('admin.Name')

                                    </label>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" name="name_ar" value="{{ $nameArr['ar'] }}">

                                    </div>
                                </div>

                                <div class="form-group last">
                                    <label class="control-label col-md-3">  @lang('admin.Icon')

                                    </label>
                                    <div class="col-md-9">

                                        <input type="text" class="form-control" name="icon" value="{{ $main->icon }}">

                                    </div>
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


    </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->
    </div>


@endsection




