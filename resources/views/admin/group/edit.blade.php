@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET -->
    <div class="portlet box  green ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-pencil"></i> @lang('admin.Edit item')</div>
            <div class="tools"></div>
        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\UsergroupsController@update' ,  $editData->id) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-body">

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

                    <hr/>

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
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-4 col-md-8">
                            <button type="submit" class="btn green">@lang('admin.Save') </button>
                            <button type="button" class="btn default"
                                    onclick="window.history.back()">@lang('admin.Cancel')</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END SAMPLE FORM PORTLET-->

@endsection




