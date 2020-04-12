@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  اسلایدرها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('slider.index') }}"><i class="fa fa-dashboard"></i>  اسلایدرها</a></li>
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
          <th style="width:50%">شماره اسلایدر  </th>
          <td>{{ $slider->id }}</td>
        </tr>
        <tr>
          <th>نام  </th>
          <td>{{ $slider->name }}</td>
        </tr>
        <tr>
          <th>لینک</th>
          <td>{{ $slider->url }}</td>
        </tr>
        <tr>
          <th>تصویر</th>
          <td>
            @if($slider->photos()->first())
            <img src="/{{ $slider->photos()->first()->path }}" style="width:360px;height:260px;height: auto;float: right;">
            @endif
          </td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection