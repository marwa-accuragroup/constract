@extends('layouts.app')
@section('content')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Beneficiaries') </h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.Beneficiaries')</a>
                    </li>
                    <li class="breadcrumb-item active"> @lang('admin.Edit item')
                    </li>
                </ol>
            </div>
        </div>
    </div>


    <section id="tabs-with-icons">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger"> {{ $error }}</div>
                                @endforeach
                            </ul>


                            <ul class="nav nav-tabs">

                                <!-----Tab Ul-------------------------------------------->
                                @foreach($allLang as $sub)
                                    <li class="nav-item">
                                        <a class="nav-link @if($sub->symbol == 'ar') active @endif" id="baseIcon-tab1"
                                           data-toggle="tab"
                                           aria-controls="tabIcon1"
                                           href="#tabIcon1_{{ $sub->symbol }}"
                                           aria-expanded="true"><i class="flag-icon flag-icon-{{ $sub->symbol }}">

                                            </i>{{$sub->name}}</a>
                                    </li>
                                @endforeach


                            </ul>
                            <div class="tab-content px-1 pt-1">
                                <form class="form" role="form" enctype="multipart/form-data" method="post"
                                      action="{{ action('Admin\BeneficiariesController@update' , $editData->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    @foreach($allLang as $data)
                                        <div role="tabpanel" class="tab-pane " id="tabIcon1_{{ $data->symbol }}"
                                             aria-expanded="true" aria-labelledby="baseIcon-tab1">

                                            <!---===========================Tab Body===========================--->
                                            <div class="form-group last">
                                                <label class="control-label col-md-3">  @lang('admin.Name')

                                                </label>
                                                <div class="col-md-9">

                                                    <input type="text" class="form-control"
                                                           name="name_{{$data->symbol}}"
                                                           value="{{ $nameArr['ar'] }}">

                                                </div>
                                            </div>


                                            <div class="form-group last">
                                                <label class="control-label col-md-3">  @lang('admin.Notes')

                                                </label>
                                                <div class="col-md-9">

                                            <textarea type="text" class="form-control" name="notes_{{$data->symbol}}" >
                                                {{ $notesArr['ar'] }}</textarea>


                                                </div>
                                            </div>


                                            <div class="form-actions text-center">
                                                <button type="submit"
                                                        class="btn btn-primary btn-min-width box-shadow-1 ml-1">
                                                    <i class="la la-check-square-o"></i>
                                                    @lang('admin.Save') </button>
                                                <a onclick="window.history.back()"
                                                   class="btn btn-warning btn-min-width box-shadow-1 mr-1"> <i
                                                            class="ft-x"></i>
                                                    @lang('admin.Cancel')
                                                </a></div>


                                        </div>
                                    @endforeach
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection




