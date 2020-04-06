@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> اطلاعات تماس</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('information.index') }}"><i class="fa fa-dashboard"></i>  اطلاعات تماس</a></li>
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
          <th style="width:50%">شماره   اطلاعات تماس</th>
          <td>{{ $information->id }}</td>
        </tr>
        <tr>
          <th>ایمیل </th>
          <td>{{ $information->email }}</td>
        </tr>
        <tr>
          <th>آدرس </th>
          <td>{{ $information->address }}</td>
        </tr>
        <tr>
          <th>تلفن</th>
          <td>
            {{ $information->telephone }}
          </td>
        </tr> 
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection