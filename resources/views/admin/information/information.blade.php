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

<div class="col-md-9">
    <div class="box box-info box-solid">
      <div class="box-header with-border">
        <h3 class="box-title"> نکته</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        فقط آن اطلاعاتی که قصددارید درسایت نمایش داده شود رافعال کنید
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>


    <div class="col-md-9">      
        <a href="javascript:void(0)" class="btn btn-app bg-green float-right" id="create-new-value">
            <i class="fa fa-save "></i> افزودن
        </a> 
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">   نمایش اطلاعات تماس  وب سایت </h3>

                   {{-- search box --}}
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}" class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="Information"> 
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
                            <th>آدرس  </th>
                            <th>وضعیت</th>
                            <th> شماره تلفن</th>
                            <th>ایمیل</th>
                            <td colspan="2">عملیات</td>
                        </tr>
                    </thead>
                    <tbody id="values-crud">
                        @foreach($informations as $u_info)
                        <tr id="value_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>
                                <a  href="{{ route('information.show',['information'=>$u_info->id]) }}">{{ $u_info->address }}</a>
                            </td>
                            <td>
                                <?php if($u_info->state==1) echo "فعال"; elseif($u_info->state==2) echo "غیرفعال"; ?>
                            </td>
                            <td>
                                {{ $u_info->telephone}}
                            </td> 
                            <td>
                                {{ $u_info->email}}
                            </td> 
                                
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
                {{ $informations->links() }}

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

    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="valueCrudModal"></h4>
          </div>
          <form id="valueForm" name="valueForm" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="value_id" id="value_id">

                <div class="form-group">
                    <label class="col-sm-1 control-label">ایمیل</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="email" name="email"  value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">وضعیت</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="state" name="state" >
                        <option value="">انتخاب کنید...</option>
                        <option value="1">فعال</option>
                        <option value="2">غیرفعال</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">آدرس</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="address" name="address"  value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">تلفن</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="telephone" name="telephone"  value="">
                    </div>
                </div>
            
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
          $('#valueCrudModal').html(" افزودن  اطلاعات جدید");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click edit value */
      $('body').on('click', '#edit-value', function () {
        var value_id = $(this).data('id');
        $.get("{{ url('admin/information')}}"+'/' + value_id +'/edit', function (data) {
            $('#msg_div').empty();
            $('#msg_div').removeClass('alert-danger');

           $('#valueCrudModal').html("ویرایش  اطلاعات ");
            $('#btn-save').val("edit-value");
            $('#ajax-crud-modal').modal('show');
            $('#value_id').val(data.id);
            $('#email').val(data.email);
            $('#address').val(data.address);
            $('#telephone').val(data.telephone);


        })
     });
     //delete value login
      $('body').on('click', '.delete-value', function () {
          var value_id = $(this).data("id");
          if(confirm("آیاسطر انتخاب شده حذف شود !")) {
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/information')}}"+'/'+value_id,
              success: function (data) {
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
            url: "{{ url('admin/information')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#msg_div').empty();
          if(data.arr.status){
              $('#msg_div').removeClass('alert-danger');
              $('#msg_div').show();
              $('#res_message').show();
          }else{
              $('#msg_div').addClass('alert-danger');
              $('#msg_div').show();
              $('#res_message').show();
            jQuery('.alert-danger').append('<p>'+data.arr.msg+'</p>');
              jQuery.each(data.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		});
          }

            var value = '<tr id="value_id_' + data.information.id + '"><td>' + data.information.id + '</td><td> <a  href="/admin/information/' + data.information.id + '">' + data.information.address + '</a></td><td>'+ data.stat.msg + '</td><td>'+ data.information.telephone + '</td><td>'+ data.information.email + '</td>';                                                      

            value += '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' + data.information.id + '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                value += ' <a href="javascript:void(0)" id="delete-value" data-id="' + data.information.id + '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
            
            if (actionType == "create-value") {
                $('#values-crud').prepend(value);
            } else {
                $("#value_id_" + data.information.id).replaceWith(value);
            }
            window.location.reload();

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












