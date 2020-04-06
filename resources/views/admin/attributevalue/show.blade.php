@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  زیرگروه دسته بندیها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('attributevalue.index') }}"><i class="fa fa-dashboard"></i>  زیرگروه دسته بندیها</a></li>
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
          <th style="width:50%">شماره</th>
          <td>{{ $att_sub->id }}</td>
        </tr>
        <tr>
          <th>سرگروه</th>
          <td><?php
            foreach ($subcategorys as $val){
             if($att_sub->subcategory_id==$val->id){
               echo $val->title.'->'.$val->category->title;
             }
            }
             ?></td>
        </tr>
        <tr>
          <th>ویژگی </th>
          <td><?php
            foreach ($attributes as $val){
             if($att_sub->attribute_id==$val->id){
               echo $val->title;
             }
            }
             ?></td>
        </tr>
        <tr>
          <th>مقدار</th>
          <td>
            {{ $att_sub->description }}
          </td>
        </tr>
        <tr>
          <th>شماره محصول مرتبط </th>
          <td>
            {{ $att_sub->product->id }}
          </td>
        </tr>
        <tr>
          <th>نام محصول مرتبط </th>
          <td>
            {{ $att_sub->product->name }}
          </td>
        </tr>
        

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection