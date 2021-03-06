@extends('layouts.app')
@section('content')

    <h3 class="content-header-title mb-0 d-inline-block">Project Cat </h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                </li>
                <li class="breadcrumb-item"><a href="#">Project Cat</a>
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
                  role="form" enctype="multipart/form-data" method="post"
                  action="{{ action('Admin\ProjectCatController@store') }}">
                {{ csrf_field() }}
                <div class="form-body">

                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Add new item')</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Cat Name </label>
                        <div class="col-md-9">


                            <select name="catId" class="form-control ">
                                <option value="0">لا يوجد</option>
                                @foreach($allCat as $cat)
                                    <option value="{{ $cat->id }}">  {{ $cat->name }}</option>
                                @endforeach

                            </select>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">Keys </label>
                        <div class="col-md-9">


                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <i class="fa fa-language"></i> @lang('admin.Word')
                                    </th>
                                    <th class="hidden-xs">
                                        <i class="fa fa-language"></i> Type
                                    </th>


                                </tr>
                                </thead>
                                <tbody>


                                @foreach($allKeys as $data)


                                    <tr>

                                        <td><input type="checkbox" value="{{ $data->wordKey }}" name="keys[]"></td>
                                        <td> {{ $data->wordKey }}</td>
                                        <td>
                                            <select name="type[]" class="form-control ">
                                                <option value="text">Text</option>
                                                <option value="date">Date</option>
                                                <option value="dropDown">DropDown</option>
                                                <option value="radio">Radio</option>
                                                <option value="itr">itr</option>
                                            </select>
                                        </td>

                                    </tr>


                                @endforeach


                                </tbody>
                            </table>


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




