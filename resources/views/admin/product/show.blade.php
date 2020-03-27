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
            <th>تصویر</th>
            <td><img src="/{{ $product->photos()->first()->path }}" alt=""></td>
          </tr>
          
      
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection