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
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش  اسلایدر  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['slider.update',$slider->id], 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              {!! Form::label('name', 'نام  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('name',$slider->name,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('name'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('name') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('url', 'لینک', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::text('url',$slider->url,['class'=>'form-control']) !!}
                </div>
              </div>
              @if($errors->has('url'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('url') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                @if($slider->photos()->first())
                <img src="/{{ $slider->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
                @endif
                {!! Form::file('image',['class'=>'form-control']) !!}
                </div>
              </div>
              @if($errors->has('image'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('image') }}</li>
              </div>
            </div>
            @endif

            <div class="box-footer">
              {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
              {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
            </div>



</section>
@endsection