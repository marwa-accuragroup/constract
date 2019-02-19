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


                    <input type="hidden" class="form-control" name="projectCategory" value="{{ $catId }}">
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
                                        <input type="text" class="form-control " name="{{ $key->fieldName }}[]">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary addItem" data-itr="{{ $key->id }}"
                                                    data-name="{{ $key->fieldName }}"
                                                    type="button"> @lang('admin.Add new item')</button>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <table class="table table-striped">
                                            <tbody class="itemContiner{{ $key->id }}">

                                            </tbody>
                                        </table>
                                    </div>


                                @elseif($key->type  == 'radio')




                                    <div class="card-body">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input" value="1"
                                                   name="{{ $key->fieldName }}" id="radio1">
                                            <label class="custom-control-label" for="radio1">@lang('admin.Yes')</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input" value="2"
                                                   name="{{ $key->fieldName }}" id="radio2">
                                            <label class="custom-control-label" for="radio2"
                                                   checked="">@lang('admin.No')</label>
                                        </div>

                                    </div>


                                @elseif($key->fieldName  == 'contractorName')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Contractor as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>



                                @elseif($key->fieldName  == 'projectSite')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Site as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>


                                @elseif($key->fieldName  == 'supervisors')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Supervisors as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>

                                @elseif($key->fieldName  == 'beneficiaries')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Beneficiaries as $data)
                                            <option value="{{ $data->id }}">  {{ $data->name }}</option>
                                        @endforeach

                                    </select>





                                @endif

                            </div>
                        </div>
                    @endforeach


                    <hr/>
                    <section id="basic-tabs-components">
                        <div class="row match-height">

                            <div class="col-xl-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"> @lang('admin.Project extensions')  </h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">

                                            </p>
                                            <ul class="nav nav-tabs nav-topline">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="base-tab21" data-toggle="tab"
                                                       aria-controls="tab21"
                                                       href="#tab21"
                                                       aria-expanded="true"> @lang('admin.Official project papers')</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab22" data-toggle="tab"
                                                       aria-controls="tab22" href="#tab22"
                                                       aria-expanded="false"> @lang('admin.Maps and charts')</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab23" data-toggle="tab"
                                                       aria-controls="tab23" href="#tab23"
                                                       aria-expanded="false">  @lang('admin.Scope of work')</a>
                                                </li>
                                                <!--li class="nav-item">
                                                    <a class="nav-link" id="base-tab23" data-toggle="tab"
                                                       aria-controls="tab24" href="#tab24"
                                                       aria-expanded="false">  @lang('admin.Electrical files')</a>
                                                </li-->
                                            </ul>
                                            <div class="tab-content px-1 pt-1 border-grey border-lighten-2 border-0-top">


                                                <div role="tabpanel" class="tab-pane active" id="tab21"
                                                     aria-expanded="true" aria-labelledby="base-tab21">

                                                    <table>
                                                        <th>
                                                            <button class="btn btn-primary addImg" data-name="paper"
                                                                    type="button"> @lang('admin.Add new item')</button>
                                                        </th>
                                                        <th></th>
                                                        <tbody id="imgContiner_paper">
                                                        <tr>
                                                            <td><input type="file" name="paper[]"></td>
                                                            <td><a class="btn sbold red  removeItem"> <i
                                                                            class="ft-trash-2"></i></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                </div>


                                                <div class="tab-pane" id="tab22" aria-labelledby="base-tab22">


                                                    <table>
                                                        <th>
                                                            <button class="btn btn-primary addImg" data-name="map"
                                                                    type="button"> @lang('admin.Add new item')</button>
                                                        </th>
                                                        <th></th>
                                                        <tbody id="imgContiner_map">
                                                        <tr>
                                                            <td><input type="file" name="map[]"></td>
                                                            <td><a class="btn sbold red  removeItem"> <i
                                                                            class="ft-trash-2"></i></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="tab-pane" id="tab23" aria-labelledby="base-tab23">

                                                    <table>
                                                        <th>
                                                            <button class="btn btn-primary addImg" data-name="work"
                                                                    type="button"> @lang('admin.Add new item')</button>
                                                        </th>
                                                        <th></th>
                                                        <tbody id="imgContiner_work">
                                                        <tr>
                                                            <td><input type="file" name="work[]"></td>
                                                            <td><a class="btn sbold red  removeItem"> <i
                                                                            class="ft-trash-2"></i></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                </div>
                                                <div class="tab-pane" id="tab24" aria-labelledby="base-tab24">


                                                    <table>
                                                        <th>
                                                            <button class="btn btn-primary addImg" data-name="electric"
                                                                    type="button"> @lang('admin.Add new item')</button>
                                                        </th>
                                                        <th></th>
                                                        <tbody id="imgContiner_electric">
                                                        <tr>
                                                            <td><input type="file" name="electric[]"></td>
                                                            <td><a class="btn sbold red  removeItem"> <i
                                                                            class="ft-trash-2"></i></a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


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




