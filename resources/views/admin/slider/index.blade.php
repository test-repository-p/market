@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  اسلایدرها</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">

    @if(session()->has('msg'))
    <div class="col-md-9">
        <div class="box box-info box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">پیام جدید</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
            <!-- /.box-tools -->
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            {{ session('msg')}} 
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      @endif

    <div class="col-md-9">
    <a class="btn btn-app bg-green" href="{{ Route('slider.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  اسلایدرها وب سایت </h3>

                    <div class="box-tools">
                        <form class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="name" class="form-control pull-right" placeholder="جستجو">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ردیف</th>
                                <th>نام  </th>
                                <th>لینک </th>
                                <th>تصویر</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td><a  href="{{ route('slider.show',['slider'=>$slider->id]) }}">{{ $slider->name }}</a>
                                </td>
                                <td>{{ $slider->url }}</td>
                                <td>
                                    @if($slider->photos()->first())
                                    <img src="/{{ $slider->photos()->first()->path }}" style="width:160px;max-height:60px;height: auto;float: right;">
                                    @endif
                                </td>
                                
                                <td>
                                <a class="btn bg-blue" href="{{ route('slider.edit',['slider'=>$slider->id]) }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                                </td>
                                <td>
                                <form action="{{ Route('slider.destroy',['slider'=>$slider->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete')}}
                                <button type="submit" class="btn bg-red" >
                                    <i class="fa fa-trash"></i> 
                                </button>
                                </form>   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
    
</section>
@endsection