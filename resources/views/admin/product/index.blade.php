@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> محصولات</li>
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

    {{-- @if(session()->has('msg'))
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-success">
        یک پیام دارید
    </button>
    <div class="modal modal-info fade" id="modal-success">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> پیغام</h4>
                </div>
                <div class="modal-body">
                    <p>
                        {{ session('msg')}}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">خروج</button>
                </div>
            </div>
        </div>
    </div>
    @endif --}}

    
    <div class="col-md-9">
    <a class="btn btn-app bg-green" href="{{ Route('product.create') }}">
        <i class="fa fa-save "></i> افزودن
    </a>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست محصولات وب سایت </h3>

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
                                <th>نام محصول</th>
                                <th>قیمت </th>
                                <th>تعدادموجود</th>
                                <th>تخفیف</th>
                                <th>تصویر</th>
                                <th>گالری تصاویر</th>
                                <th>ویرایش</th>
                                <th>حذف</th>
                            </tr>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><a  href="{{ route('product.show',['product'=>$product->id]) }}">{{ $product->name }}</a>
                                </td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->count }}</td>
                                <td><span class="label label-success">{{ $product->discount }}%</span></td>
                                <td>
                                    @if($product->photos()->first())
                                    <img src="/{{ $product->photos()->first()->path }}" style="max-width:60px;max-height:60px;height: auto;float: right;">
                                    @endif
                                </td>
                                <td>
                                    <a class="btn  bg-blue" href="{{url('admin/product/viewgallery/'.$product->id)}}">
                                        <i class="fa fa-info-circle"></i>  
                                    </a>
                                </td>

                               <!-------------sath dastresi ------------------>
                                    @can('view',$product)
                                <td>
                                    <a class="btn bg-blue" href="{{ route('product.edit',['product'=>$product->id]) }}" >
                                    <i class="fa fa-edit"></i> 
                                    </a>
                                </td>
                                <td>
                                    <form action="{{ Route('product.destroy',['product'=>$product->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('delete')}}
                                    <button type="submit" class="btn bg-red" >
                                        <i class="fa fa-trash"></i> 
                                    </button>
                                </form>   
                                </td>
                                    @endcan
                                    @cannot('view',$product)
                                    <td>
                                    <a class="btn bg-blue" href="{{ route('product.edit',['product'=>$product->id]) }}" disabled>
                                    <i class="fa fa-edit"></i> 
                                    </a>
                                    </td>
                                    <td>
                                    <form action="{{ Route('product.destroy',['product'=>$product->id]) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('delete')}}
                                    <button type="submit" class="btn bg-red" disabled>
                                        <i class="fa fa-trash"></i> 
                                    </button>
                                    </form>   
                                    </td>  
                                    @endcannot

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
    
</section>
@endsection