<div id="content" class="col-sm-9">

    <!-- Slideshow Start-->
    <div class="slideshow single-slider owl-carousel">
        @foreach ($slider as $value)
        @foreach ($value->photos as $val)
        <div class="item">
            <a href="{{ $value->url }}"><img class="img-responsive" src="{{ $val->path }}" alt="{{ $value->name }}" /></a>
        </div>
        @endforeach
        @endforeach  
    </div>
    <!-- Slideshow End-->

      <!-- Featured محصولات Start-->
      <h3 class="subtitle">ویژه ها</h3>
      <div class="owl-carousel product_carousel">
        @foreach ($special as $item)
        <div class="product-thumb clearfix">
            <div class="image">
            <a href="{{ url('site/element/'.$item->id) }}"><img src="{{ $item->photos()->first()->path }}" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
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
                        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                    </div>


               
            </div>
            <div class="button-group">
                <button class="btn-primary add-to-cart" type="button" onClick="" data-id={{ $item->id }}><span>افزودن به سبد</span></button>
                <div class="add-to-links">
                    <button type="button" data-toggle="tooltip" title="Add to Wish List" onClick=""><i class="fa fa-heart"></i></button>
                    <button type="button" data-toggle="tooltip" title="مقایسه this محصولات" onClick=""><i class="fa fa-exchange"></i></button>
                </div>
            </div>
        </div>
        @endforeach
      </div>
      <!-- Featured محصولات End-->



          <!-- Banner Start-->
    <div class="marketshop-banner">
        <div class="row">
            @foreach ($banner as $value)
            @foreach ($value->photos as $val)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <a href="#"><img src=" {{ $val->path }}" alt="{{ $value->name }}" title="{{ $item->name }}" /></a>
            </div>
            @endforeach
            @endforeach         
        </div>
    </div>
    <!-- Banner End-->

      <div class="category-module" id="latest_category">
        <h3 class="subtitle"> محصولات {{ $subs->first()->category->title }} - <a class="viewall" href="{{ url('site/cat/'.$subs->first()->category_id) }}">نمایش همه</a></h3>
        <div class="category-module-content">
    
            <ul id="sub-cat" class="tabs">
            <?php $i=0;?>
            @foreach ($subs as $item)
            <?php $i+=1;?>
            <li><a href="#tab-cat{{$i}}">{{ $item->title }}</a></li>
            @endforeach          
            </ul>
           
            <?php $i=0;?>
            @foreach ($subs as $item)
            <?php $subcats = \App\Models\Subcategory::where('parent_id',$item->id)->get(); ?>
    
            <?php $i+=1;?>
            <div id="tab-cat{{$i}}" class="tab_content">
                    <div class="owl-carousel latest_category_tabs">
                        
                       
    
                        @foreach ($subcats as $subcat)
                        <?php  $att_subs = \App\Models\Attribute_Subcategory::where('subcategory_id',$subcat->id)->latest()->paginate(5);?>
    
                        @foreach ($att_subs as $item)
                        @if($item->product)
                        <div class="product-thumb">
                            <div class="image">
                            <a href="product.html"><img src="/{{ $item->product->photos()->first()->path }}" alt="{{ $item->product->name }}" title="{{ $item->product->name }}" class="img-responsive" /></a>
                            </div>
                            <div class="caption">
                            <h4><a href="product.html">{{ $item->product->name }}</a></h4>
                                <p class="price"> <span class="price-new">
                                    <?php
                                    $a = 100-$item->product->discount;
                                    $newPrice = ($item->product->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                                    @if($item->discount != 0)
                                    <span class="price-old">{{ $item->product->price }} تومان</span> 
                                    <span class="saving">-{{ $item->product->discount }}%</span>
                                    @endif
                                 </p>
                                    <div class="rating"> 
                                        <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->product->averageRating }}" data-size="s" disabled="">
                                    </div>
                            </div>
                            <div class="button-group">
                                <button class="btn-primary add-to-cart" type="button" onClick="" data-id={{ $item->id }}><span>افزودن به سبد</span></button>
                                <div class="add-to-links">
                                    <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                                    <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach                       
                    </div>
                </div>    
                @endforeach 
            </div>
        </div>

   


    <!-- Banner Start -->
    <div class="marketshop-banner">
        <div class="row">
            @foreach ($banner2 as $value)
            @foreach ($value->photos as $val)
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <a href="#"><img src="/{{ $val->path }}" alt="{{ $value->name }}" title="{{ $value->name }}" /></a>
            </div>
            @endforeach
            @endforeach            
        </div>
    </div>
    <!-- Banner End -->

 <!-- Brand محصولات Slider Start-->
 <h3 class="subtitle"> محصولات {{ $men->first()->category->title }} - <a class="viewall" href="{{ url('site/cat/'.$men->first()->category_id) }}">نمایش همه</a></h3>
 <div class="owl-carousel latest_brands_carousel">
    @foreach ($men as $item)    
    <div class="product-thumb">
        <div class="image">
        <a href="{{ url('site/element/'.$item->id) }}"><img src="{{ $item->photos()->first()->path }}" alt="{{ $item->name }}" title="{{ $item->name }}" class="img-responsive" /></a>
        </div>
        <div class="caption">
            <h4><a href="{{ url('site/element/'.$item->id) }}">{{ $item->name }}</a></h4>
            <p class="price"> <span class="price-new">
                <?php
                $a = 100-$item->discount;
                $newPrice = ($item->price/100)*$a;?>{{ number_format($newPrice) }} تومان</span> 
                @if($item->discount != 0)
                <span class="price-old">{{ number_format($item->price) }} تومان</span> 
                <span class="saving">-{{ $item->discount }}%</span> </p>
                @endif
                <div class="rating"> 
                    <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $item->averageRating }}" data-size="s" disabled="">
                </div>
        </div>
        <div class="button-group">
            <button class="btn-primary add-to-cart" type="button" onClick="" data-id={{ $item->id }}><span>افزودن به سبد</span></button>
            <div class="add-to-links">
                <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی" onClick=""><i class="fa fa-heart"></i></button>
                <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
            </div>
        </div>
    </div>
    @endforeach
 </div>
 <!-- Brand محصولات Slider End -->



 



 <script>
    $(document).ready(function(){
      $.ajaxSetup({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.add-to-cart').on('click',function(){
      var id = $(this).attr('data-id');
      $.ajax({
        url:'/basket',
        type:'post',
        dataType:'json',
        data:{id:id},
        success:function(data){
          if(data.basket_create=='success'){
            alert('محصول موردنظرباموفقیت به سبدخریدافزوده شد');
          }
          else if(data.count=='exceeded'){
            alert('تعدادمحصولات انتخاب شده بیش ازموجودی انباراست');
          }
        }
        
      });
    });
  });
  </script>










</div>