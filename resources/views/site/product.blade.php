@extends('site.layouts.app')

@section('title')
<title>{{ $product->name }}</title>
@endsection

@section('title-content')
<!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route('index') }}" itemprop="url"><span
                itemprop="title"><i class="fa fa-home"></i></span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a
            href="{{ url('site/cat/'.$product->category->id) }}" itemprop="url"><span
                itemprop="title">{{ $product->category->title }}</span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('site/element/'.$product->id) }}"
            itemprop="url"><span itemprop="title">{{ $product->name }}</span></a></li>
</ul>
<!-- Breadcrumb End-->
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
        <h1 class="title" itemprop="name">{{ $product->name }}</h1>
        <div class="row product-info">
            <div class="col-sm-6">
                <div class="image"><img class="img-responsive" itemprop="image" id="zoom_01"
                        src="/{{ $product->photos()->first()->path }}" width="300px" height="300px"
                        title="{{ $product->name }}" alt="{{ $product->name }}"
                        data-zoom-image="/{{ $product->photos()->first()->path }}" />
                </div>
                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای
                        مشاهده گالری روی تصویر کلیک کنید</span>
                </div>
                <div class="image-additional" id="gallery_01">

                    <a class="thumbnail" href="#" data-zoom-image="/{{ $product->photos()->first()->path }}"
                        data-image="/{{ $product->photos()->first()->path }}" title="{{ $product->name }}">
                        <img src="/{{ $product->photos()->first()->path }}" title="{{ $product->name }}"
                            alt="{{ $product->name }}" />
                    </a>
                    <?php $photo = $product->photos; ?>
                    @foreach($photo as $val)
                    @if(strpos($val->path,"-$product->id"))

                    <a class="thumbnail" href="#" data-zoom-image="/{{ $val->path }}" data-image="/{{ $val->path }}"
                        title="{{ $product->name }}">
                        <img src="/{{ $val->path }}" title="{{ $product->name }}" alt="{{ $product->name }}" />
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="col-sm-6">
                <ul class="list-unstyled description">
                    <li><b>برند :</b> <a href="#"><span itemprop="brand">{{ $brand->first()->description }}</span></a>
                    </li>
                    <li><b>کد محصول :</b> <span itemprop="mpn">{{ $product->id }}</span></li>
                    <li><b>وضعیت موجودی :</b> <span class="instock">
                            <?php if($product->status==0 || $product->count==0) echo "ناموجود"; else echo "موجود";?>
                        </span>
                    </li>
                </ul>
                <ul class="price-box">
                    <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                        @if($product->discount != 0)
                        <span class="price-old">{{ number_format($product->price) }} تومان</span>
                        @endif
                        <span itemprop="price"><?php
                            $a = 100-$product->discount;
                            $newPrice = ($product->price/100)*$a;?>{{ number_format($newPrice) }} تومان
                            <span itemprop="availability" content="موجود"></span>
                        </span>
                    </li>
                    <li></li>
                    @if($product->discount != 0)
                    <li> تخفیف : %{{ $product->discount }}</li>
                    @endif
                </ul>
                <div id="product">
                    <h3 class="subtitle">انتخاب های در دسترس</h3>
                    <div class="form-group required">
                        <label class="control-label">رنگ</label>
                        <select class="form-control" id="input-option200" name="color">
                            <option value=""> --- لطفا انتخاب کنید --- </option>
                            @foreach ($colors as $item)
                            <option value="{{ $item->product->id }}">{{ $item->description }} </option>
                            @endforeach
                        </select>
                        <label class="control-label">سایز</label>
                        <select class="form-control" id="input-option200" name="color">
                            <option value=""> --- لطفا انتخاب کنید --- </option>
                            @foreach ($sizes as $item)
                            <option value="{{ $item->product->id }}">{{ $item->description }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="cart">
                        <div>
                            <div class="qty">
                                <label class="control-label" for="input-quantity">تعداد</label>
                                <input type="text" name="quantity" value="1" size="2" id="input-quantity"
                                    class="form-control" />
                                <a class="qtyBtn plus" href="javascript:void(0);">+</a><br />
                                <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                <div class="clear"></div>
                            </div>
                            <button type="button" id="button-cart" data-id={{ $item->product->id }}
                                class="btn btn-primary btn-lg add-to-cart">افزودن به سبد</button>
                        </div>
                        <div>
                            <button type="button" class="wishlist" onClick=""><i class="fa fa-heart"></i> افزودن به
                                علاقه مندی ها</button>
                            <br />
                            <button type="button" class="wishlist" onClick=""><i class="fa fa-exchange"></i> مقایسه این
                                محصول</button>
                        </div>
                    </div>
                </div>
                <div class="rating">
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"
                        data-step="0.1" value="{{ $product->averageRating }}" data-size="s" disabled="">
                    <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">
                        <span itemprop="reviewCount">1 بررسی</span></a> /
                    <a onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;" href="">یک یادداشت
                        بنویسید</a>
                    </p>
                </div>
                <hr>
                <!-- AddThis Button BEGIN -->
                <div class="addthis_toolbox addthis_default_style">
                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                    <a class="addthis_button_tweet"></a>
                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                    <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"
                        pi:pinit:url="http://www.addthis.com/features/pinterest"
                        pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a>
                    <a class="addthis_counter addthis_pill_style"></a>
                </div>
                <script type="text/javascript"
                    src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-514863386b357649"></script>
                <!-- AddThis Button END -->
            </div>
        </div>
        <?php  $comment = $product->comments->where('status','1'); ?>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
            <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
            <li><a href="#tab-review" data-toggle="tab">نظرات ({{count($comment)}})</a></li>
        </ul>
        <div class="tab-content">
            <div itemprop="description" id="tab-description" class="tab-pane active">
                <div>
                    <p>
                        <b>{{ $product->name }}</b>
                    </p>
                    @if($sub_body->body)
                    <p>
                        {{ $sub_body->body }}
                    </p>
                    @endif

                </div>
            </div>
            <div id="tab-specification" class="tab-pane">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td colspan="2"><strong></strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <strong>
                                    جنس
                                </strong>
                            </td>
                            <td>
                                @foreach ($type as $item){{ $item->description }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    برند
                                </strong>
                            </td>
                            <td>
                                {{ $brand->first()->description }},

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    سایز
                                </strong>
                            </td>
                            <td>
                                @foreach ($sizes as $item){{ $item->description }},
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong>
                                    رنگ
                                </strong>
                            </td>
                            <td>
                                @foreach ($colors as $item){{ $item->description }},
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div id="tab-review" class="tab-pane">
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
                                                value="{{ $product->UseraverageRating }}" data-size="s" disabled="">

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
               
                
             

                <h2>نظرخودرادررابطه بااین محصول بنویسید</h2>
          {!! Form::open(['method'=>'POST','route'=>'commen.store','class'=>'form-horizontal']) !!}
                @csrf

                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label for="input-review" class="control-label">نظر شما</label>
                            <textarea class="form-control" id="input-review" rows="5" name="comment"></textarea>
                        </div>
                    </div>
                    <div class="form-group required">
                        <div class="col-sm-12">
                            <label class="control-label">رتبه</label>
                            <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                                data-step="1" value="" data-size="xs">
                        <input type="text" value="{{ $product->id }}" name="product_id" hidden>

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
        <h3 class="subtitle">محصولات مرتبط</h3>
        <div class="owl-carousel related_pro">

            @foreach ($subs as $item)
            <div class="product-thumb">
                <div class="image">
                    <a href="{{ url('site/element/'.$item->product->id) }}"><img
                            src="/{{ $item->product->photos()->first()->path }}" alt="{{ $item->product->name }}"
                            title="{{ $item->product->name }} " class="img-responsive" /></a>
                </div>
                <div class="caption">
                    <h4><a href="{{ url('site/element/'.$item->product->id) }}">{{ $item->product->name }} </a></h4>
                    <p class="price">
                        <span class="price-old">{{ $item->product->price }}
                            تومان</span>
                        <span class="price-new"><?php
                            $a = 100-$item->discount;
                            $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span>
                        <span class="saving">-{{ $item->product->discount }}%</span> </p>
                    <div class="rating">
                        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"
                            data-step="0.1" value="{{ $item->product->averageRating }}" data-size="s" disabled="">
                    </div>
                </div>
                <div class="button-group">
                    <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                    <div class="add-to-links">
                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i
                                class="fa fa-heart"></i>
                        </button>
                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i
                                class="fa fa-exchange"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<!--Middle Part End -->
@endsection

@section('sidebar')
@include('site.layouts.aside')
@endsection
@section('script-endfooter')
<script type="text/javascript" src="/site/js/jquery.elevateZoom-3.0.8.min.js"></script>
<script type="text/javascript" src="/site/js/swipebox/lib/ios-orientationchange-fix.js"></script>
<script type="text/javascript" src="/site/js/swipebox/src/js/jquery.swipebox.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.add-to-cart').on('click', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                url: '/basket',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data.basket_create == 'success') {
                        alert('محصول موردنظرباموفقیت به سبدخریدافزوده شد');
                    } else if (data.count == 'exceeded') {
                        alert('تعدادمحصولات انتخاب شده بیش ازموجودی انباراست');
                    }
                }
            });
        });
    });
</script>
<script type="text/javascript">
    // Elevate Zoom for Product Page image
    $("#zoom_01").elevateZoom({
        gallery: 'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 500,
        zoomWindowPosition: 11,
        lensFadeIn: 500,
        lensFadeOut: 500,
        loadingIcon: 'image/progress.gif'
    });
    //////pass the images to swipebox
    $("#zoom_01").bind("click", function(e) {
        var ez = $('#zoom_01').data('elevateZoom');
        $.swipebox(ez.getGalleryList());
        return false;
    });
</script>
@endsection