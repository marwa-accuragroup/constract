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
                        <label class="col-md-3 control-label">@lang('admin.Name') </label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="name" value="{{ $editData->name }}"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Permission')</label>
                        <div class="col-md-9">

                            <ul class="nested" id="nested">
                                @foreach($allMenu as $menu)


                                    <li><input type="checkbox" name="menu[]" value="{{  $menu->id }}"
                                               @if($groupMenu->contains('menuId', $menu->id )) checked="checked" @endif > {{ $menu->name_ar  }}


                                    <?php  $sub = App\UserController::where(['menuId' => $menu->id, 'groupId' => $editData->id])->get();?>



                                    <!--ul >
                                       <li> <input  type="checkbox"  @if($sub->contains('name', 'index' )) checked="checked" @endif
                                            name="permission_{{  $menu->id }}[]"  value="index"> عرض الكل  </li>
                                                        
                                       <li> <input  type="checkbox"  @if($sub->contains('name', 'store' )) checked="checked" @endif
                                            name="permission_{{  $menu->id }}[]" value="store"> اضافه </li>
                                       
                                        <li> <input type="checkbox"  @if($sub->contains('name', 'show' )) checked="checked" @endif
                                            name="permission_{{  $menu->id }}[]" value="show" > عرض العنصر </li>
                                        
                                        
                                         <li> <input type="checkbox"  @if($sub->contains('name', 'update' )) checked="checked" @endif
                                            name="permission_{{  $menu->id }}[]" value="update" > تعديل </li>
                                         
                                          <li> <input type="checkbox"  @if($sub->contains('name', 'destroy' )) checked="checked" @endif
                                            name="permission_{{  $menu->id }}[]" value="destroy" > حذف  </li>
                                   </ul-->


                                    </li>




                                @endforeach

                            </ul>
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




