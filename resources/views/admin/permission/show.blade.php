@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  دسترسی</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('permission.index') }}"><i class="fa fa-dashboard"></i>  دسترسی</a></li>
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
          <th style="width:50%">شماره  دسترسی</th>
          <td>{{ $permission->id }}</td>
        </tr>
        <tr>
          <th>نام  دسترسی</th>
          <td>{{ $permission->name }}</td>
        </tr>
        <tr>
          <th>عنوان</th>
          <td>{{ $permission->title }}</td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection