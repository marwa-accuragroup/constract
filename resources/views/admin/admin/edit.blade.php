@extends('layouts.app')
@section('content')

    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">

        <div class="card-body">
            <form class="form" role="form" method="post" enctype="multipart/form-data"
              action="{{ action('Admin\AdminController@update' ,  $editData->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">
                <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>

                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <!--div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Serial No') </label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="serialNo" readonly   value="{{ $editData->serialNo }}"> </div>
                </div-->



                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Name')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name"   value="{{ $editData->name }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Email')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="email" value="{{ $editData->email }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">@lang('admin.Phone')</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="phone" value="{{ $editData->phone }}"> </div>
                </div>



                <div class="form-group ">
                    <label class="control-label col-md-3"> @lang('admin.Password')</label>
                    <div class="col-md-9">
                        <input type="password" class="form-control" name="password" value="">

                        <input type="hidden" class="form-control" name="oldPassword" value="{{ $editData->password }}">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">  @lang('admin.Group name') </label>
                    <div class="col-md-9">
                        <select name="groupId" class="form-control select2">

                            @foreach($allGroup as $data)
                                <option value="{{ $data->id }}" @if($data->id == $editData->groupId) selected @endif>
                                    {{ $data->name }}</option>
                            @endforeach

                        </select>
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




