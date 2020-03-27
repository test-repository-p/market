@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> سطوح دسترسی</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('role.index') }}"><i class="fa fa-dashboard"></i> سطوح دسترسی</a></li>
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
          <th style="width:50%">شماره سطح دسترسی</th>
          <td>{{ $role->id }}</td>
        </tr>
        <tr>
          <th>نام سطح دسترسی</th>
          <td>{{ $role->name }}</td>
        </tr>
        <tr>
          <th>عنوان</th>
          <td>{{ $role->title }}</td>
        </tr>
        <tr>
          <th>دسترسی ها</th>
          <td>
            @foreach ($role->permissions as $permission)
            ({{ $permission->title }}),
            @endforeach
            </td>
          </td>
        </tr>
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection