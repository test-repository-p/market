@extends('admin.layouts.app')
@section('title')
    <title>سطوح دسترسی هپی مارکت</title>
@endsection
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

    <div class="col-md-9">      
        <a href="javascript:void(0)" class="btn btn-app bg-green float-right" id="create-new-value">
            <i class="fa fa-save "></i> افزودن
        </a> 
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست سطوح دسترسی وب سایت </h3>

                   {{-- search box --}}
                   @if(request()->input('query'))
                   <h3 class="subtitle"> نتایج جستجو</h3>
                   <p>({{ $result->total() }} نتیجه برای {{ request()->input('query') }})</p>
                   @endif
                   <div class="box-tools">
                       <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm" style="width: 150px;">
                           <input type="text" name="query" value="{{ request()->input('query') }}" class="form-control pull-right" placeholder="جستجو">
                           <input type="text" hidden name="model" value="Role"> 
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
                            <th>نام سطح دسترسی</th>
                            <th>عنوان </th>
                            <th >دسترسی ها </th>
                            <td colspan="2">عملیات</td>
                        </tr>
                    </thead>
                    <tbody id="values-crud">
                        @foreach($result as $u_info)
                        <tr id="value_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>
                                <a  href="{{ route('role.show',['role'=>$u_info->id]) }}">{{ $u_info->name }}</a>
                            </td>
                        
                            <td>
                                {{ $u_info->title}}
                            </td> 
                           
                            <td width="40%">
                                @foreach ($u_info->permissions as $permission)
                                ({{ $permission->title }}),
                                @endforeach
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

    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="valueCrudModal"></h4>
          </div>
          <form id="valueForm" name="valueForm" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="value_id" id="value_id">

                <div class="form-group">
                    <label class="col-sm-1 control-label">نام</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="name" name="name"  value="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-1 control-label">عنوان</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title"  value="">
                    </div>
                </div>
                <?php $permissions= App\Models\Permission::get(); ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label">دسترسی&nbsp;ها</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="permission_id" name="permission_id[]" multiple >
                            @foreach ($permissions as $val)  
                            <option value="{{ $val->id }}">{{ $val->title }}</option>
                            @endforeach
                        </select>
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

        // $("#product_id option:selected").removeAttr("selected");


          $('#btn-save').val("create-value");
          $('#valueForm').trigger("reset");
          $('#valueCrudModal').html(" افزودن  سطح دسترسی جدید");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click edit value */
      $('body').on('click', '#edit-value', function () {
        var value_id = $(this).data('id');
        $.get("{{ url('admin/role')}}"+'/' + value_id +'/edit', function (data) {
            $('#msg_div').empty();
            $('#msg_div').removeClass('alert-danger');

           $('#valueCrudModal').html("ویرایش  سطح دسترسی "+value_id);
            $('#btn-save').val("edit-value");
            $('#ajax-crud-modal').modal('show');
            $('#value_id').val(data.role.id);
            $('#name').val(data.role.name);
            $('#title').val(data.role.title);

            // $("#permission_id option[value='2']").attr('selected', 'selected');
            // $("#permission_id >[value=3 ]").attr('selected', 'selected');
            // alert(data.select);
            // var vals = $("#permission_id").val();
            $.each(data.select,function(i,val)
            {
                // alert(val[i]);
                $("#permission_id option[value="+val[i]+"]").attr('selected', 'selected');
                // vals.push(val[i]);
                // selected.push(val);
                
            });


        })
     });
     //delete value login
      $('body').on('click', '.delete-value', function () {
          var value_id = $(this).data("id");
          if(confirm("آیاسطر "+value_id+" حذف شود !")) {
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/role')}}"+'/'+value_id,
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
            url: "{{ url('admin/role')}}",
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

            var value = '<tr id="value_id_' + data.role.id + '"><td>' + data.role.id + '</td><td> <a  href="/admin/role/' + data.role.id + '">' + data.role.title + '</a></td></td><td>'+ data.role.name + '</td><td>';                                                      
            $.each(data.permissions,function(i,val){
                value += val.title + ',';
            });
            value += '</td><td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' + data.role.id + '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
            value += ' <a href="javascript:void(0)" id="delete-value" data-id="' + data.role.id + '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
            
            if (actionType == "create-value") {
                $('#values-crud').prepend(value);
            } else {
                $("#value_id_" + data.role.id).replaceWith(value);
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












