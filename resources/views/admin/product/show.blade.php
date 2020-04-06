@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> محصولات</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('product.index') }}"><i class="fa fa-dashboard"></i> محصولات</a></li>
        <li class="active"> جزییات</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">
<div class="row">
<div class="col-xs-6">
    <p class="lead">جزییات</p>

    <div class="table-responsive">
      <table class="table">
        <tbody><tr>
          <th style="width:50%">شماره محصول</th>
          <td>{{ $product->id }}</td>
        </tr>
        <tr>
          <th>نام محصول</th>
          <td>{{ $product->name }}</td>
        </tr>
        <tr>
          <th>قیمت</th>
          <td>{{ $product->price }}</td>
        </tr>
        <tr>
          <th>تعداد</th>
          <td>{{ $product->count }}</td>
        </tr>
        <tr>
          <th>تعداد فروش</th>
          <td>{{ $product->countsale }}</td>
        </tr>
        <tr>
          <th> دسته بندی</th>
          <td>{{ $product->category->title }}</td>
        </tr>
        <tr>
          <th>ویژگی ها</th>
          <td>
            @foreach ($product->attribute_subcategory as $item)
            <?php
            $sub = \App\Models\Subcategory::where('id',$item->subcategory_id)->get();
            $att = \App\Models\Attribute::where('id',$item->attribute_id)->get();
            foreach ($sub as $key) {
            echo $key->title.'->';
              
            }
            foreach ($att as $key) {
            echo $key->title.'->';
              
            }
         ?>
                {{ $item->description }}
               
                <br>
            @endforeach
           
          </td>
        </tr>
        <tr>
            <th>وضعیت</th>
            <td>                   
               <?php if($product->status == 0) echo "ناموجود"; else echo "موجود"; ?>
            </td>
          </tr> 
          <tr>
            <th>ویژه</th>
            <td>                   
               <?php if($product->special == 0) echo "غیرویژه"; else echo "ویژه"; ?>
            </td>
          </tr> 
          <tr>
            <th>تخفیف</th>
            <td>{{ $product->discount }}</td>
          </tr> 
          <tr>
            <th>کلمات کلیدی</th>
            <td>
              @foreach($product->tags as $tag) 
              {{ $tag->name }},
              @endforeach
            </td>
          </tr> 
          <tr>
            <th> امتیاز</th>
            <td>
          <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $product->averageRating }}" data-size="xs" disabled="">
              
            </td>
          </tr> 
         
          
      
      </tbody>
    </table>
    </div>
  </div>
  <div class="col-xs-6">
    <img src="/{{ $product->photos()->first()->path }}" height="490px" alt="">
  </div>
</div>
</section>
@endsection