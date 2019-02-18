@extends('layouts.app')
@section('content')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Finished Projects') </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">@lang('admin.Show Data') </a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('admin.Finished Projects')
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
                                        <th> @lang('admin.contractorName')  </th>
                                        <th> @lang('admin.finalValue')  </th>
                                        <th> @lang('admin.endDate')  </th>
                                        <th> @lang('admin.beneficiaries')  </th>
                                        <th> @lang('admin.Details') </th>

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
                                            <td> {{ $data->contractorName }} </td>
                                            <td> {{ $data->finalValue }} </td>
                                            <td> {{ $data->endDate }} </td>
                                            <td> {{ $data->Beneficiaries }} </td>
                                            <td>
                                                <a href="#"
                                                   class="btn sbold blue ">
                                                    <i class="ft-eye"></i> </a>
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



