@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> سطوح دسترسی</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('user.index') }}"><i class="fa fa-dashboard"></i>  کاربران</a></li>
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش  کاربر  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['user.update',$user->id], 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              {!! Form::label('name', 'نام  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
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
              {!! Form::label('email', 'ایمیل', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::text('email',$user->email,['class'=>'form-control']) !!}
                </div>
              </div>
              @if($errors->has('email'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('email') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">سطح دسترسی </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="role_id[]" multiple>
                @foreach ($roles as $role)  
                <option value="{{ $role->id }}">{{ $role->title }}</option>
                @endforeach
              </select>
              </div>
            </div>
                 
            <div class="form-group">
              {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                @if($user->photos()->first())
                <img src="/{{ $user->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
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