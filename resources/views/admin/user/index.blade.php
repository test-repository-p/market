@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  کاربران</li>
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
    <a class="btn btn-app bg-green" href="{{ Route('user.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  کاربران وب سایت </h3>

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
                                <th>ایمیل </th>
                                <th>تصویر</th>
                                <th>سطح دسترسی ها </th>
                                <th>ویرایش سطح دسترسی</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><a  href="{{ route('user.show',['user'=>$user->id]) }}">{{ $user->name }}</a>
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->photos()->first())
                                    <img src="/{{ $user->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
                                    @endif
                                </td>
                                <td>
                                    @foreach ($user->roles as $role)
                                    ({{ $role->title }}),
                                    @endforeach
                                </td>
                   
                                <td>
                                <a class="btn bg-blue" href="{{ route('user.edit',['user'=>$user->id]) }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                                </td>
                                <td>
                                <form action="{{ Route('user.destroy',['user'=>$user->id]) }}" method="post">
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
    
</section>
@endsection