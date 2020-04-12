@extends('site.layouts.app')

@section('title')
{{-- <title>{{ $product->name }}</title> --}}
@endsection

@section('title-content')
{{-- <!-- Breadcrumb Start-->
<ul class="breadcrumb">
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ route('index') }}" itemprop="url"><span
                itemprop="title"><i class="fa fa-home"></i></span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a
            href="{{ url('site/cat/'.$product->category->id) }}" itemprop="url"><span
                itemprop="title">{{ $product->category->title }}</span></a></li>
    <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('site/element/'.$product->id) }}"
            itemprop="url"><span itemprop="title">{{ $product->name }}</span></a></li>
</ul>
<!-- Breadcrumb End--> --}}
@endsection


@section('aside')
@include('site.layouts.aside')
@endsection

@section('content')
<div id="content" class="col-sm-9">

    @if(session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message') }}
    </div>
    @endif
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors()->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

 <h3 class="subtitle"> نتایج جستجو</h3>
<p>{{ $result->total() }} نتیجه برای {{ request()->input('query') }}</p>
<div class="owl-carousel product_carousel">
    @foreach ($result as $item)
    <div class="product-thumb clearfix">
        <div class="image">
            <a href="{{ url('site/element/'.$item->id) }}"><img src="{{ $item->photos()->first()->path }}"
                    alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
        </div>
        <div class="caption">
            <h4><a href="{{ url('site/element/'.$item->id) }}">{{ $item->name }}</a></h4>
            <p class="price"> <span class="price-new">
                    <?php
               $a = 100-$item->discount;
               $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span>
                @if($item->discount != 0)
                <span class="price-old">{{ number_format($item->price) }} تومان</span>
                <span class="saving">-{{ $item->discount }}%</span>
                @endif
            </p>
            <div class="rating">
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5"
                    data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
            </div>

        </div>
        <div class="button-group">
            <button class="btn-primary add-to-cart" type="button" onClick="" data-id={{ $item->id }}><span>افزودن به
                    سبد</span></button>
            <div class="add-to-links">
                <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i
                        class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i
                        class="fa fa-exchange"></i></button>
            </div>
        </div>
    </div>
    @endforeach
    {{ $result->appends(request()->input())->links() }}
</div>

</div>
@endsection


@section('script-endfooter')
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

@endsection