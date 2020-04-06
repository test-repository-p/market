@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  کاربران</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('article.index') }}"><i class="fa fa-dashboard"></i>  کاربران</a></li>
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
          <td>{{ $article->id }}</td>
        </tr>
        <tr>
          <th>عنوان  </th>
          <td>{{ $article->title }}</td>
        </tr>
        <tr>
          <th>متن کوتاه</th>
          <td>{{ $article->demo }}</td>
        </tr>
        <tr>
          <th>فرستنده</th>
          <td>{{ $article->user->email }}</td>
        </tr> 
        <tr>
          <th>تاریخ ارسال</th>
          <td> {{ Verta::instance($article->created_at)->format('Y/n/j') }}</td>
        </tr> 
        <tr>
          <th>دسته بندی</th>
          <td>{{ $article->category->title }}</td>
        </tr>
        <tr>
          <tr>
            <th>کلمات کلیدی</th>
            <td>
              @foreach($article->tags as $tag) 
              {{ $tag->name }},
              @endforeach
            </td>
          </tr> 
          <th>متن</th>
          <td>{{ $article->text }}</td>
        </tr>

        <tr>
          <th>تصویر</th>
          <td>
            @if($article->photos()->first())
            <img src="/{{ $article->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
            @endif
          </td>
        </tr>
        

      </tbody>
    </table>
    </div>
  </div>

</section>
@endsection