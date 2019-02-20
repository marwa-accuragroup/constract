@extends('layouts.app')
@section('content')

    <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.ProjectElectrical') </h3>
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                </li>
                <li class="breadcrumb-item"><a href="#">@lang('admin.ProjectElectrical')</a>
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
            <form class="form" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\ProjectElectricalController@update' ,  $editData->id ) }}">
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
                        <label class="col-md-3 control-label">@lang('admin.Projects')</label>
                        <div class="col-md-9">
                            <select name="projectId" class="form-control ">
                                <option value="0">@lang('admin.Choose')  </option>
                                @foreach($allProject as $data)
                                    <option value="{{ $data->id }}" @if($editData->projectId == $data->id) selected @endif>  {{ $data->projectName }}</option>
                                @endforeach

                            </select></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">@lang('admin.Beneficiaries')</label>
                        <div class="col-md-9">
                            <select name="beneficiaries" class="form-control ">
                                <option value="0">@lang('admin.Choose')  </option>
                                @foreach($allBeneficiaries as $data)
                                    <option value="{{ $data->id }}" @if($editData->beneficiaries == $data->id) selected @endif>  {{ $data->name }}</option>
                                @endforeach

                            </select></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label"> {{ $allWords[26]['name_'.App::getLocale()] }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="buildingNumber"
                                   value="{{ $editData->buildingNumber }}"></div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label"> {{ $allWords[27]['name_'.App::getLocale()] }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="electricityNumber"
                                   value="{{ $editData->electricityNumber }}"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ $allWords[28]['name_'.App::getLocale()] }}</label>
                        <div class="col-md-8">
                            <input type="radio"   value="1" name="currentStatusOfConnectionCharges"
                             @if($editData->currentStatusOfConnectionCharges == 1) checked @endif>
                            @lang('admin.Yes')

                            <input type="radio"   value="2" name="currentStatusOfConnectionCharges"
                                   @if($editData->currentStatusOfConnectionCharges == 2) checked @endif>
                            @lang('admin.No')
                        </div>
                    </div>


                    <div id="currentDiv">

                        <table>
                            <tr>
                                <th width="60%"></th>
                                <th width="20%"></th>
                                <th width="20%"></th>
                            </tr>
                            <tr>
                                <th>{{ $allWords[29]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1"
                                               name="waterElectric" @if($editData->waterElectric == 1) checked @endif>
                                        @lang('admin.Yes')

                                        <input type="radio"  value="2"
                                               name="waterElectric" @if($editData->waterElectric == 2) checked @endif>
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="waterElectricImg"></th>
                            </tr>

                            <tr>
                                <th>{{ $allWords[30]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1"
                                               name="financial" @if($editData->financial == 1) checked @endif>
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2"
                                               name="financial" @if($editData->financial == 2) checked @endif>
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="financialImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[31]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1"
                                               name="minister" @if($editData->minister == 1) checked @endif>
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2"
                                               name="minister" @if($editData->minister == 2) checked @endif>
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="ministerImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[32]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1"
                                               name="letter" @if($editData->letter == 1) checked @endif>
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2"
                                               name="letter" @if($editData->letter == 2) checked @endif>
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="letterImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[33]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1"
                                               name="connectPower" @if($editData->connectPower == 1) checked @endif>
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2"
                                               name="connectPower" @if($editData->connectPower == 2) checked @endif>
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th></th>
                            </tr>


                            <tr>
                                <th>@lang('admin.Notes')
                                    <div class="input-group-append">
                                        <button class="btn btn-primary addItem" data-itr="notes"
                                                data-name="notes"
                                                type="button"> @lang('admin.Add new item')</button>
                                    </div>
                                </th>
                                <th colspan="2">

                                    <table class="table table-striped">
                                        <tbody class="itemContinernotes">
                                        @foreach($notes as $note)
                                            <tr>
                                                <td colspan="2">{{ $note }}</td>
                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </th>

                            </tr>


                        </table>


                    </div>




                    <div class="form-group">
                        <label class="col-md-4 control-label">{{ $allWords[34]['name_'.App::getLocale()] }}</label>
                        <div class="col-md-8">
                            <input type="radio" class="currentClass2" value="1" name="currentStatusMaterials"
                                   @if($editData->currentStatusMaterials == 1) checked @endif>
                            @lang('admin.Yes')

                            <input type="radio" class="currentClass2" value="2" name="currentStatusMaterials"
                                   @if($editData->currentStatusMaterials == 2) checked @endif>
                            @lang('admin.No')
                        </div>
                    </div>


                    <div id="currentDiv2" >

                        <table>
                            <tr>
                                <th width="60%"></th>
                                <th width="20%"></th>
                                <th width="20%"></th>
                            </tr>
                            <tr>
                                <th>{{ $allWords[29]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1" @if($editData->waterElectricMaterials == 1) checked @endif
                                               name="waterElectricMaterials">
                                        @lang('admin.Yes')

                                        <input type="radio" class=waterElectric value="2" @if($editData->waterElectricMaterials == 2) checked @endif
                                               name="waterElectricMaterials">
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="waterElectricMaterialsImg"></th>
                            </tr>

                            <tr>
                                <th>{{ $allWords[30]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1" @if($editData->financialMaterials == 1) checked @endif
                                               name="financialMaterials">
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2" @if($editData->financialMaterials == 2) checked @endif
                                               name="financialMaterials">
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="financiaMaterialslImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[31]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1" @if($editData->ministerMaterials == 1) checked @endif
                                               name="ministerMaterials">
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2" @if($editData->ministerMaterials == 2) checked @endif
                                               name="ministerMaterials">
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="ministerMaterialsImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[32]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1" @if($editData->letterMaterials == 1) checked @endif
                                               name="letterMaterials">
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2" @if($editData->letterMaterials == 2) checked @endif
                                               name="letterMaterials">
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th><input type="file" name="letterMaterialsImg"></th>
                            </tr>


                            <tr>
                                <th>{{ $allWords[36]['name_'.App::getLocale()] }}</th>
                                <th>
                                    <div class="col-md-8">
                                        <input type="radio"   value="1" @if($editData->materialsToContractor == 1) checked @endif
                                               name="materialsToContractor">
                                        @lang('admin.Yes')

                                        <input type="radio"   value="2" @if($editData->materialsToContractor == 2) checked @endif
                                               name="materialsToContractor">
                                        @lang('admin.No')
                                    </div>
                                </th>
                                <th></th>
                            </tr>


                            <tr>
                                <th>@lang('admin.Notes')
                                    <div class="input-group-append">
                                        <button class="btn btn-primary addItem" data-itr="notesMaterials"
                                                data-name="notesMaterials"
                                                type="button"> @lang('admin.Add new item')</button>
                                    </div>
                                </th>
                                <th colspan="2">

                                    <table class="table table-striped">
                                        <tbody class="itemContinernotesMaterials">
                                        @foreach($notesM as $note)
                                            <tr>
                                                <td colspan="2">{{ $note }}</td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </th>

                            </tr>


                        </table>


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




