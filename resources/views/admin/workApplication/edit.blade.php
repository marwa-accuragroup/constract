@extends('layouts.app')
@section('content')
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.workApplication') </h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.workApplication')</a>
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
                  action="{{ action('Admin\WorkApplicationController@update' , $editData->id) }}">
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


                        <div class="form-body">



                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.fileNo')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="fileNo"
                                           value="{{ $editData->fileNo }}">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.applicationNo')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="applicationNo"
                                           value="{{ $editData->applicationNo }}">

                                </div>
                            </div>



                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.address')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="address"
                                           value="{{ $editData->address }}">

                                </div>
                            </div>



                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.closeDate')

                                </label>
                                <div class="col-md-9">
                                    <input type='text' name="closeDate" class="form-control pickadate"
                                           placeholder="Basic Pick-a-date" value="{{ $editData->closeDate }}"/>


                                </div>
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.projectNoReq')

                                </label>
                                <div class="col-md-9">

                                    <input type="file"  name="projectNo">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.areaNo')

                                </label>
                                <div class="col-md-9">

                                    <input type="file"  name="areaNo">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.Notes')

                                </label>
                                <div class="col-md-9">

                                    <textarea type="text" class="form-control" name="notes"
                                    >{{ $editData->notes }}</textarea>

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




