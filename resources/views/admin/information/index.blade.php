@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  اطلاعات تماس</li>
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
    <a class="btn btn-app bg-green" href="{{ Route('information.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">   نمایش اطلاعات تماس  وب سایت </h3>

                    <div class="box-tools">

                        <form class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="email" class="form-control pull-right" placeholder="جستجو">
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
                                <th>ایمیل</th>
                                <th>آدرس  </th>
                                <th> شماره تلفن</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($informations as $information)
                            <tr>
                                <td>{{ $information->id }}</td>
                                <td>
                                    <a  href="{{ route('information.show',['information'=>$information->id]) }}">{{ $information->email }}</a>
                                </td> 
                                <td>{{ $information->address }}</td>
                                <td>
                                    
                                    {{ $information->telephone }}
                                    
                                </td>                              
                                <td>
                                <a class="btn bg-blue" href="{{ route('information.edit',['information'=>$information->id]) }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                                </td>
                                <td>
                                <form action="{{ Route('information.destroy',['information'=>$information->id]) }}" method="post">
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
                {{ $informations->links() }}
            </div>
        </div>
    </div>
    
</section>
@endsection