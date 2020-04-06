@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>    بویژگی ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('attribute.index') }}"><i class="fa fa-dashboard"></i>    ویژگی ها</a></li>
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
          <td>{{ $attribute->id }}</td>
        </tr>
        <tr>
          <th>نام</th>
          <td>{{ $attribute->name }}</td>
        </tr>
        <tr>
          <th>عنوان </th>
          <td>{{ $attribute->title }}</td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection