@extends('layouts.app')
@section('content')


    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Translate') </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">@lang('admin.Translate')</a>
                        </li>
                        <li class="breadcrumb-item active"> @lang('admin.Show Data')
                        </li>
                    </ol>
                </div>
            </div>
        </div>


        <div class="content-header-right col-md-6 col-12">
            <div class="dropdown float-md-right">
                <div class="heading-elements">
                    <!--a href="{{ action('Admin\TranslateController@create') }}"
                       class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">
                        @lang('admin.Add new item')
                    </a-->
                </div>


            </div>
        </div>
    </div>
    <div class="content-body">


        <section id="dom">
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
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <!--th>
                                    <i class="fa fa-language"></i> @lang('admin.Word')
                                </th-->
                                <th class="hidden-xs">
                                    <i class="fa fa-language"></i>  @lang('admin.Arabic Translation')
                                </th>
                                <th>
                                    <i class="fa fa-language"></i>  @lang('admin.English Translation')
                                </th>

                            </tr>
                            </thead>
                            <tbody>


                            @foreach($allData as $data)
                                <form   role="form" method="post" enctype="multipart/form-data"
                                      action="{{ action('Admin\TranslateController@update' ,$data->id ) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}

                            <tr>
                                <input type="hidden" value="{{$data->id}}" name="id[]"/>
                                <!--td> {{ $data->wordKey }}</td-->
                                <td> <input type="text" class="form-control" name="name_ar[]" value="{{$data->name_ar}}"> </td>
                                <td> <input type="text" class="form-control" name="name_en[]" value="{{$data->name_en}}"></td>
                            </tr>


                                @endforeach


                            </tbody>
                        </table>
                    </div>



                            <div class="form-actions text-center">
                                <button type="submit" class="btn btn-primary btn-min-width box-shadow-1 ml-1">
                                    <i class="la la-check-square-o"></i>
                                    @lang('admin.Save Changes') </button>
                               </div>



                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>


    </div>
        </section>
    </div>




@endsection




