@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> سطوح دسترسی</li>
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
    <a class="btn btn-app bg-green" href="{{ Route('role.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>
    <form action="" style="float:left">
        <input type="text" name="name" placeholder="جستجوبراساس نام...">
        <input type="text" name="title" placeholder="جستجوبراساس عنوان...">
      
        <input type="submit" class="btn btn-default" value="جستجو">
      </form>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست سطوح دسترسی وب سایت </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ردیف</th>
                                <th>نام سطح دسترسی</th>
                                <th>عنوان </th>
                                <th>دسترسی ها </th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td><a  href="{{ route('role.show',['role'=>$role->id]) }}">{{ $role->name }}</a>
                                </td>
                                <td>{{ $role->title }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                    ({{ $permission->title }}),
                                    @endforeach
                                </td>
                   
                                <td>
                                <a class="btn bg-blue" href="{{ route('role.edit',['role'=>$role->id]) }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                                </td>
                                <td>
                                <form action="{{ Route('role.destroy',['role'=>$role->id]) }}" method="post">
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
                {{ $roles->links() }}
            </div>
        </div>
    </div>
    
</section>
@endsection