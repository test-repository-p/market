@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  مقالات</li>
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
    <a class="btn btn-app bg-green" href="{{ Route('article.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  مقالات وب سایت </h3>

                    <div class="box-tools">
                        <form class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="title" class="form-control pull-right" placeholder="جستجو">
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
                                <th>عنوان  </th>
                                <th>دسته بندی </th>
                                <th>تاریخ ارسال</th>
                                <th>نام فرستنده</th>
                                <th>تصویر </th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td><a  href="{{ route('article.show',['article'=>$article->id]) }}">{{ $article->title }}</a>
                                </td>
                                <td>{{ $article->category->title }}</td>
                                <td>
                                    {{ Verta::instance($article->created_at)->format('Y/n/j') }}
                                 </td>
                                 <td>
                                    {{ $article->user->email}}
                                 </td>
                                <td>
                                    @if($article->photos()->first())
                                    <img src="/{{ $article->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
                                    @endif
                                </td>
                                
                   
                                <td>
                                <a class="btn bg-blue" href="{{ route('article.edit',['article'=>$article->id]) }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                                </td>
                                <td>
                                <form action="{{ Route('article.destroy',['article'=>$article->id]) }}" method="post">
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
                {{ $articles->links() }}
            </div>
        </div>
    </div>
    
</section>
@endsection