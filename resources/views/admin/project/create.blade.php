@extends('layouts.app')
@section('content')

    <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Projects') </h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                </li>
                <li class="breadcrumb-item"><a href="#">@lang('admin.Projects')</a>
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
                  action="{{ action('Admin\ProjectController@store') }}">
                {{ csrf_field() }}
                <div class="form-body">

                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Add new item')</h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    @foreach($catKeys as $key)
                        <div class="form-group">
                            <label class="col-md-3 control-label"> {{ $key->name }}    </label>
                            <div class="col-md-9">
                                @if($key->type == 'text')
                                    <input type="text" class="form-control" name="{{ $key->fieldName }}">
                                @elseif($key->type == 'date')

                                    <input type='text' name="{{$key->fieldName}}" class="form-control pickadate"
                                           placeholder="Basic Pick-a-date"/>


                                @elseif($key->type == 'itr')

                                    <div class="input-group">
                                        <input type="text" class="form-control " name="{{ $key->fieldName }}[]"  >
                                        <div class="input-group-append">
                                            <button class="btn btn-primary addItem" data-itr="{{ $key->id }}"
                                                    data-name="{{ $key->fieldName }}"    type="button"> @lang('admin.Add new item')</button>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                    <table class="table table-striped">
                                        <tbody class="itemContiner{{ $key->id }}">

                                        </tbody>
                                    </table>
                                    </div>




                                @elseif($key->fieldName  == 'projectCategory')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">لا يوجد</option>
                                        @foreach($projectCategory as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>


                                @elseif($key->fieldName  == 'projectSite')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">لا يوجد</option>
                                        @foreach($Site as $data)
                                            <option value="{{ $data->name }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>


                                @elseif($key->fieldName  == 'supervisors')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">لا يوجد</option>
                                        @foreach($Supervisors as $data)
                                            <option value="{{ $data->name }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>

                                @elseif($key->fieldName  == 'beneficiaries')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">لا يوجد</option>
                                        @foreach($Beneficiaries as $data)
                                            <option value="{{ $data->name }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>





                                @endif

                            </div>
                        </div>
                    @endforeach




                    <section id="basic-tabs-components">
                        <div class="row match-height">

                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">ملحقات المشروع  </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            </p>
                                            <ul class="nav nav-tabs nav-topline">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="base-tab21" data-toggle="tab" aria-controls="tab21"
                                                       href="#tab21" aria-expanded="true"> اوراق المشروع الرسميه</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab22" data-toggle="tab" aria-controls="tab22" href="#tab22"
                                                       aria-expanded="false">الخرائط والمخططات</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab23" data-toggle="tab" aria-controls="tab23" href="#tab23"
                                                       aria-expanded="false"> وصف العمل</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link ">الملفات الخاصه بالكهرباء</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">
                                                <div role="tabpanel" class="tab-pane active" id="tab21" aria-expanded="true" aria-labelledby="base-tab21">
                                                    <p>Oat cake marzipan cake lollipop caramels wafer pie jelly
                                                        beans. Icing halvah chocolate cake carrot cake. Jelly beans
                                                        carrot cake marshmallow gingerbread chocolate cake. Gummies
                                                        cupcake croissant.</p>
                                                </div>
                                                <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">
                                                    <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
                                                        pastry cotton candy oat cake fruitcake jelly chupa chups.
                                                        Pudding caramels pastry powder cake soufflé wafer caramels.
                                                        Jelly-o pie cupcake.</p>
                                                </div>
                                                <div class="tab-pane" id="tab23" aria-labelledby="base-tab23">
                                                    <p>Biscuit ice cream halvah candy canes bear claw ice cream
                                                        cake chocolate bar donut. Toffee cotton candy liquorice.
                                                        Oat cake lemon drops gingerbread dessert caramels. Sweet
                                                        dessert jujubes powder sweet sesame snaps.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </section>









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




