@extends('layouts.app')
@section('content')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.User groups') </h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.User groups')</a>
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
                  action="{{ action('Admin\UsergroupsController@update' ,  $editData->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Role Name') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="mainName"
                                   value="{{ $editData->name }}"></div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Name') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ $editData->display_name }}"></div>
                    </div>



                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Descreption') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="description"
                                   value="{{ $editData->description }}"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">القوائم </label>
                        <div class="col-md-9">


                            <div class="mt-checkbox-list">
                                <ul class="" id="nested">
                                    <?php  $categories = \App\Menu::where([ 'parentId' => 0 ])->get(); ?>
                                    @foreach($categories as $category)
                                        <li class=" nav-item {{ Request::is($category->link.'*') ? 'active' : '' }}">

                                            <div style="float: left">
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" data-itr="{{$category->id}}"
                                                           class="radioMenu custom-control-input"
                                                           name="menu_{{$category->id}}" id="menu_{{$category->id}}" value="1">
                                                    <label class="custom-control-label" for="radio1">نعم  </label>
                                                </div>
                                                <div class="d-inline-block custom-control custom-radio mr-1">
                                                    <input type="radio" class="radioMenu custom-control-input"
                                                           name="menu_{{$category->id}}" id="menu_{{$category->id}}" value="0">
                                                    <label class="custom-control-label" for="radio2" checked="">لا  </label>
                                                </div>
                                            </div>



                                            <a href="#">
                                                <i class="{{ $category->icon }}"></i>
                                                <span class="menu-title" data-i18n="nav.dash.main">
                            {{ $category['name_'.App::getLocale()] }} </span>
                                            </a>
                                            @if(count($category->childs))
                                                @include('admin.group.manageChild',['childs' => $category->childs])
                                            @endif
                                        </li>
                                    @endforeach



                                </ul>
                            </div>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Categories') </label>
                        <div class="col-md-9">


                            <div class="mt-checkbox-list">
                                <ul class="nested" id="nested">
                                    @foreach($projectCat as $data)

                                        <li><input type="checkbox" name="cat[]"
                                                   value="{{  $data->id }}"
                                                   @if($catMenu->contains('catId', $data->id )) checked="checked" @endif > {{ $data->name  }} </li>
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




