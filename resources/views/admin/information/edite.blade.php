@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> اطلاعات تماس</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('information.index') }}"><i class="fa fa-dashboard"></i>   اطلاعات تماس</a></li>
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش اطلاعات تماس  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['information.update',$information->id],'class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              {!! Form::label('email', 'ایمیل  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('email',$information->email,['class'=>'form-control']) !!}
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
              {!! Form::label('address', 'آدرس  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('address', $information->address,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('address'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('address') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('telephone', 'تلفن  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('telephone', $information->telephone,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('telephone'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('telephone') }}</li>
              </div>
            </div>
            @endif

            

            <div class="box-footer">
              {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
              {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
            </div>



</section>
@endsection