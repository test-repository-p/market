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
          <th>تصویر</th>
          <td>
            @if($subcategory->photos()->first())
            <img src="/{{ $subcategory->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
            @endif
          </td>
        </tr>
        <tr>
          <th>سرگروه</th>
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