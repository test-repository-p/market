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
       
          {!! Form::open(['method'=>'POST','route'=>'subcategory.store', 'class'=>'form-horizontal']) !!}
          @csrf
          <div class="box-body">
               
            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label"> دسته بندی </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="category_id" >
                @foreach ($categorys as $val)  
                <option value="{{ $val->id }}">{{ $val->title }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">  سرگروه   </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="parent_id" >
                <option value="0">سرگروه</option>
                @foreach ($subcategorys as $val)  
                <option value="{{ $val->id }}">{{ $val->category->title}}->{{ $val->title }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="form-group">
              {!! Form::label('body', 'توضیحات', ['class'=>'col-sm-2 control-label']) !!}
              <div class="col-sm-10">
                {!! Form::textarea('body', old('body') ,['class'=>'form-control','rows'=>3]) !!}
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
                <span class="btn btn-info" onclick="addSub()">افزودن زیرگروه</span>
              </label>

              <div class="col-sm-10" id="sub_holder">
              </div>

            </div>
          <div class="box-footer">
            {!! Form::submit('انصراف',['class'=>'btn btn-default']) !!}
            {!! Form::submit('ذخیره',['class'=>'btn btn-info pull-right']) !!}
          </div>
        
        {!! Form::close() !!}
      </div>
      </div>
</section>

@endsection
@section('script')
<script>
  function addSub(){
    var count = document.getElementsByClassName('sub_div').length+1;
     var txt ='<div style="margin:15px;" class="sub_div">'
        +'<input type="text" name="name['+count+']" placeholder="نام" style="margin-left:10px;">'
        +'<input type="text" name="title['+count+']" placeholder="عنوان" style="margin-left:10px;">'
        +'<select name="type['+count+']">'
        +'<option value="1">دکمه رادیویی</option>'
        +'<option value="2">انتخاب گررنگ</option>'
          +'</select>'
        +'</div>';
      $("#sub_holder").append(txt);
  }
</script> 
@endsection