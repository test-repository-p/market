@extends('site.layouts.app')

@section('title')
<title>{{ $article->title }}</title>
@endsection

@section('title-content')
<!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route('index') }}" itemprop="url"><span
                itemprop="title"><i class="fa fa-home"></i></span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a
            href="{{ url('site/cat/'.$article->category->id) }}" itemprop="url"><span
                itemprop="title">{{ $article->category->title }}</span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('site/weblog/'.$article->id) }}"
            itemprop="url"><span itemprop="title">{{ $article->name }}</span></a></li>
</ul>
<!-- Breadcrumb End-->
@endsection
@section('aside')
@include('site.layouts.aside')
@endsection
@section('content')
{{-- ========================flash message ========================== --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
@if ($errors->any()))
@foreach ($errors->all() as $item)
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $item }}</strong>
</div>
@endforeach
@endif
<!--Middle Part Start-->
<div id="content" class="col-sm-9">
    <div itemscope itemtype="http://schema.org/محصولات">
        <h1 class="title" itemprop="name">{{ $article->title }}</h1>
        <div class="row product-info">
            <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image"
                        src="/{{ $article->photos()->first()->path }}" width="300px" height="300px"
                        title="{{ $article->title }}" alt="{{ $article->title }}" />
                </div>
            </div>

            <div class="col-sm-6">
                <ul class="list-unstyled description">
                    <li><b>عنوان :</b> <a href="#"><span itemprop="brand">{{ $article->title }}</span></a></li>
                    <li><b>متن کوتاه :</b> <span itemprop="mpn">{{ $article->demo }}</span></li>
                    <li><b> فرستنده مقاله :</b>
                        <span class="instock">{{ $article->user->name }}</span>
                    </li>
                    <li><b> تاریخ ارسال :</b>
                        <span class="">{{ Verta::instance($article->created_at)->format('Y/n/j') }}</span>
                    </li>
                </ul>
            </div>
            <div class="col-sm" id="product">
                <h3 class="subtitle"> {{ $article->title }}</h3>
                <div class="form-group required">
                    {{ $article->text }}
                </div>
            </div>
            <div class="rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <div class="rating">
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"
                        data-step="0.1" value="{{ $article->averageRating }}" data-size="s" disabled="">
                </div>
                <span itemprop="reviewCount">1 بررسی</span></a> /
                <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک یادداشت
                    بنویسید</a>
                </p>
            </div>
            <hr>
        </div>
    </div>
    <?php  $comment = $article->comments->where('status','1'); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
        <li><a href="#tab-review" data-toggle="tab">نظرات ({{count($comment)}})</a></li>
    </ul>
    <div class="tab-content">
        <div itemprop="description" id="tab-description" class="tab-pane active">
            <div>
                <p>
                    <i class="fa fa-user"></i>
                    نویسنده:{{ $article->user->name }}
                </p>
                <p>
                    <i class="fa fa-bookmark"></i>
                    عنوان:{{ $article->title }}
                </p>
                <p>
                    <i class="fa fa-calendar"></i>

                    تاریخ ارسال: {{ Verta::instance($article->created_at)->format('Y/n/j') }}
                </p>

            </div>
        </div>

        <div id="tab-review" class="tab-pane">
            {{-- <form class="form-horizontal"> --}}
                <div id="review">
                    <div>
                        @foreach ($comment as $item)

                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 50%;"><strong><span>{{ $item->user->name }}</span></strong></td>
                                    <td class="text-right">
                                        <span>{{ Verta::instance($item->created_at)->format('Y/n/j') }}</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p>{{ $item->comment }}.</p>
                                        <div class="rating">
                                            <input id="input-1" name="input-1" class="rating rating-loading"
                                                data-min="0" data-max="5" data-step="0.1"
                                                value="{{ $article->UseraverageRating }}" data-size="s" disabled="">

                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        @endforeach

                    </div>
                    <div class="text-right"></div>
                </div>
                @if(Auth::check())
                <h2>نظرخودرادررابطه بااین مقاله بنویسید</h2>
                {!! Form::open(['method'=>'POST','route'=>'commen.store','class'=>'form-horizontal']) !!}
                    @csrf
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label for="input-review" class="control-label">نظر شما</label>
                            <textarea class="form-control" id="input-review" rows="5" name="comment"></textarea>
                            <div class="help-block"><span class="text-danger">توجه :</span> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label">رتبه</label>
                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                data-step="1" value="" data-size="xs">
                            <input type="text" value="{{ $article->id }}" name="article_id" hidden>
    
    
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-right">
                            {!! Form::submit('ادامه',['class'=>'btn btn-primary']) !!}
    
                        </div>
                    </div>
               
                {!! Form::close() !!}
                @else
                <h2 class="text-danger">برای ثبت نظرخودابتدالاگین کنید</h2>
                @endif

        </div>

    </div>

    <h3 class="subtitle">مقالات مرتبط</h3>
    <div class="owl-carousel related_pro">

        @foreach ($art_cat as $item)
        <div class="product-thumb">
            <div class="image">
                <a href="{{ url('site/weblog/'.$item->id) }}">
                    @if($item->photos()->first())
                    <img src="/{{ $item->photos()->first()->path }}"
                        alt="{{ $item->title }}" title="{{ $item->title }} " class="img-responsive" />
                    @endif
                    </a>
            </div>
            <div class="caption">
                <h4><a href="{{ url('site/weblog/'.$item->id) }}">{{ $item->title }} </a></h4>
                <p class="price">
                    {{ $item->demo }}
                </p>
                <div class="rating">
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"
                        data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                </div>
            </div>

        </div>
        @endforeach

    </div>
</div>
</div>
<!--Middle Part End -->
@endsection

@section('script-endfooter')
<script type="text/javascript" src="/site/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="/site/js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="/site/js/swipebox/src/js/jquery.swipebox.min.js"></script>

@endsection