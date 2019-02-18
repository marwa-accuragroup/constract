@extends('layouts.app')
@section('content')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Setting')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.Setting')</a>
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
            <form class="form" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\SettingController@update' ,$setting->id ) }}">
                {{ csrf_field() }}

                <div class="form-body">
                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>

                    <input type="hidden" name="oldImage" value="{{ $setting->logo }}">
                    <div class="form-group ">
                        <label class="control-label col-md-3">   @lang('admin.Logo')</label>
                        <div class="col-md-9">
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                     style="width: 200px; height: 150px;">

                                    <img src="{{ URL ::to ('public/images/'.$setting->logo)}}"/>
                                </div>
                                <div>
                                    <input type="file" name="imageName">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">  @lang('admin.Site Name')  </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="siteName" value="{{ $setting->siteName }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Phone') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Email')</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" value="{{ $setting->email }}"></div>
                    </div>


                    <!--div class="form-group">
                        <label class="col-md-3 control-label"> @lang('admin.Address')  </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="address" value="{{ $setting->address }}">
                        </div>
                    </div>


                    <hr/>

                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Social media setting')
                            <br/>
                            <button type="button" id="addSocial" class="btn blue"> @lang('admin.Add new item') </button>
                            <input type="hidden" id="socialCount" value="1">

                        </label>
                        <div class="col-md-9">
                            <table class="table table-bordered table-hover">

                                <th>@lang('admin.Name') </th>
                                <th>@lang('admin.Icon')</th>
                                <th>@lang('admin.Link')</th>
                                <th></th>

                                <tbody id="productContiner">
                                @foreach($social as $data)
                                <tr>
                                    <input type="hidden"  name="id[]" value="{{$data->id}}">
                                    <td><input type="text" class="form-control" name="name[]" value="{{$data->name}}"></td>
                                    <td><input type="text" class="form-control iconClass" name="icon[]" value="{{$data->icon}}"></td>
                                    <td><input type="text" class="form-control" name="link[]" value="{{$data->link}}"></td>

                                    <td><a class="btn default removeItemEdit" data-id="{{$data->id}}"
                                           data-url="{{ action('Admin\SettingController@delItem') }}" data-tableName="socials">
                                            <i class="fa fa-times"></i> </a></td>
                                </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div-->


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




