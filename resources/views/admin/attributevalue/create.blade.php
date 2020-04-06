@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <h1>
        داشبرد
        <small>مقداردهی ویژگی ها</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li><a href="{{ Route('attributevalue.index') }}"><i class="fa fa-dashboard"></i> مقداردهی ویژگی ها</a></li>
        <li class="active"> افزودن</li>
    </ol>
</section>
@endsection

@section('content')

<section class="content">

      <div class="col-lg-8 connectedSortable ui-sortable">
        
        <div class="box-header with-border">
          <h3 class="box-title">افزودن مقدارویژگی</h3>
        </div>
       
          {!! Form::open(['method'=>'POST','route'=>'attributevalue.store', 'class'=>'form-horizontal']) !!}
          @csrf
          <div class="box-body">

            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">  سرگروه   </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="subcategory_id" >
                @foreach ($subcategorys as $val)  
                <option value="{{ $val->id }}">{{ $val->category->title}}->{{ $val->title }}</option>
                @endforeach
              </select>
              </div>
            </div>

            <div class="form-group">
              <label for="selectbox" class="col-sm-2 control-label">  ویژگی   </label>
              <div class="col-sm-10">
              <select class="form-control" id="selectbox" name="attribute_id" >
                @foreach ($attributes as $val)  
                <option value="{{ $val->id }}">{{ $val->title }}</option>
                @endforeach
              </select>
              </div>
            </div>

             
            <div class="form-group" >
              <label for="inputname" class="col-sm-2 control-label"> 
                <span class="btn btn-info" onclick="addSub()">افزودن مقدار</span>
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

        // +'<div class="form-group">'
        // +'<label for="image" style="text-align:center;" class="col-sm-2 control-label">تصویر</label>'
        // +'<div class="col-sm-10">'
        // +'<input type="file" id="image" name="image['+count+']" >'
        // +'</div>'
        // +'</div>'
        +'<div class="form-group">'
        +'<label for="value" style="text-align:center;" class="col-sm-2 control-label">مقدارجدید</label>'
        +'<div class="col-sm-10">'
        +'<input type="text" id="value" name="description['+count+']" placeholder="" style="margin-left:10px;text-align:center;">'
        +'</div>'
        +'</div>'
        +'</div>';

      $("#sub_holder").append(txt);
  }
</script> 
@endsection