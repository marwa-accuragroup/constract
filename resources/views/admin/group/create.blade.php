@extends('layouts.app')
@section('content')

    <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.User groups') </h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                </li>
                <li class="breadcrumb-item"><a href="#">@lang('admin.User groups')</a>
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
                  action="{{ action('Admin\UsergroupsController@store') }}">
                {{ csrf_field() }}
                <div class="form-body">

                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Add new item')</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Name') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name"
                                   value="{{ old('name') }}"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Permission') </label>
                        <div class="col-md-9">


                            <div class="mt-checkbox-list">
                                <ul class="nested" id="nested">
                                    @foreach($allMenu as $menu)

                                        <li><input type="checkbox" name="menu[]"
                                                   value="{{  $menu->id }}"> {{ $menu->name_ar  }}


                                        <!--ul>
                                                <li><input type="checkbox" name="permission_{{  $menu->id }}[]"
                                                           value="index"> عرض الكل
                                                </li>

                                                <li><input type="checkbox" name="permission_{{  $menu->id }}[]"
                                                           value="store"> اضافه
                                                </li>

                                                <li><input type="checkbox" name="permission_{{  $menu->id }}[]"
                                                           value="show"> عرض العنصر
                                                </li>


                                                <li><input type="checkbox" name="permission_{{  $menu->id }}[]"
                                                           value="update"> تعديل
                                                </li>

                                                <li><input type="checkbox" name="permission_{{  $menu->id }}[]"
                                                           value="destroy"> حذف
                                                </li>
                                            </ul-->


                                        </li>




                                    @endforeach
                                </ul>
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
    <!-- END SAMPLE FORM PORTLET-->

@endsection




