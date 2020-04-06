 <!-- Left Part Start-->
 <aside id="column-left" class="col-sm-3 hidden-xs">

    <h3 class="subtitle">دسته ها</h3>
    <div class="box-category">
        <ul id="cat_accordion">

            @foreach ($categorys as $category)
        <li>
            <a href="{{ url('site/cat/'.$category->id) }}">{{ $category->title }}</a> <span class="down"></span>
                <ul>
                    @foreach ($category->subcategory as $item)
                    @if($item->parent_id == 0)
                <li>
                    <a href="{{ url('site/subcat/'.$item->id) }}">{{ $item->title }}</a> <span class="down"></span>
                        <ul>
                           <?php 
                                $subs = App\Models\Subcategory::where('parent_id',$item->id)->get();
                            ?>
                            @foreach ($subs as $sub)
                                <li><a href="{{ url('site/subcat/'.$sub->id) }}"> {{ $sub->title}}</a></li> 
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>

    <h3 class="subtitle">پرفروش ها</h3>
    <div class="side-item">
        @foreach ($countsale as $item)
        <div class="product-thumb clearfix">
            <div class="image">
            <a href="{{ url('site/element/'.$item->id) }}"><img src="/{{ $item->photos()->first()->path }}" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
            </div>
            <div class="caption">
                <h4><a href="{{ url('site/element/'.$item->id) }}">{{ $item->name }}</a></h4>
                <p class="price"><span class="price-new">
                    <?php
                    $a = 100-$item->discount;
                    $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                            @if($item->discount != 0)
                
                <span class="price-old">{{ number_format( $item->price) }} تومان</span>
                <span class="saving">-{{ $item->discount }}%</span>
                @endif
            </p>
            <div class=""> 
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
            </div>
            </div>
        </div>
        @endforeach
    </div>


    <h3 class="subtitle">ویژه</h3>
    <div class="side-item">
        @foreach ($special as $item)
        <div class="product-thumb clearfix">
            <div class="image">
            <a href="{{ url('site/element/'.$item->id) }}"><img src="/{{ $item->photos()->first()->path }}" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
            </div>
            <div class="caption">
                <h4><a href="{{ url('site/element/'.$item->id) }}">{{ $item->name }}</a></h4>
                <p class="price"> <span class="price-new"> <?php
                $a = 100-$item->discount;
                $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                            @if($item->discount != 0)
                <span class="price-old">{{ number_format($item->price) }} تومان</span> 
                <span class="saving">-{{ $item->discount }}%</span> 
                @endif
            </p>
            <div class=""> 
                <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
            </div>
            </div>
        </div>
        @endforeach
    </div>

    <h3 class="subtitle">جدیدترین</h3>
    <div class="side-item">

        @foreach ($new as $item)
        <div class="product-thumb clearfix">
            @if($item->photos()->first())
            <div class="image">
                <a href="{{ url('site/element/'.$item->id) }}"><img src="/{{ $item->photos()->first()->path }}" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
            </div>
            @endif
            <div class="caption">
                <h4><a href="{{ url('site/element/'.$item->id) }}">{{ $item->name }}</a></h4>
                <p class="price"> <span class="price-new"> <?php
                    $a = 100-$item->discount;
                    $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                                @if($item->discount != 0)
                    <span class="price-old">{{ number_format($item->price) }} تومان</span> 
                    <span class="saving">-{{ $item->discount }}%</span> 
                    @endif
                </p>
                <div class=""> 
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                </div>
                
            </div>
        </div>
        @endforeach
    </div>


</aside>
<!-- Left Part End-->