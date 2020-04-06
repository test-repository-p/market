@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>  مقالات</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('article.index') }}"><i class="fa fa-dashboard"></i>  مقالات</a></li>
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش  مقاله  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['article.update',$article->id], 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              {!! Form::label('title', 'عنوان  ', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('title',$article->title,['class'=>'form-control']) !!}
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

            <div class="form-group">
              {!! Form::label('demo', 'متن کوتاه', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::text('demo',$article->demo,['class'=>'form-control']) !!}
                </div>
              </div>
              @if($errors->has('demo'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('demo') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('text', ' متن بلند', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::textarea('text', $article->text ,['class'=>'form-control','rows'=>3]) !!}
                </div>
              </div>
              @if($errors->has('text'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('text') }}</li>
              </div>
            </div>
            @endif
               
            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label"> دسته بندی </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="category_id" >
                @foreach ($categorys as $item)  
                <option value="{{ $item->id }}" <?php if($item->id==$article->id) echo "selected"; ?>>{{ $item->title }}</option>
                @endforeach
              </select>
              </div>
            </div>
            @if($errors->has('category_id'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('category_id') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('tag_id', ' کلمات کلیدی', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                <select class="form-control" id="selectbox" name="tag_id[]" multiple>
                  @foreach ($tags as $tag)  
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                  @endforeach
                </select>
                </div>
              </div>
              @if($errors->has('tag_id'))
              <div class="form-group">
                <label for="inputname" class="col-sm-2 control-label"> </label>
                <div class="col-sm-10">
                  <li class="form-control label-danger" id="inputname">{{ $errors->first('tag_id') }}</li>
                </div>
              </div>
              @endif
                 
            <div class="form-group">
              {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                @if($article->photos()->first())
                <img src="/{{ $article->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
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