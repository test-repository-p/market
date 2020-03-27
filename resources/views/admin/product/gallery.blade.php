@extends('admin.layouts.app')

@section('script')
<link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
@endsection

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
<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title"> ویرایش و افزودن گالری به  {{ $product->name }}  </h3>
        </div>
       
       
          <div class="box-body">


            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label">تصاویرگالری </label>
              <div class="col-sm-10">
                <form action="{{ url('admin/product/upload?id='.$product->id) }}" method="post" class="dropzone">
                  {{ csrf_field() }}
                  <input type="file" name="file" style="display:none"  multiple/>
                </form>
              </div>
            </div>
  
      </div>
      </div>



</section>
@endsection