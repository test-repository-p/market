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
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش محصول  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['product.update',$product->id], 'enctype'=>'multipart/form-data','class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              {!! Form::label('name', 'نام محصول', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::text('name',$product->name,['class'=>'form-control']) !!}
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
                {!! Form::text('price',$product->price,['class'=>'form-control']) !!}
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
                {!! Form::text('discount',$product->discount,['class'=>'form-control']) !!}
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
              {!! Form::label('body', 'توضیحات', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                {!! Form::textarea('body', old('body') ,['class'=>'form-control','rows'=>3]) !!}
                </div>
              </div>


              <div class="form-group">
                {!! Form::label('count', 'تعداد', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                  {!! Form::text('count',$product->count,['class'=>'form-control']) !!}
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
              {!! Form::label('status', 'وضعیت', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                  {!! Form::select('status', ['0' => 'ناموجود', '1' => 'موجود'],$product->status,['class'=>'form-control']); !!}
                </div>
              </div>

              <div class="form-group">
              {!! Form::label('special', 'کالای ویژه', ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                  {!! Form::select('special', ['0' => 'غیرویژه', '1' => 'ویژه'],$product->special,['class'=>'form-control']); !!}
                
                </div>
              </div>
               
              <div class="form-group">
                {!! Form::label('category_id', 'دسته بندی', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                  <select class="form-control" id="selectbox" name="category_id">
                    @foreach ($categorys as $category)  
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  {!! Form::label('tag_id', ' کلمات کلیدی', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      <strong>
                        @foreach($product->tags as $tag) 
                        {{ $tag->name }},
                        @endforeach
                      </strong>
                      
                    <select class="form-control" id="selectbox" name="tag_id[]" multiple>
                      @foreach ($tags as $tag)  
                      <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                      @endforeach
                    </select>
                    </div>
                  </div>
              
                <div class="form-group">
                {!! Form::label('image', 'تصویر', ['class'=>'col-sm-2 control-label']) !!}
                  <div class="col-sm-10">
                  <img src="/{{ $product->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
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



</section>
@endsection