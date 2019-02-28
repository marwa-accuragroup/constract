@extends('layouts.app')
@section('content')
    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">
    <div class="card-body">
        <form class="form" role="form" method="post" enctype="multipart/form-data"
              action="{{ action('Admin\MenuController@update' ,  $lang->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-body">
                <h4 class="form-section"><i class="la la-edit"></i>   @lang('admin.Edit item')</h4>


                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">  القائمه الرئيسيه </label>
                    <div class="col-md-9">
                        <select name="parentId" class="form-control select2">
                            <option value="0" >لا يوجد</option>
                            @foreach($all as $data)
                                <option value="{{ $data->id }}" @if($data->id == $lang->parentId) selected @endif>  {{ $data->name_ar }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">الاسم (Ar)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_ar" value="{{ $lang->name_ar }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">الاسم (En)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_en" value="{{ $lang->name_en }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">الرابط</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="link" value="{{ $lang->link }}"> </div>
                </div>

                <!--div class="form-group">
                    <label class="col-md-3 control-label">الرابط المختصر</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="shortLink" value="{{ $lang->shortLink }}"> </div>
                </div-->

                <div class="form-group">
                    <label class="col-md-3 control-label">الايقونه</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="icon" value="{{ $lang->icon }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label"> Roles</label>
                    <div class="col-md-9">

                        <select name="roles[]" class="select2 form-control" multiple="multiple">
                            <option value="0" >لا يوجد</option>
                            @foreach($allRole as $data)
                                <option value="{{ $data->name }}">  {{ $data->display_name }}</option>
                            @endforeach

                        </select>

                    </div>
                </div>




            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit" class="btn green">حفظ </button>
                        <button type="button" class="btn default" onclick="window.history.back()">الغاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




