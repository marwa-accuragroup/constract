@extends('layouts.app')
@section('content')



    <!--div class="row">
    <div class="col-md-12">

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">  عرض البيانات </span>
                </div>

            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-10"> </div>
                        <div class="col-md-2">
                            <div class="btn-group">
                                <a href="{{ action('Admin\MenuController@create') }}" class="btn sbold green ">
                                    <i class="fa fa-plus"></i>  اضافه عنصر جديد </a>
                            </div>

                        </div>
                    </div>
                </div>


                        <ul>
                            @foreach($categories as $category)
        <li>
            <div style="margin: 40px;">
                <div style="float: left;">  <a href="{{ action('Admin\MenuController@delmenu' , $category->id) }}" class="btn sbold red ">
                                                <i class="fa fa-times"></i> </a></div>
                                        <div style="float: left;">  <a href="{{ action('Admin\MenuController@edit' ,  $category->id) }}" class="btn sbold blue ">
                                                <i class="fa fa-pencil"></i> </a></div>


                                    {{ $category->name_ar }}
        @if(count($category->childs))
            @include('admin.menu.manageChild',['childs' => $category->childs])
        @endif



                </div>
            </li>
@endforeach
            </ul>


</div>
</div>
</div>


</div>
</div>

</div>
</div-->
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Menus </h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Menu</a>
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
                    <a href="{{ action('Admin\MenuController@create') }}" class="btn btn-primary box-shadow-1  btn-min-width ml-1 mr-1">
                        @lang('admin.Add new item')
                    </a>
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

                                <table class="table table-striped table-bordered dom-jQuery-events">
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th> @lang('admin.Name')  </th>
                                        <th> @lang('admin.Edit') </th>
                                        <th> @lang('admin.Delete') </th>
                                    </tr>
                                    </thead>


                                    <tbody>

                                    @foreach($categories as $data)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ $data->name_ar }} </td>
                                            <td><a href="{{ action('Admin\MenuController@edit' ,  $data->id) }}"
                                                   class="btn btn-icon btn-pure info"><i class="ft-edit"></i></a>
                                            </td>
                                            <td><a href="{{ action('Admin\MenuController@delmenu' , $data->id) }}"
                                                   class="btn btn-icon btn-pure info"><i class="ft-trash-2"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>



@endsection




