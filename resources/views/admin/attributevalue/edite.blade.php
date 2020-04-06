@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
  <h1>
    داشبرد
    <small> مقداردهی ویژگی ها </small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
    <li><a href="{{ Route('attributevalue.index') }}"><i class="fa fa-dashboard"></i> مقداردهی ویژگی ها </a></li>
    <li class="active"> ویرایش</li>
  </ol>
</section>
@endsection

@section('content')

<section class="content">

  <div class="col-lg-8 connectedSortable ui-sortable">

    <div class="box-header with-border">
      <h3 class="box-title">ویرایش شماره {{$att_sub->id}} </h3>
    </div>

    {!! Form::open(['method'=>'POST','route'=>['attributevalue.update',$att_sub->id],'class'=>'form-horizontal']) !!}
    @csrf
    @method('PATCH')
    <div class="box-body">

      <div class="form-group">
        <label for="selectbox" class="col-sm-2 control-label">سرگروه ها </label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" value="<?php
                foreach ($subcategorys as $val){
                 if($att_sub->subcategory_id==$val->id){
                   echo $val->title;
                 }
                }
                 ?>">

        </div>
      </div>

      <div class="form-group">
        <label for="selectbox" class="col-sm-2 control-label"> ویژگی </label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control" value="<?php
                foreach ($attributes as $val){
                 if($att_sub->attribute_id==$val->id){
                   echo $val->title;
                 }
                }
                 ?>">

        </div>
      </div>

      <div class="form-group">
        <label for="inputname" class="col-sm-2 control-label">
          مقدار
        </label>
        <div class="col-sm-10">
          <input type="text" value="{{ $att_sub->description }}" class="form-control" name="description">
        </div>
      </div>

      @if($errors->has('description'))
      <div class="form-group">
        <label for="inputname" class="col-sm-2 control-label"> </label>
        <div class="col-sm-10">
          <li class="form-control label-danger" id="inputname">{{ $errors->first('description') }}</li>
        </div>
      </div>
      @endif
    </div>

    <div class="box-footer">
      {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
      {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
    </div>
  </div>

</section>
@endsection