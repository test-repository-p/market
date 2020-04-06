@extends('site.layouts.app')

@section('title')
<title>سبدخرید </title>
@endsection

@section('title-content')
     <!-- Breadcrumb Start-->
     <ul class="breadcrumb">
      <li><a href="index.html"><i class="fa fa-home"></i></a></li>
      <li><a href="cart.html">سبد خرید</a></li>
  </ul>
  <!-- Breadcrumb End-->
@endsection

@section('content')
<div id="content" class="col-sm-12">
  <h1 class="title">سبد خرید</h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td class="text-center">تصویر</td>
            <td class="text-left">نام محصول</td>
            <td class="text-left">تعداد</td>
            <td class="text-left">حذف</td>
            <td class="text-right">قیمت واحد</td>
            <td class="text-right">کل</td>
          </tr>
        </thead>
        <tbody>
            @if (count($checkouts)==0)
            سبدخرید شماخالی است
            @else   
            @foreach ($checkouts as $item)
            <tr>
            <td class="text-center"><a href="{{ route('product.show',['product'=>$item->product->id]) }}"><img src="/{{ $item->product->photos()->first()->path }}"width="50px"  alt="{{ $item->product->name }}" title="{{ $item->product->name }}" class="img-thumbnail" /></a></td>
                <td class="text-left"><a href="{{ route('product.show',['product'=>$item->product->id]) }}"> {{ $item->product->name }}</a><br />
                  </td>
                <td class="text-left">
                  <div class="input-group btn-block quantity">
                  <input type="text" name="count" value="{{ $item->count }}" size="1" id="count"  class="form-control" />
                 
                   
                      <a href="{{ route('basket.update',$item->id) }}" data-toggle="tooltip" title="بروزرسانی" style="font-size: 0.8em;" id="updateB" class="btn-outline-danger py-0" data-id="{{ $item->id }}">
                     به روزرسانی<i class="fa fa-refresh"></i>
                      </a>
                      {{-- <span class="input-group-btn">
                      <button type="button" class="btn btn-primary" data-toggle="tooltip" title="بروزرسانی" onClick="">
                          <i class="fa fa-refresh"></i>
                      </button>
                      </span> --}}
              </div>
            </td>
                   <td>
                    <button type="button" data-toggle="tooltip" title="حذف" class="btn btn-danger" onClick="">
                      <a href="{{ route('basket.destroy',$item->id) }}" class="btn-outline-danger py-0" style="font-size: 0.8em;" id="deleteB" data-id="{{ $item->id }}"> 
                     </a>
                     <i class="fa fa-times-circle"></i>
                      </button>
                  
                </td>
                <td class="text-right">{{ number_format($item->price) }} تومان</td>
                <td class="text-right">{{ number_format($item->price*$item->count) }} تومان</td>
            @endforeach
            @endif

          
          </tr>
          <script>

            $(document).ready(function () {

            $("#deleteB").click(function(e){

            if(!confirm("آیابرای حذف محصول ازسبدخریداطمینان دارید?")) {
            return false;
            }

            e.preventDefault();
            var id = $(this).data("id");
            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax(
                {
                url: url.href, //or you can use url: "company/"+id,
                type: 'DELETE',
                data: {
                    _token: token,
                        id: id
                },
                success: function (response){

                    $("#success").html(response.message)

                    Swal.fire(
                    'پیام موفقیت',
                    'محصول انتخاب شده باموفقیت ازسبدخریدحذف شد!',
                    'success'
                    )
                }
            });
            return false;
            });

            
            $("#updateB").click(function(e){

            if(!confirm("آیابرای تغییرتعداد محصول درسبدخریداطمینان دارید?")) {
            return false;
            }

            e.preventDefault();
            var id = $(this).data("id");
            var count = $('#count').val();

            // var id = $(this).attr('data-id');
            var token = $("meta[name='csrf-token']").attr("content");
            var url = e.target;

            $.ajax(
                {
                url: url.href, //or you can use url: "company/"+id,
                type: 'PATCH',
                data: {
                    _token: token,
                        id: id,
                        count: count
                },
                success: function (response){

                    $("#success").html(response.message)

                    Swal.fire(
                    'پیام موفقیت',
                    'محصول انتخاب شده باموفقیت به روزرسانی شد!',
                    'success'
                    )
                }
            });
            return false;
            });



            });

    </script>
        </tbody>
      </table>
    </div>
 
  
  <div class="row">
    <div class="col-sm-4 col-sm-offset-8">
      <table class="table table-bordered">
        <tr>
          <td class="text-right"><strong>جمع کل:</strong></td>
          <td class="text-right">{{ number_format($sum) }} تومان</td>
        </tr>
       
        <tr>
          <td class="text-right"><strong>قابل پرداخت :</strong></td>
          <td class="text-right">{{ number_format($sum) }} تومان</td>
        </tr>
      </table>
    </div>
  </div>
  <div class="buttons">
    <div class="pull-left"><a href="{{ route('index') }}" class="btn btn-default">ادامه خرید</a></div>
    <div class="pull-right"><a href="{{ route('checkout.index') }}" class="btn btn-primary">تسویه حساب</a></div>
  </div>
</div>
@endsection