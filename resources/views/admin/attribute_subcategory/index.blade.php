@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  زیرگروه دسته بندیها</li>
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
    <a class="btn btn-app bg-green" href="{{ Route('attributevalue.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  ویژگی ها</h3>

                    {{-- search box --}}
                    @if(request()->input('query'))
                    <h3 class="subtitle"> نتایج جستجو</h3>
                    <p>({{ $result->total() }} نتیجه برای {{ request()->input('query') }})</p>
                    @endif
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}" class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="Attribute_Subcategory"> 
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    {{-- //search box --}}

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ردیف</th>
                                <th>نام ویژگی  </th>
                                <th>مقدارویژگی  </th>
                                <th>نام سرگروه  </th>
                                <td>عملیات</td>
                                <td>عملیات</td>

                            </tr>
                            @foreach($attributes as $attribute)
                            @if($attribute->subcategories)
                            @foreach ($attribute->subcategories as $val)
                            <tr>
                                <td>{{ $val->pivot->id }}</td>
                                <td>
                                    <a  href="{{ url('admin/attributevalue/'.$val->pivot->id) }}">
                                    {{ $attribute->title }}</a>
                                </td>
                                <td>{{ $val->pivot->description }}</td>
                                <td>
                                  
                                    {{ $val->title }}
                                        
                                </td>
                             
                            <td>
                                <a class="btn btn-info mr-2" href="{{ url('admin/attributevalue/'.$val->pivot->id.'/edit') }}" >
                                <i class="fa fa-edit"></i> 
                                </a>
                            </td>
                            <td>
                                <form action="{{ url('admin/attributevalue/'.$val->pivot->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete')}}
                                <button type="submit" class="btn bg-red" >
                                    <i class="fa fa-trash"></i> 
                                </button>
                                </form>   
                            </td>
                            </tr>
                            @endforeach
                            @endif
                           @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $attributes->links() }}

            </div>
        </div>
    </div>
    
</section>

@endsection