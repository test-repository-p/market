@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  لوگو</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('logo.index') }}"><i class="fa fa-dashboard"></i>  لوگو</a></li>
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
          <th style="width:50%">شماره   </th>
          <td>{{ $logo->id }}</td>
        </tr>
        <tr>
          <th>نام  </th>
          <td>{{ $logo->name }}</td>
        </tr>
        <tr>
          <th>ایمیل</th>
          <td>{{ $logo->title }}</td>
        </tr>
        <tr>
          <th>تصویر</th>
          <td>
            @if($logo->photos()->first())
            <img src="/{{ $logo->photos()->first()->path }}" style="width:260px;height:160px;height: auto;float: right;">
            @endif
          </td>
        </tr>
      

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection