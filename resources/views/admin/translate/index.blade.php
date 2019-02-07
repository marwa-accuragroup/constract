@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">  @lang('admin.Show Data')  ---- @lang('admin.Project Number') </span>
                    </div>



                </div>
                <div class="portlet-body">


                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <i class="fa fa-language"></i> @lang('admin.Word')
                                </th>
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
                                <td> {{ $data->wordKey }}</td>
                                <td> <input type="text" class="form-control" name="name_ar[]" value="{{$data->name_ar}}"> </td>
                                <td> <input type="text" class="form-control" name="name_en[]" value="{{$data->name_en}}"></td>
                            </tr>


                                @endforeach


                            </tbody>
                        </table>
                    </div>


                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-8">
                                <button type="submit" class="btn green">@lang('admin.Save Changes')</button>

                            </div>
                        </div>
                    </div>


                    </form>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>


    </div>



@endsection




