@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Projects') </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">@lang('admin.Show Data') </a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('admin.Projects')
                        </li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <div class="heading-elements">

                </div>


            </div>
        </div>
    </div>

    <section class="grid-with-inline-labels" id="grid-with-inline-labels">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">@lang('admin.Search') </h4>
                        <a class="heading-elements-toggle"><i class="ft-align-justify font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post"
                                  action="{{ action('Admin\ProjectController@search') }}">
                                {{ csrf_field() }}

                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4">@lang('admin.projectNo')  </label>
                                                    <div class="col-md-8">

                                                        <select name="projectNo" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            @foreach($allData as $data)
                                                                <option value="{{ $data->projectNo }}">  {{ $data->projectNo }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4"> @lang('admin.Beneficiaries') </label>
                                                    <div class="col-md-8">
                                                        <select name="beneficiaries" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            @foreach($allBeneficiaries as $beni)
                                                                <option value="{{ $beni->id }}">  {{ $beni->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4">@lang('admin.Site Name')  </label>
                                                    <div class="col-md-8">

                                                        <select name="projectSite" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            @foreach($allSite as $data)
                                                                <option value="{{ $data->name }}">  {{ $data->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4"> @lang('admin.Contractor') </label>
                                                    <div class="col-md-8">
                                                        <select name="contractorName" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            @foreach($allContracto as $beni)
                                                                <option value="{{ $beni->id }}">  {{ $beni->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4">@lang('admin.Done')  </label>
                                                    <div class="col-md-8">

                                                        <select name="done" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            <option value="1"> @lang('admin.Yes') </option>
                                                            <option value="2"> @lang('admin.No') </option>

                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <label class="col-md-4"> @lang('admin.Categories') </label>
                                                    <div class="col-md-8">
                                                        <select name="projectCategory" class="select2  form-control">
                                                            <option> @lang('admin.Choose') </option>
                                                            @foreach($allCat as $cat)
                                                                <option value="{{ $cat->id }}">  {{ $cat->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">@lang('admin.Search')
                                            <i class="ft-search  position-right"></i></button>
                                        <button type="reset" class="btn btn-warning">@lang('admin.Reset')
                                            <i class="ft-refresh-cw position-right"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="content-body">
        <section id="initialization">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <table class="table table-striped table-bordered dataex-key-basic">
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th> @lang('admin.projectNo')  </th>
                                        <th> @lang('admin.Name')  </th>

                                        <th> @lang('admin.Action') </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $data)
                                        <tr class="odd gradeX">
                                            <td>
                                                #
                                            </td>
                                            <td> {{ $data->projectNo }} </td>
                                            <td> {{ $data->projectName }} </td>

                                            <td>
                                                <a href="{{ action('Admin\ProjectController@edit' ,  $data->id) }}"
                                                   class="btn sbold blue ">
                                                    <i class="ft-edit"></i> </a>

                                            </td>


                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET-->
                    </div>


                </div>
            </div>
        </section>
    </div>





@endsection




