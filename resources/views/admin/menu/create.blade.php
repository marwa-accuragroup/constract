@extends('layouts.app')
@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="card ">

    <div class="card-body">
        <form class="form"
              role="form" enctype="multipart/form-data" method="post" action="{{ action('Admin\MenuController@store') }}">
            {{ csrf_field() }}
            <div class="form-body">

                <h4 class="form-section"><i class="la la-plus-circle"></i>   @lang('admin.Add new item')</h4>


                <ul>
                    @foreach ($errors->all() as $error)
                         <div class="alert alert-danger"> {{ $error }}</div>
                    @endforeach
                </ul>


                <div class="form-group">
                    <label class="col-md-3 control-label">  القائمه الرئيسيه </label>
                    <div class="col-md-9">
                        <select name="parentId" class="form-control ">
                            <option value="0" >لا يوجد</option>
                            @foreach($all as $data)
                                <option value="{{ $data->id }}">  {{ $data->name_ar }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">الاسم(Ar)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_ar"   value="{{ old('name_ar') }}"> </div>
                </div>



                <div class="form-group">
                    <label class="col-md-3 control-label">الاسم(En)</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="name_en"   value="{{ old('name_en') }}"> </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">الرابط</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="link" value="{{ old('link') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">الرابط المختصر</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="shortLink" value="{{ old('shortLink') }}"> </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">الايقونه</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="icon" value="{{ old('icon') }}"> </div>
                </div>






            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-4 col-md-8">
                        <button type="submit" class="btn green">حفظ </button>
                        <button type="reset" class="btn default" onclick="window.history.back()">الغاء</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- END SAMPLE FORM PORTLET-->

@endsection




