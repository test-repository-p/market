@extends('site.layouts.app')

@section('title')
<title> وبلاگ</title>
@endsection

@section('aside')
    @include('site.layouts.aside')
@endsection
@section('content')
<div id="content" class="col-sm-9">

    {{-- <h1 class="title"> {{ $category->title }}</h1> --}}

    <div class="product-filter">
        <div class="row">
            <div class="col-md-4 col-sm-5">
                <div class="btn-group">
                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="List"><i
                            class="fa fa-th-list"></i></button>
                    <button type="button" id="grid-view" class="btn btn-default" data-toggle="tooltip" title="Grid"><i
                            class="fa fa-th"></i></button>
                </div>
                {{-- <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a> --}}
            </div>
            {{-- <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
            </div>
            <div class="col-md-3 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                    <option value="" selected="selected">پیشفرض</option>
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
                    <option value="">75</option>
                </select>
            </div> --}}
        </div>
    </div>
    <br />
    <div class="row products-category">

        @foreach ($art as $item)
        <div class="product-layout product-list col-xs-12">
            <div class="product-thumb">
                <div class="image">
                    <a href="{{ url('site/weblog/'.$item->id) }}"><img src="/{{ $item->photos()->first()->path }} " width="300px" height="200px" alt=" {{ $item->title }}  "
                            title=" {{ $item->title }}  " class="img-responsive" /></a>
                </div>
                <div>
                    <div class="caption">
                        <h4><a href="{{ url('site/weblog/'.$item->id) }}">{{ $item->title }} </a></h4>
                        <p class="description">
                            {{ $item->demo }}
                        </p>
                        <p></p>
                            <div class="rating"> 
                                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                            </div>
                    </div>
                    
                </div>
            </div>
        </div>

        @endforeach

    </div>

    {{ $art->links() }}

</div>
@endsection

