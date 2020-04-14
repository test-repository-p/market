@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
  <h1>
    داشبرد
    <small> محصولات</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
    <li><a href="{{ Route('product.index') }}"><i class="fa fa-dashboard"></i> محصولات</a></li>
    <li class="active"> افزودن</li>
  </ol>
</section>
@endsection

@section('content')

<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <div class="col-lg-8 connectedSortable ui-sortable">

          <div class="box-header with-border">
            <h3 class="box-title">افزودن محصول </h3>
          </div>
          <div>
            @if($errors->any())
             @foreach ($errors->all() as $item)
              <p class="alert alert-danger"> {{ $item }}</p>
             @endforeach
             @endif
          </div>

          {!! Form::open(['method'=>'product','route'=>'product.store',
          'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          <div class="box-body">

            <div class="form-group">
              {!! Form::label('name', 'نام محصول', ['class'=>'col-sm-2 control-label']) !!}
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
              {!! Form::label('price', 'قیمت', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('price', old('price') ,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('price'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('price') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('discount', 'تخفیف', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('discount', old('discount') ,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('discount'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('discount') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              <div class="rating">
                <label for="inputrate" class="col-sm-2 control-label">امتیازدهی</label>
                <div class="col-sm-10">
                  <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1"
                    value="" data-size="xs">
                  {{-- <input type="hidden" name="id" required="" value="{{ $product->id }}"> --}}
                  {{-- <span class="review-no">422 reviews</span> --}}
                  <br />
                  {{-- <button class="btn btn-success">Submit Review</button> --}}
                </div>
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('category_id', ' دسته بندی', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                <select class="form-control" id="selectbox" name="category_id">
                  @foreach ($categorys as $val)
                  <option value="{{ $val->id }}">{{ $val->title }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            

            @foreach ($attributes as $attribute)
            <?php $id = $attribute->id;?>
            <div class="form-group">
              {!! Form::label('id', $attribute->title, ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                <select class="form-control" id="selectbox" name="id[{{$id}}]">
                  @foreach ($attribute->subcategories as $val)
                  <option value="{{ $val->pivot->id }}">
                    {{ $val->title }}->{{ $attribute->title }}->{{ $val->pivot->description }}
                  </option>
                  @endforeach
                </select>
              </div>
            </div>
            @endforeach

            <div class="form-group">
              {!! Form::label('count', 'تعداد', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('count', old('count') ,['class'=>'form-control']) !!}
              </div>
            </div>
            @if($errors->has('count'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('count') }}</li>
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

            <div class="form-group">
              {!! Form::label('status', 'وضعیت', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::checkbox('status',true ,['id'=>'selectbox']) !!}موجود
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('special', 'کالای ویژه', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::checkbox('special',true ,['id'=>'selectbox']) !!}ویژه
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::file('image',['id'=>'inputimage','class'=>'form-control']) !!}
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

      </div>
    </div>
  </div>

</section>
@endsection