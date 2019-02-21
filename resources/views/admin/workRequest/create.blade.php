@extends('layouts.app')
@section('content')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.workRequest') </h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.workRequest')</a>
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
            <form class="form" role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\WorkRequestController@store') }}">
                {{ csrf_field() }}
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Add new item')</h4>


                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="tabbable-custom ">


                        <div class="form-body">


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.workCat')

                                </label>
                                <div class="col-md-9">


                                    <select name="workCatId" class="form-control ">
                                        <option value="">@lang('admin.Choose')  </option>
                                        @foreach($allCat as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.requestNo')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="requestNo"
                                           value="{{ old('requestNo') }}">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.bidderNo')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="bidderNo"
                                           value="{{ old('bidderNo') }}">

                                </div>
                            </div>



                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.address')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="address"
                                           value="{{ old('address') }}">

                                </div>
                            </div>



                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.contractorName')

                                </label>
                                <div class="col-md-9">

                                    <select name="contractor" class="form-control ">
                                        <option value="">@lang('admin.Choose')  </option>
                                        @foreach($allContractor as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.price')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="price"
                                           value="{{ old('price') }}">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.balanceItem')

                                </label>
                                <div class="col-md-9">

                                    <textarea type="text" class="form-control" name="balanceItem"
                                              > {{ old('balanceItem') }}</textarea>

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.days')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="days"
                                           value="{{ old('days') }}">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.Notes')

                                </label>
                                <div class="col-md-9">

                                    <textarea type="text" class="form-control" name="notes"
                                           > {{ old('notes') }}</textarea>

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




