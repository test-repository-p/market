@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  زیرگروه دسته بندیها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('subcategory.index') }}"><i class="fa fa-dashboard"></i>  زیرگروه دسته بندیها</a></li>
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
          <td>{{ $subcategory->id }}</td>
        </tr>
        <tr>
          <th>نام</th>
          <td>{{ $subcategory->name }}</td>
        </tr>
        <tr>
          <th>عنوان </th>
          <td>{{ $subcategory->title }}</td>
        </tr>
        <tr>
          <th>توضیحات </th>
          <td>{{ $subcategory->body }}</td>
        </tr>
        <tr>
          <th>-سرگروه-</th>
          <td>
            <?php
            $id=$subcategory->parent_id;
            $sub = \App\Models\Subcategory::where('id',$id)->first();
            ?>
            @if($id != 0)
            {{ $sub->title }}
            @else
            -سرگروه-
            @endif
          </td>
        </tr>
        <tr>
          <th>دسته بندی</th>
          <td>
            {{ $subcategory->category->name }}
          </td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection