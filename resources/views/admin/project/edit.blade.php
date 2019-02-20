@extends('layouts.app')
@section('content')

    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">@lang('admin.Projects')</h3>
        <div class="row breadcrumbs-top d-inline-block">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL :: to ('/admin/home')}}">@lang('admin.Home') </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">@lang('admin.Projects')</a>
                    </li>
                    <li class="breadcrumb-item active"> @lang('admin.Edit item')
                    </li>
                </ol>
            </div>
        </div>
    </div>


    <!-- BEGIN SAMPLE FORM PORTLET-->
    <div class="card ">

        <div class="card-body">
            <form class="form" role="form" method="post" enctype="multipart/form-data"
                  action="{{ action('Admin\ProjectController@update' ,  $editData->id ) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-body">
                    <h4 class="form-section"><i class="la la-plus-circle"></i> @lang('admin.Edit item')</h4>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger"> {{ $error }}</div>
                        @endforeach
                    </ul>


                    <input type="hidden" class="form-control" name="projectCategory"
                           value="{{ $editData->projectCategory }}">
                    @foreach($catKeys as $key)
                        <div class="form-group">
                            <label class="col-md-3 control-label"> {{ $key->name }}    </label>
                            <div class="col-md-9">
                                @if($key->type == 'text')
                                    <input type="text" class="form-control" name="{{ $key->fieldName }}"
                                           value="{{ $editData[$key->fieldName] }}">
                                @elseif($key->type == 'date')

                                    <input type='text' name="{{$key->fieldName}}" class="form-control pickadate"
                                           placeholder="Basic Pick-a-date" value="{{ $editData[$key->fieldName] }}"/>


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

                                            <?php $id = $editData->id; $name = $key->fieldName;
                                            $itr = \App\ProjectDetails::where(['projectId' => $id, 'type' => $name])->get(); ?>

                                            @foreach($itr as $i)
                                                @if($i->value != '' || $i->value != NULL)
                                                    <tr>
                                                        <td>{{$i->value}}</td>

                                                        @if($i->userId == Auth::user()->id )
                                                            <td>
                                                                <a data-url="{{ action('Admin\SettingController@delItem') }}"
                                                                   data-id="{{$i->id}}" data-tableName="project_details"
                                                                   class="btn sbold red removeItemEdit">
                                                                    <i class="ft-trash-2"></i> </a>


                                                            </td>
                                                        @else
                                                            <td></td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach


                                            </tbody>
                                        </table>
                                    </div>









                                @elseif($key->type  == 'radio')
                                    <div class="card-body">
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input" value="1"
                                                   name="{{ $key->fieldName }}" id="radio1"
                                                   @if($editData[$key->fieldName] == 1) checked @endif>
                                            <label class="custom-control-label" for="radio1">@lang('admin.Yes')</label>
                                        </div>
                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                            <input type="radio" class="custom-control-input" value="2"
                                                   name="{{ $key->fieldName }}" id="radio2"
                                                   @if($editData[$key->fieldName] == 2) checked @endif>
                                            <label class="custom-control-label" for="radio2"
                                                   checked="">@lang('admin.No')</label>
                                        </div>

                                    </div>



                                @elseif($key->fieldName  == 'projectSite')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Site as $data)
                                            <option value="{{ $data->name }}"
                                                    @if($editData[$key->fieldName] == $data->id) selected @endif>  {{ $data->name }}</option>
                                        @endforeach

                                    </select>


                                @elseif($key->fieldName  == 'supervisors')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Supervisors as $data)
                                            <option value="{{ $data->name }}"
                                                    @if($editData[$key->fieldName] == $data->id) selected @endif>  {{ $data->name }}</option>
                                        @endforeach

                                    </select>

                                @elseif($key->fieldName  == 'beneficiaries')

                                    <select name="{{ $key->fieldName }}" class="form-control ">
                                        <option value="0">@lang('admin.Choose')  </option>
                                        @foreach($Beneficiaries as $data)
                                            <option value="{{ $data->id }}"
                                                    @if($editData[$key->fieldName] == $data->id) selected @endif>  {{ $data->name }}</option>
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
                                                <li class="nav-item">
                                                    <a class="nav-link" id="base-tab24" data-toggle="tab"
                                                       aria-controls="tab24" href="#tab24"
                                                       aria-expanded="false">  @lang('admin.Electrical files')</a>
                                                </li>
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


                                                    <hr/>

                                                    @if(count($paper) > 0)
                                                        <section id="image-gallery" class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">@lang('admin.Official project papers') </h4>
                                                                <a class="heading-elements-toggle">
                                                                    <i class="la la-ellipsis-v font-medium-3"></i></a>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                </div>
                                                                <div class="card-body  my-gallery" itemscope
                                                                     itemtype="http://schema.org/ImageGallery">
                                                                    <div class="row">

                                                                        @foreach($paper as $pp)
                                                                            <figure class="col-lg-3 col-md-6 col-12"
                                                                                    itemprop="associatedMedia" itemscope
                                                                                    itemtype="http://schema.org/ImageObject">
                                                                                <a href="{{ URL ::to ('public/images/'.$pp->value)}}"
                                                                                   itemprop="contentUrl"
                                                                                   data-size="480x360">
                                                                                    <img class="img-thumbnail img-fluid"
                                                                                         src="{{ URL ::to ('public/images/'.$pp->value)}}"
                                                                                         itemprop="thumbnail"
                                                                                         alt="Image description"/>
                                                                                </a>


                                                                                @if($pp->userId == Auth::user()->id )

                                                                                        <a data-url="{{ action('Admin\SettingController@delItem') }}"
                                                                                           data-id="{{$pp->id}}" data-tableName="project_details"
                                                                                           class="btn sbold red removeItemEdit">
                                                                                            <i class="ft-trash-2"></i> </a>
                                                                                @endif

                                                                            </figure>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                                                <div class="pswp" tabindex="-1" role="dialog"
                                                                     aria-hidden="true">
                                                                    <!-- Background of PhotoSwipe.
                                                                   It's a separate element as animating opacity is faster than rgba(). -->
                                                                    <div class="pswp__bg"></div>
                                                                    <!-- Slides wrapper with overflow:hidden. -->
                                                                    <div class="pswp__scroll-wrap">
                                                                        <!-- Container that holds slides.
                                                                        PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                                                        Don't modify these 3 pswp__item elements, data is added later on. -->
                                                                        <div class="pswp__container">
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                        </div>
                                                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                                        <div class="pswp__ui pswp__ui--hidden">
                                                                            <div class="pswp__top-bar">
                                                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                                                <div class="pswp__counter"></div>
                                                                                <button class="pswp__button pswp__button--close"
                                                                                        title="Close (Esc)"></button>
                                                                                <button class="pswp__button pswp__button--share"
                                                                                        title="Share"></button>
                                                                                <button class="pswp__button pswp__button--fs"
                                                                                        title="Toggle fullscreen"></button>
                                                                                <button class="pswp__button pswp__button--zoom"
                                                                                        title="Zoom in/out"></button>
                                                                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                                                <!-- element will get class pswp__preloader-active when preloader is running -->
                                                                                <div class="pswp__preloader">
                                                                                    <div class="pswp__preloader__icn">
                                                                                        <div class="pswp__preloader__cut">
                                                                                            <div class="pswp__preloader__donut"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                                                <div class="pswp__share-tooltip"></div>
                                                                            </div>
                                                                            <button class="pswp__button pswp__button--arrow--left"
                                                                                    title="Previous (arrow left)">
                                                                            </button>
                                                                            <button class="pswp__button pswp__button--arrow--right"
                                                                                    title="Next (arrow right)">
                                                                            </button>
                                                                            <div class="pswp__caption">
                                                                                <div class="pswp__caption__center"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ PhotoSwipe -->
                                                        </section>
                                                    @endif


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


                                                    <hr/>

                                                    @if(count($map) > 0)
                                                        <section id="image-gallery" class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">@lang('admin.Maps and charts') </h4>
                                                                <a class="heading-elements-toggle">
                                                                    <i class="la la-ellipsis-v font-medium-3"></i></a>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                </div>
                                                                <div class="card-body  my-gallery" itemscope
                                                                     itemtype="http://schema.org/ImageGallery">
                                                                    <div class="row">

                                                                        @foreach($map as $m)
                                                                            <figure class="col-lg-3 col-md-6 col-12"
                                                                                    itemprop="associatedMedia" itemscope
                                                                                    itemtype="http://schema.org/ImageObject">
                                                                                <a href="{{ URL ::to ('public/images/'.$m->value)}}"
                                                                                   itemprop="contentUrl"
                                                                                   data-size="480x360">
                                                                                    <img class="img-thumbnail img-fluid"
                                                                                         src="{{ URL ::to ('public/images/'.$m->value)}}"
                                                                                         itemprop="thumbnail"
                                                                                         alt="Image description"/>
                                                                                </a>


                                                                                @if($m->userId == Auth::user()->id )

                                                                                    <a data-url="{{ action('Admin\SettingController@delItem') }}"
                                                                                       data-id="{{$m->id}}" data-tableName="project_details"
                                                                                       class="btn sbold red removeItemEdit">
                                                                                        <i class="ft-trash-2"></i> </a>
                                                                                @endif

                                                                            </figure>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                                                <div class="pswp" tabindex="-1" role="dialog"
                                                                     aria-hidden="true">
                                                                    <!-- Background of PhotoSwipe.
                                                                   It's a separate element as animating opacity is faster than rgba(). -->
                                                                    <div class="pswp__bg"></div>
                                                                    <!-- Slides wrapper with overflow:hidden. -->
                                                                    <div class="pswp__scroll-wrap">
                                                                        <!-- Container that holds slides.
                                                                        PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                                                        Don't modify these 3 pswp__item elements, data is added later on. -->
                                                                        <div class="pswp__container">
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                        </div>
                                                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                                        <div class="pswp__ui pswp__ui--hidden">
                                                                            <div class="pswp__top-bar">
                                                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                                                <div class="pswp__counter"></div>
                                                                                <button class="pswp__button pswp__button--close"
                                                                                        title="Close (Esc)"></button>
                                                                                <button class="pswp__button pswp__button--share"
                                                                                        title="Share"></button>
                                                                                <button class="pswp__button pswp__button--fs"
                                                                                        title="Toggle fullscreen"></button>
                                                                                <button class="pswp__button pswp__button--zoom"
                                                                                        title="Zoom in/out"></button>
                                                                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                                                <!-- element will get class pswp__preloader-active when preloader is running -->
                                                                                <div class="pswp__preloader">
                                                                                    <div class="pswp__preloader__icn">
                                                                                        <div class="pswp__preloader__cut">
                                                                                            <div class="pswp__preloader__donut"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                                                <div class="pswp__share-tooltip"></div>
                                                                            </div>
                                                                            <button class="pswp__button pswp__button--arrow--left"
                                                                                    title="Previous (arrow left)">
                                                                            </button>
                                                                            <button class="pswp__button pswp__button--arrow--right"
                                                                                    title="Next (arrow right)">
                                                                            </button>
                                                                            <div class="pswp__caption">
                                                                                <div class="pswp__caption__center"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ PhotoSwipe -->
                                                        </section>
                                                    @endif



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


                                                    <hr/>

                                                    @if(count($work) > 0)
                                                        <section id="image-gallery" class="card">
                                                            <div class="card-header">
                                                                <h4 class="card-title">@lang('admin.Scope of work') </h4>
                                                                <a class="heading-elements-toggle">
                                                                    <i class="la la-ellipsis-v font-medium-3"></i></a>
                                                            </div>
                                                            <div class="card-content">
                                                                <div class="card-body">
                                                                </div>
                                                                <div class="card-body  my-gallery" itemscope
                                                                     itemtype="http://schema.org/ImageGallery">
                                                                    <div class="row">

                                                                        @foreach($work as $w)
                                                                            <figure class="col-lg-3 col-md-6 col-12"
                                                                                    itemprop="associatedMedia" itemscope
                                                                                    itemtype="http://schema.org/ImageObject">
                                                                                <a href="{{ URL ::to ('public/images/'.$w->value)}}"
                                                                                   itemprop="contentUrl"
                                                                                   data-size="480x360">
                                                                                    <img class="img-thumbnail img-fluid"
                                                                                         src="{{ URL ::to ('public/images/'.$w->value)}}"
                                                                                         itemprop="thumbnail"
                                                                                         alt="Image description"/>
                                                                                </a>


                                                                                @if($w->userId == Auth::user()->id )

                                                                                    <a data-url="{{ action('Admin\SettingController@delItem') }}"
                                                                                       data-id="{{$w->id}}" data-tableName="project_details"
                                                                                       class="btn sbold red removeItemEdit">
                                                                                        <i class="ft-trash-2"></i> </a>
                                                                                @endif

                                                                            </figure>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <!-- Root element of PhotoSwipe. Must have class pswp. -->
                                                                <div class="pswp" tabindex="-1" role="dialog"
                                                                     aria-hidden="true">
                                                                    <!-- Background of PhotoSwipe.
                                                                   It's a separate element as animating opacity is faster than rgba(). -->
                                                                    <div class="pswp__bg"></div>
                                                                    <!-- Slides wrapper with overflow:hidden. -->
                                                                    <div class="pswp__scroll-wrap">
                                                                        <!-- Container that holds slides.
                                                                        PhotoSwipe keeps only 3 of them in the DOM to save memory.
                                                                        Don't modify these 3 pswp__item elements, data is added later on. -->
                                                                        <div class="pswp__container">
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                            <div class="pswp__item"></div>
                                                                        </div>
                                                                        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                                                                        <div class="pswp__ui pswp__ui--hidden">
                                                                            <div class="pswp__top-bar">
                                                                                <!--  Controls are self-explanatory. Order can be changed. -->
                                                                                <div class="pswp__counter"></div>
                                                                                <button class="pswp__button pswp__button--close"
                                                                                        title="Close (Esc)"></button>
                                                                                <button class="pswp__button pswp__button--share"
                                                                                        title="Share"></button>
                                                                                <button class="pswp__button pswp__button--fs"
                                                                                        title="Toggle fullscreen"></button>
                                                                                <button class="pswp__button pswp__button--zoom"
                                                                                        title="Zoom in/out"></button>
                                                                                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                                                                                <!-- element will get class pswp__preloader-active when preloader is running -->
                                                                                <div class="pswp__preloader">
                                                                                    <div class="pswp__preloader__icn">
                                                                                        <div class="pswp__preloader__cut">
                                                                                            <div class="pswp__preloader__donut"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                                                <div class="pswp__share-tooltip"></div>
                                                                            </div>
                                                                            <button class="pswp__button pswp__button--arrow--left"
                                                                                    title="Previous (arrow left)">
                                                                            </button>
                                                                            <button class="pswp__button pswp__button--arrow--right"
                                                                                    title="Next (arrow right)">
                                                                            </button>
                                                                            <div class="pswp__caption">
                                                                                <div class="pswp__caption__center"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ PhotoSwipe -->
                                                        </section>
                                                    @endif




                                                </div>
                                                <div class="tab-pane" id="tab24" aria-labelledby="base-tab24">

                                                    @if($electric)
                                                    <div id="">

                                                        <table>
                                                            <tr>
                                                                <th>{{ $allWords[28]['name_'.App::getLocale()] }}</th>
                                                            </tr>


                                                            <tr>

                                                                <th>

                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->waterElectricImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->waterElectricImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[29]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>


                                                                </th>

                                                            </tr>

                                                            <tr>
                                                                <th>

                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->financialImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->financialImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[30]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>


                                                                </th>
                                                            </tr>


                                                            <tr>
                                                                <th>

                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->ministerImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->ministerImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[31]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>


                                                                </th>
                                                            </tr>


                                                            <tr>
                                                                <th>

                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->letterImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->letterImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[32]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>


                                                                </th>
                                                            </tr>



                                                        </table>


                                                    </div>


                                                    <hr/>


                                                    <div  >

                                                        <table>
                                                            <tr>
                                                                <th>{{ $allWords[34]['name_'.App::getLocale()] }}</th>
                                                            </tr>


                                                           <tr>
                                                               <th>
                                                                   <figure class="card card-img-top border-grey border-lighten-2"
                                                                           itemprop="associatedMedia" itemscope=""
                                                                           itemtype="http://schema.org/ImageObject">
                                                                       <a href="{{ URL ::to ('public/images/'.$electric->letterImg)}}"
                                                                          itemprop="contentUrl" data-size="480x360">
                                                                           <img class="gallery-thumbnail card-img-top"
                                                                                src="{{ URL ::to ('public/images/'.$electric->letterImg)}}"
                                                                                itemprop="thumbnail" alt="Image description">
                                                                       </a>
                                                                       <div class="card-body px-0">
                                                                           <h4 class="card-title">{{ $allWords[29]['name_'.App::getLocale()] }}</h4>
                                                                       </div>
                                                                   </figure>
                                                               </th>
                                                           </tr>

                                                            <tr>
                                                                <th>
                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->waterElectricMaterialsImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->waterElectricMaterialsImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[30]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>
                                                                </th>

                                                            </tr>


                                                            <tr>
                                                                <th>
                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->ministerMaterialsImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->ministerMaterialsImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[31]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>
                                                                </th>

                                                            </tr>


                                                            <tr>
                                                                <th>
                                                                    <figure class="card card-img-top border-grey border-lighten-2"
                                                                            itemprop="associatedMedia" itemscope=""
                                                                            itemtype="http://schema.org/ImageObject">
                                                                        <a href="{{ URL ::to ('public/images/'.$electric->letterMaterialsImg)}}"
                                                                           itemprop="contentUrl" data-size="480x360">
                                                                            <img class="gallery-thumbnail card-img-top"
                                                                                 src="{{ URL ::to ('public/images/'.$electric->letterMaterialsImg)}}"
                                                                                 itemprop="thumbnail" alt="Image description">
                                                                        </a>
                                                                        <div class="card-body px-0">
                                                                            <h4 class="card-title">{{ $allWords[32]['name_'.App::getLocale()] }}</h4>
                                                                        </div>
                                                                    </figure>
                                                                </th>

                                                            </tr>






                                                        </table>


                                                    </div>
                                                        @else

                                                    <div class="alert alert-info">
                                                        <div> @lang('admin.No Data Found')</div>
                                                    </div>
                                                    @endif





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




