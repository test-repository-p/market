@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  کامنت ها</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">

    {{-- <div class="col-md-9  " id="msg">
        <div class="box box-info box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">پیام جدید</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body" id="success">

          </div>
        </div>
      </div> --}}
     

    <div class="col-md-9">      
        <a href="javascript:void(0)" class="btn btn-app bg-green float-right" id="create-new-value">
            <i class="fa fa-save "></i> افزودن
        </a> 
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  کامنت های  محصولات </h3>

                  
                    {{-- search box --}}
                    @if(request()->input('query'))
                    <h3 class="subtitle"> نتایج جستجو</h3>
                    <p>({{ $result->total() }} نتیجه برای {{ request()->input('query') }})</p>
                    @endif
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}" class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="Comment"> 
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    {{-- //search box --}}

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                <table class="table table-hover" id="laravel_crud">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>متن کامنت  </th>
                            <th>نام محصول</th>
                            <th>  کاربر</th>
                            {{-- <th>تاریخ کامنت</th>    --}}
                            <td colspan="2">عملیات</td>
                        </tr>
                    </thead>
                    <tbody id="values-crud">
                        @foreach($result as $u_info)
                        <tr id="value_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>
                                <a  href="{{ route('comment.show',['comment'=>$u_info->id]) }}">{{ $u_info->comment }}</a>
                            </td>

                            <td>
                                    @foreach($u_info->products as $item) 
                                    {{ $item->name }},
                                    @endforeach
                                    @foreach($u_info->articles as $item) 
                                    {{ $item->title }},
                                    @endforeach
                                </td>
                                <td>
                                    {{ $u_info->user->name}}
                                 </td> 
                                 {{-- <td>
                                    {{ Verta::instance($u_info->created_at)->format('Y/n/j') }}
                                 </td> --}}
                                
                            <td colspan="2">
                                <a href="javascript:void(0)" id="edit-value" data-id="{{ $u_info->id }}" class="btn btn-info mr-2">
                                    <i class="fa fa-edit"></i> 
                                </a> &nbsp;
                                <a href="javascript:void(0)" id="delete-value" data-id="{{ $u_info->id }}" class="btn btn-danger delete-value">
                                    <i class="fa fa-trash"></i> 
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                {{ $result->appends(request()->input())->links() }}


            </div>
        </div>
    </div>
     
    
</section>
@endsection
    

@section('modol')
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">

    <div class="alert" id="msg_div" style="display:none">
        <span id="res_message"></span>
      </div>

      {{-- <span class="text-danger">{{ $errors->first('product_id') }}</span> --}}

    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="valueCrudModal"></h4>
          </div>
          <form id="valueForm" name="valueForm" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="value_id" id="value_id">
                <div class="form-group">
                  <label for="comment" class="col-sm-1 control-label">متن کامنت</label>
                  <div class="col-sm-12">
                      <textarea class="form-control" name="comment" id="comment" cols="30" rows="3" value="" maxlength="50" ></textarea>
                      <span class="text-danger">{{ $errors->first('comment') }}</span>
                  </div>
                </div>
                <?php $products = App\Models\Product::get(); ?>
            
                <div class="form-group">
                    <label class="col-sm-2 control-label">محصول</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="product_id" name="product_id" >
                        <option value="">انتخاب کنید...</option>
                        @foreach ($products as $val)  
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <label class="col-sm-2 control-label">مقاله</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="article_id" name="article_id" >
                         <option value="">انتخاب کنید...</option>
                        @foreach ($articles as $val)  
                        <option value="{{ $val->id }}">{{ $val->title }}</option>
                        @endforeach
                        </select>
                    </div>
                </div> --}}

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="btn-save" value="افزودن">
                  ذخیره تغییرات 
                </button>
            </div>
          </form>
      </div>
    </div>
  </div>
@endsection


@section('script-footer')
<script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      /*  When value click add value button */
      $('#create-new-value').click(function () {
        $('#msg_div').empty();
        $('#msg_div').removeClass('alert-danger');

          $('#btn-save').val("create-value");
          $('#valueForm').trigger("reset");
          $('#valueCrudModal').html(" افزودن  کامنت جدید");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click edit value */
      $('body').on('click', '#edit-value', function () {
        var value_id = $(this).data('id');
        $.get("{{ url('admin/comment')}}"+'/' + value_id +'/edit', function (data) {
            $('#msg_div').empty();
            $('#msg_div').removeClass('alert-danger');

           $('#valueCrudModal').html("ویرایش  کامنت ");
            $('#btn-save').val("edit-value");
            $('#ajax-crud-modal').modal('show');
            $('#value_id').val(data.id);
            $('#comment').val(data.comment);

        })
     });
     //delete value login
      $('body').on('click', '.delete-value', function () {
          var value_id = $(this).data("id");
          if(confirm("آیاکامنت  انتخاب شده حذف شود !")) {
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/comment')}}"+'/'+value_id,
              success: function (data) {
                // location.reload(true);
                  $("#value_id_" + value_id).remove();
                window.location.reload();

              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
         }
      });   
    });
   
   if ($("#valueForm").length > 0) {
        $("#valueForm").validate({
   
       submitHandler: function(form) {
   
        var actionType = $('#btn-save').val();
        $('#btn-save').html('ارسال..');
        
        $.ajax({
            data: $('#valueForm').serialize(),
            url: "{{ url('admin/comment')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#msg_div').empty();
                // $('#send_form').html('Submit');
          if(data.arr.status){
            //   $('#res_message').html(data.arr.msg);
              $('#msg_div').removeClass('alert-danger');
            //   $('#msg_div').addClass('alert-success');
              $('#msg_div').show();
              $('#res_message').show();
          }else{
            //   $('#res_message').html(data.arr.msg);
            //   $('#msg_div').removeClass('alert-success');
              $('#msg_div').addClass('alert-danger');
              $('#msg_div').show();
              $('#res_message').show();
            jQuery('.alert-danger').append('<p>'+data.arr.msg+'</p>');
              jQuery.each(data.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		});
          }

          


              
                var value = '<tr id="value_id_' + data.comment.id + '"><td>' + data.comment.id + '</td><td> <a  href="/admin/attribute/' + data.comment.id + '">' + data.comment.comment + '</a></td><td>'+ data.product.name + '</td><td>'+ data.user.name + '</td>';                                                      

                value += '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' + data.comment.id + '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                  value += ' <a href="javascript:void(0)" id="delete-value" data-id="' + data.comment.id + '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                
                if (actionType == "create-value") {
                    $('#values-crud').prepend(value);
                } else {
                    $("#value_id_" + data.comment.id).replaceWith(value);
                }
   
                $('#valueForm').trigger("reset");

                $('#ajax-crud-modal').modal('hide');

                $('#btn-save').html('درحال ارسال... ');

                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('ارور... ');
            }
        });
      }
    })
  }
     
    
  </script>
@endsection












