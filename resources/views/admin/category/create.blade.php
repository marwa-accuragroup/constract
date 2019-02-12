@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">

        <div class="card-body">
            <form class="form" role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\CateoryController@store') }}">
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
                                <label class="control-label col-md-3">  @lang('admin.Name')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="name_ar"
                                           value="{{ old('name_ar') }}">

                                </div>
                            </div>


                            <div class="form-group last">
                                <label class="control-label col-md-3">  @lang('admin.Icon')

                                </label>
                                <div class="col-md-9">

                                    <input type="text" class="form-control" name="icon"
                                           value="{{ old('icon') }}">

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




