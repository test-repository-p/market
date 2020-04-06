@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  کامنت ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('comment.index') }}"><i class="fa fa-dashboard"></i>  کامنت ها</a></li>
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش  کامنت  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['comment.update',$comment->id], 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">

            <div class="form-group">
              {!! Form::label('comment', '  کامنت', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::textarea('comment', $comment->comment ,['class'=>'form-control','rows'=>3]) !!}
                </div>
              </div>
              @if($errors->has('comment'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('comment') }}</li>
              </div>
            </div>
            @endif
               
            @if($comment->products()->first())
            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">  محصول </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="commentable_id" >
                <option value="">انتخاب کنید...</option>
                @foreach ($products as $item)  
                <option value="{{ $item->id }}" <?php if($item->id==$comment->products()->first()->id) echo "selected"; ?>>{{ $item->name }}</option>
                @endforeach
              </select>
              </div>
            </div>
            @if($errors->has('commentable_id'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('commentable_id') }}</li>
              </div>
            </div>
            @endif
            @endif


            @if($comment->articles()->first())
            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">  مقاله </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="commentable_id" >
                <option value="">انتخاب کنید...</option>
                @foreach ($articles as $item)  
                <option value="{{ $item->id }}" <?php if($item->id==$comment->articles()->first()->id) echo "selected"; ?>>{{ $item->title }}</option>
                @endforeach
              </select>
              </div>
            </div>
            @if($errors->has('commentable_id'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('commentable_id') }}</li>
              </div>
            </div>
            @endif
            @endif


            <div class="box-footer">
              {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
              {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
            </div>



</section>
@endsection