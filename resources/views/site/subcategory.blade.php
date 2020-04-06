@extends('site.layouts.app')

@section('title')
<title>مارکت شاپ </title>
@endsection

@section('aside')
  @include('site.layouts.aside')
@endsection

@section('content')
<div id="content" class="col-sm-9">

    <h1 class="title">
      
            {{ $subcategory->title }}
    </h1>
    
    <div class="product-filter">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> 
            </div>
            <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
            </div>
            <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                    <option  selected="selected">پیشفرض</option>
                    @foreach ($filter as $item)

                <option value="{{ $item->id }}">{{ $item->title }}</option>
                        
                    @endforeach
                    
                    </select>
            </div>
            <div class="col-sm-1 text-right">
                <label class="control-label" for="input-limit">نمایش :</label>
            </div>
            <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control">
                    <option value="" selected="selected">20</option>
                    <option value="">25</option>
                    <option value="">50</option>
                    <option value="">همه</option>
</select>
            </div>
        </div>
    </div>
    <br />
    <div class="row products-category">

        @if($att_sub != null)
        @foreach ($att_sub as $key => $value)
        @foreach ($value as $item)
        @if($item->product)                 
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image">
                    <a href="{{ url('site/element/'.$item->product->id) }}"><img src="/{{ $item->product->photos()->first()->path }} " alt=" {{ $item->product->name }}  " title=" {{ $item->product->name }}  " class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="{{ url('site/element/'.$item->product->id) }}">{{ $item->product->name }} </a></h4>
                        <p class="description">
                            
                        </p>
                        <p class="price"> <span class="price-new">
                            <?php
                            $a = 100-$item->product->discount;
                            $newPrice = ($item->product->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                            @if($item->product->discount != 0)
                            <span class="price-old">{{ number_format($item->product->price) }}  تومان</span>
                             <span class="saving">-{{ $item->product->discount }} %</span>
                             @endif
                            </p>
                            <div class="rating"> 
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                            </div>
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                            <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
        @endforeach
       {{-- {{  $att_sub->links() }} --}}
    {{ $product->links() }}


        @endif

        @if($att_sub1 != null)
        @foreach ($att_sub1 as $key => $value)
        @if($value->product)                 
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image">
                    <a href="{{ url('site/element/'.$value->product->id) }}"><img src="/{{ $value->product->photos()->first()->path }} " alt=" {{ $value->product->name }}  " title=" {{ $value->product->name }}  " class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="{{ url('site/element/'.$value->product->id) }}">{{ $value->product->name }} </a></h4>
                        <p class="description">
                            
                        </p>
                        <p class="price"> <span class="price-new">
                            <?php
                            $a = 100-$value->product->discount;
                            $newPrice = ($value->product->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                            @if($value->product->discount != 0)
                            <span class="price-old">{{ number_format($value->product->price) }}  تومان</span>
                            <span class="saving">-{{ $value->product->discount }} %</span>
                            @endif
                        </p>
                        <div class="rating"> 
                            <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $value->product->averageRating }}" data-size="s" disabled="">
                        </div>
                    </div>
                    <div class="button-group">
                        <button class="btn-primary" type="button" onClick=""><span>افزودن به سبد</span></button>
                        <div class="add-to-links">
                            <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i> <span>افزودن به علاقه مندی ها</span></button>
                            <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i> <span>مقایسه این محصول</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
         {{  $att_sub1->links() }}

        @endif

    </div>



    {{-- {{ $product->links() }} --}}


   


</div>
@endsection