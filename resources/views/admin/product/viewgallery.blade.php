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
        <li class="active"> گالری</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

  @if(session()->has('msg'))
    <div class="col-md-9">
        <div class="box box-info box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">پیام جدید</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            {{ session('msg')}} 
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      @endif

<div class="col-xs-9">
    <p class="lead">گالری</p>

    <div class="table-responsive">
      <table class="table">
        <tbody><tr>
          <th style="width:20%">شماره محصول</th>
          <td>{{ $product->id }}</td>
        </tr>
        <tr>
          <th>نام محصول</th>
          <td>{{ $product->name }}</td>
        </tr>
        
          <tr>
            <th>تصویر اصلی</th>
            <td><img src="/{{ $product->photos()->first()->path }}" style="width:160px;height:160px;height: auto;float: right;"></td>
          </tr>
          <tr>
            <th> تصاویرگالری</th>
           <?php $photo = $product->photos; ?>
           <td>
            @foreach($photo as $val)
                @if(strpos($val->path,"-$product->id"))
                  <img src="/{{ $val->path }}" style="width:100px;height:60px;height: auto;float: right;">
                @endif
            @endforeach
            <td>
          </tr>

          <tr>
            <th>تغییرات</th>
            <td> برای حذف عکس ها قبلی ابتداگالری قبلی راحذف کنیدسپس دکمه افزودن گالری رابزنید</td>
            <td>
              <a class="btn  bg-red" href="{{url('admin/product/deletegallery/'.$product->id)}}">
                <i class="fa fa-info-circle"></i>  حذف گالری
            </a>
            </td>
            <td>
              <a class="btn  bg-blue" href="{{url('admin/product/gallery/'.$product->id)}}">
                <i class="fa fa-info-circle"></i>  افزودن گالری
            </a>
            </td>
          </tr>
          <tr>

         
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection