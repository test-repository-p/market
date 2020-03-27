@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  کلمات کلیدی</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('tag.index') }}"><i class="fa fa-dashboard"></i>  کلمات کلیدی</a></li>
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
          <td>{{ $tag->id }}</td>
        </tr>
        <tr>
          <th>نام</th>
          <td>{{ $tag->name }}</td>
        </tr>
        
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection