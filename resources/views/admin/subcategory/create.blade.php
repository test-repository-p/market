@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  زیرگروه دسته بندیها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('subcategory.index') }}"><i class="fa fa-dashboard"></i>زیرگروه دسته بندیها</a></li>
        <li class="active"> افزودن</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">افزودن  زیرگروه جدید  </h3>
        </div>
       
          {!! Form::open(['method'=>'POST','route'=>'subcategory.store', 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
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

               
            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label"> سرگروه </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="category_id" >
                @foreach ($categorys as $val)  
                <option value="{{ $val->id }}">{{ $val->name }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
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
        
        {!! Form::close() !!}
      </div>
      </div>



</section>
@endsection