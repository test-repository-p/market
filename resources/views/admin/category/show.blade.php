@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  دسته بندی ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('category.index') }}"><i class="fa fa-dashboard"></i>  دسته بندی ها</a></li>
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
          <th style="width:50%">شماره دسته بندی</th>
          <td>{{ $category->id }}</td>
        </tr>
        <tr>
          <th>نام </th>
          <td>{{ $category->name }}</td>
        </tr>
        <tr>
          <th>عنوان </th>
          <td>{{ $category->title }}</td>
        </tr>
        <tr>
          <th>کلمات کلیدی</th>
          <td>
            @foreach($category->tags as $tag) 
            {{ $tag->name }},
            @endforeach
          </td>
        </tr> 
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection