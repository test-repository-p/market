@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  کاربران</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('user.index') }}"><i class="fa fa-dashboard"></i>  کاربران</a></li>
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
          <th style="width:50%">شماره کاربر  </th>
          <td>{{ $user->id }}</td>
        </tr>
        <tr>
          <th>نام  </th>
          <td>{{ $user->name }}</td>
        </tr>
        <tr>
          <th>ایمیل</th>
          <td>{{ $user->email }}</td>
        </tr>
        <tr>
          <th>تصویر</th>
          <td>
            @if($user->photos()->first())
            <img src="/{{ $user->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
            @endif
          </td>
        </tr>
        <tr>
          <th>سطح دسترسی ها</th>
          <td>
            @foreach ($user->roles as $role)
            ({{ $role->title }}),
            @endforeach
          </td>
        </tr>

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection