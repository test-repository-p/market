@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> ویژگی ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('attribute.index') }}"><i class="fa fa-dashboard"></i>  ویژگی ها</a></li>
        <li class="active"> افزودن</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">افزودن  ویژگی جدید  </h3>
        </div>
       
          {!! Form::open(['method'=>'POST','route'=>'attribute.store', 'class'=>'form-horizontal']) !!}
          @csrf
          <div class="box-body">
            <div class="form-group">
              {!! Form::label('name', 'نام  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('name', old('name') ,['class'=>'form-control']) !!}
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

            <div class="box-body">
              <div class="form-group">
                {!! Form::label('title', 'عنوان  ', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                  {!! Form::text('title', old('title') ,['class'=>'form-control']) !!}
                </div>
              </div>
              @if($errors->has('title'))
              <div class="form-group">
                <label for="inputname" class="col-sm-2 control-label"> </label>
                <div class="col-sm-10">
                  <li class="form-control label-danger" id="inputname">{{ $errors->first('title') }}</li>
                </div>
              </div>
              @endif
           
            </div>
          <div class="box-footer">
            {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
            {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
          </div>
        
        {!! Form::close() !!}
      </div>
      
</section>

@endsection
