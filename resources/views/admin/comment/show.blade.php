@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  کامنت ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('article.index') }}"><i class="fa fa-dashboard"></i>  کامنت ها</a></li>
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
          <td>{{ $comment->id }}</td>
        </tr>
        <tr>
          <th>متن کامنت  </th>
          <td>{{ $comment->comment }}</td>
        </tr>
        <tr>
          <th> محصول/مقاله</th>
          <td>
            @foreach($comment->products as $item) 
            {{ $item->name }},
            @endforeach
            @foreach($comment->articles as $item) 
            {{ $item->title }},
            @endforeach
          </td>
        </tr>
        <tr>
          <th>فرستنده</th>
          <td>{{ $comment->user->name }}</td>
        </tr> 
        <tr>
          <th>تاریخ ارسال</th>
          <td>{{ Verta::instance($comment->created_at)->format('Y/n/j') }}}</td>
        </tr> 
      
      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection