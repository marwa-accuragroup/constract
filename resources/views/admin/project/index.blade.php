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
                    <a href="{{ action('Admin\ProjectController@show' , $catId) }}"
                       class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">
                        @lang('admin.Add new item')
                    </a>
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
                                        @if(Auth::user()->id == 1)
                                        <th> @lang('admin.MoveProject')  </th>
                                        @endif
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

                                            @if(Auth::user()->id == 1)
                                            <td>
                                                <button type="button" class="btn btn-warning btn-min-width mr-1 mb-1 moveProject"
                                                        data-toggle="modal" data-target="#exampleModal_{{ $data->id }}">
                                                    <i class="icon-cursor-move"></i></button>



                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">@lang('admin.MoveProject')</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form class="form"
                                                                  role="form" enctype="multipart/form-data" method="post"
                                                                  action="{{ action('Admin\ProjectController@updateProjectCat') }}">
                                                                {{ csrf_field() }}
                                                            <div class="modal-body">

                                                                <input type="hidden" name="projectId" value="{{ $data->id }}">
                                                                <div class="form-group">
                                                                    <label class="col-md-5 control-label">  @lang('admin.Categories')   </label>
                                                                    <div class="col-md-7">
                                                                        <select name="projectCategory" class="form-control ">
                                                                            <option value="0">@lang('admin.Choose')  </option>
                                                                            @foreach($allCat as $sub)
                                                                                <option value="{{ $sub->id }}">  {{ $sub->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary"> @lang('admin.Save')  </button>
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin.Cancel')</button>

                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                            @endif

                                            <td>
                                                <a href="{{ action('Admin\ProjectController@edit' ,  $data->id) }}"
                                                   class="btn sbold blue ">
                                                    <i class="ft-edit"></i> </a>


                                                @if(Auth::user()->id == 1)
                                                <a href="{{ action('Admin\ProjectController@delProject' , $data->id) }}" class="btn sbold red ">
                                                    <i class="ft-trash-2"></i> </a>
                                                    @endif

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




