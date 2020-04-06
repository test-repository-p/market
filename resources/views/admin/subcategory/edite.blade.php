@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small> زیرگروه دسته بندیها </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('subcategory.index') }}"><i class="fa fa-dashboard"></i>  زیرگروه دسته بندیها</a></li>
        <li class="active"> ویرایش</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">ویرایش  {{$subcategory->title}}  </h3>
        </div>
       
        {!! Form::open(['method'=>'POST','route'=>['subcategory.update',$subcategory->id],'class'=>'form-horizontal']) !!}
          @csrf
          @method('PATCH')
          <div class="box-body">


            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label"> دسته بندی </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="category_id" >
                @foreach ($categorys as $val)  
                <option value="{{ $val->id }}" <?php if($subcategory->category_id==$val->id){echo "selected";}?>>{{ $val->title }}</option>
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
              <label for="selectbox" class="col-sm-2 control-label">  سرگروه   </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="parent_id" >
                <option value="0"  <?php if($subcategory->parent_id==0){echo "selected";}?>>سرگروه</option>
                @foreach ($subcategorys as $val)  
                <option value="{{ $val->id }}"  <?php if($subcategory->parent_id==$val->id){echo "selected";}?>>{{ $val->category->title}}->{{ $val->title }}</option>
                @endforeach
              </select>
              </div>
            </div>
            @if($errors->has('parent_id'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('parent_id') }}</li>
              </div>
            </div>
            @endif

            <div class="form-group">
              {!! Form::label('body', 'توضیحات', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::textarea('body', $subcategory->body ,['class'=>'form-control','rows'=>3]) !!}
              </div>
            </div>
            @if($errors->has('body'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('body') }}</li>
              </div>
            </div>
            @endif


             
            <div class="form-group" >
              <label for="inputname" class="col-sm-2 control-label"> 
              &nbsp; 
              </label>
              <div class="col-sm-10" id="sub_holder">
                <input type="text" value="{{ $subcategory->name }}" name="name"  style="margin-left:10px;">
                 <input type="text" value="{{ $subcategory->title }}" name="title"  style="margin-left:10px;">
                 <select name="type">
                 <option value="1" <?php if($subcategory->type==1){echo "selected";}?>>دکمه رادیویی</option>
                 <option value="2" <?php if($subcategory->type==2){echo "selected";}?>>انتخاب گررنگ</option>
                   </select>
                 </div>

                 @if($errors->has('name'))
                 <div class="form-group">
                   <label for="inputname" class="col-sm-2 control-label"> </label>
                   <div class="col-sm-10">
                     <li class="form-control label-danger" id="inputname">{{ $errors->first('name') }}</li>
                   </div>
                 </div>
                 @endif
                 @if($errors->has('title'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('title') }}</li>
              </div>
            </div>
            @endif
            @if($errors->has('type'))
            <div class="form-group">
              <label for="inputname" class="col-sm-2 control-label"> </label>
              <div class="col-sm-10">
                <li class="form-control label-danger" id="inputname">{{ $errors->first('type') }}</li>
              </div>
            </div>
            @endif

            </div>
                 

            <div class="box-footer">
              {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
              {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
            </div>



</section>
@endsection