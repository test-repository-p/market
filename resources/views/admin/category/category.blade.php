@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">  دسته بندی ها</li>
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
                    <h3 class="box-title">لیست  دسته بندی های  وب سایت </h3>

                   {{-- search box --}}
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}" class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="Category"> 
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
                            <th>نام</th>
                            <th>عنوان</th>  
                            <th>کلمات کلیدی</th>    
                            <td colspan="2">عملیات</td>
                        </tr>
                    </thead>
                    <tbody id="values-crud">
                        @foreach($categorys as $u_info)
                        <tr id="value_id_{{ $u_info->id }}">
                            <td>{{ $u_info->id  }}</td>
                            <td>
                                <a  href="{{ route('category.show',['category'=>$u_info->id]) }}">{{ $u_info->name }}</a>
                            </td>
                            <td>{{ $u_info->title }}</td>
                            <td>
                                @if($u_info->tags)
                                @foreach($u_info->tags as $tag) 
                                {{ $tag->name }},
                                @endforeach
                                @endif
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
                {{ $categorys->links() }}

            </div>
        </div>
    </div>
     
    
</section>
@endsection
    

@section('modol')
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="valueCrudModal"></h4>
          </div>
          <form id="valueForm" name="valueForm" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="value_id" id="value_id">
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">نام</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="name" name="name"  value="" maxlength="50" required="">
                  </div>
                </div>
   
                <div class="form-group">
                <label class="col-sm-1 control-label">عنوان</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="title" name="title"  value="" required="">
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">کلمات&nbsp;کلیدی</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="tag_id" name="tag_id[]" multiple>
                        @foreach ($tags as $tag)  
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
          $('#btn-save').val("create-value");
          $('#valueForm').trigger("reset");
          $('#valueCrudModal').html(" افزودن دسته بندی جدید");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click edit value */
      $('body').on('click', '#edit-value', function () {
        var value_id = $(this).data('id');
        $.get("{{ url('admin/category')}}"+'/' + value_id +'/edit', function (data) {
           $('#valueCrudModal').html("ویرایش دسته بندی ");
            $('#btn-save').val("edit-value");
            $('#ajax-crud-modal').modal('show');
            $('#value_id').val(data.id);
            $('#title').val(data.title);
            $('#name').val(data.name);
            // $('#tag_id').val(data.tag_id);

        })
     });
     //delete value login
      $('body').on('click', '.delete-value', function () {
          var value_id = $(this).data("id");
          if(confirm("آیادسته بندی انتخاب شده حذف شود !")) {
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/category')}}"+'/'+value_id,
              success: function (data) {
                  $("#value_id_" + value_id).remove();
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
            url: "{{ url('admin/category')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                var value = '<tr id="value_id_' + data.category.id + '"><td>' + data.category.id + '</td><td> <a  href="/admin/attribute/' + data.category.id + '">' + data.category.name + '</a></td><td>' + data.category.title + '</td></td><td>';
                $.each(data.tags,function(i,tag){
                    value += tag.name + ',';
                });
                value += '</td><td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' + data.category.id + '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                  value += ' <a href="javascript:void(0)" id="delete-value" data-id="' + data.category.id + '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                 
                
                if (actionType == "create-value") {
                    $('#values-crud').prepend(value);
                } else {
                    $("#value_id_" + data.category.id).replaceWith(value);
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












