<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>laravel 6 First Ajax CRUD Application - W3path.com</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 
 <style>
   .container{
    padding: 0.5%;
    direction: rtl;
    text-align: right;
   } 
</style>
</head>
<body>
 
<div class="container">
    <h2 style="margin-top: 12px;" class="alert alert-success">لیست پست های  وب سایت - <a href="" target="_blank" >اینجا</a></h2><br>
    <div class="row">

        <div class="alert" id="message" style="display: none"></div>

        <div class="col-12">
          <a href="javascript:void(0)" class="btn btn-success mb-2" id="create-new-post">افزودن پست</a> 
          {{-- <a href="" class="btn btn-secondary mb-2 float-right"> برگشت</a> --}}
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>ردیف</th>
                 <th>عنوان</th>
                 <th>متن</th>
                 <th></th>
                 <th>تصویر</th>
                 <td colspan="2">عملیات</td>
              </tr>
           </thead>
           <tbody id="posts-crud">
              @foreach($posts as $u_info)
              <tr id="post_id_{{ $u_info->id }}">
                 <td>{{ $u_info->id  }}</td>
                 <td>{{ $u_info->title }}</td>
                 <td>{{ $u_info->body }}</td>
                 <td>
                    <form method="post" id="upload_form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="file" name="select_file" id="select_file" />
                        <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
                    </form>
                 </td>
                 <td>
                    <span id="uploaded_image"></span>
                 </td>
                 <td colspan="2">
                    <a href="javascript:void(0)" id="edit-post" data-id="{{ $u_info->id }}" class="btn btn-info mr-2">ویرایش</a>
                    <a href="javascript:void(0)" id="delete-post" data-id="{{ $u_info->id }}" class="btn btn-danger delete-post">حذف</a>
                  </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {{ $posts->links() }}
       </div> 
    </div>
</div>
 








<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title" id="postCrudModal"></h4>
          </div>
          <form id="postForm" name="postForm" class="form-horizontal">
            <div class="modal-body">
                <input type="hidden" name="post_id" id="post_id">
                <div class="form-group">
                  <label for="name" class="col-sm-2 control-label">عنوان</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="title" name="title" placeholder="عنوان..." value="" maxlength="50" required="">
                  </div>
                </div>
   
                <div class="form-group">
                <label class="col-sm-2 control-label">متن</label>
                  <div class="col-sm-12">
                      <input type="text" class="form-control" id="body" name="body" placeholder="متن..." value="" required="">
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

  

</body>








<script>
    $(document).ready(function(){
    
     $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"{{ route('action') }}",
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
        $('#message').css('display', 'block');
        $('#message').html(data.message);
        $('#message').addClass(data.class_name);
        $('#uploaded_image').html(data.uploaded_image);
       }
      })
     });
    
    });
    </script>
    

<script>
    $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      /*  When post click add post button */
      $('#create-new-post').click(function () {
          $('#btn-save').val("create-post");
          $('#postForm').trigger("reset");
          $('#postCrudModal').html(" افزودن پست جدید");
          $('#ajax-crud-modal').modal('show');
      });
   
     /* When click edit post */
      $('body').on('click', '#edit-post', function () {
        var post_id = $(this).data('id');
        $.get("{{ url('admin/post')}}"+'/' + post_id +'/edit', function (data) {
           $('#postCrudModal').html("Edit post");
            $('#btn-save').val("edit-post");
            $('#ajax-crud-modal').modal('show');
            $('#post_id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);
        })
     });
     //delete post login
      $('body').on('click', '.delete-post', function () {
          var post_id = $(this).data("id");
          if(confirm("آیاپست انتخاب شده حذف شود !")) {
   
          $.ajax({
              type: "DELETE",
              url: "{{ url('admin/post')}}"+'/'+post_id,
              success: function (data) {
                  $("#post_id_" + post_id).remove();
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
         }
      });   
    });
   
   if ($("#postForm").length > 0) {
        $("#postForm").validate({
   
       submitHandler: function(form) {
   
        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');
        
        $.ajax({
            data: $('#postForm').serialize(),
            url: "{{ url('admin/post')}}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                var post = '<tr id="post_id_' + data.id + '"><td>' + data.id + '</td><td>' + data.title + '</td><td>' + data.body + '</td>';
                post += '<td colspan="2"><a href="javascript:void(0)" id="edit-post" data-id="' + data.id + '" class="btn btn-info mr-2">ویرایش</a>';
                  post += '<a href="javascript:void(0)" id="delete-post" data-id="' + data.id + '" class="btn btn-danger delete-post ml-1">حذف</a></td></tr>';
                 
                
                if (actionType == "create-post") {
                    $('#posts-crud').prepend(post);
                } else {
                    $("#post_id_" + data.id).replaceWith(post);
                }
   
                $('#postForm').trigger("reset");
                $('#ajax-crud-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                
            },
            error: function (data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
            }
        });
      }
    })
  }
     
    
  </script>


</html>