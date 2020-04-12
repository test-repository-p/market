@extends('admin.layouts.app')
@section('title')
    <title>مدیریت کاربران هپی مارکت</title>
@endsection
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

   

    <div class="col-md-9">
        <button type="button" name="create_record" id="create_record" class="btn btn-app bg-green" disabled >
            <i class="fa fa-save "></i> افزودن
        </button>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست  کاربران وب سایت </h3>

                    {{-- search box --}}
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm"
                            style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}"
                                class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="User">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    {{-- //search box --}}
                </div>

                {{-- <div class="table-responsive"> --}}
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover" id="val_table">
                        <thead>
                            <tr>
                                <th>ردیف</th>
                                <th>نام  </th>
                                <th>ایمیل </th>
                                <th>تصویر</th>
                                <th>سطح دسترسی ها </th>
                                <td colspan="2">عملیات</td>
                            </tr>
                        </thead>
                        <tbody id="values-crud">
                            @foreach($users as $u_info)
                            <tr id="value_id_{{ $u_info->id }}">
                                <td>{{ $u_info->id  }}</td>
                                
                                <td>
                                    <a href="{{ route('user.show',['user'=>$u_info->id]) }}">{{ $u_info->name }}</a>
                                </td>
                                <td>
                                    {{ $u_info->email}}
                                </td>
                                <td>
                                    @if($u_info->photos()->first())
                                    <img src="/{{ $u_info->photos()->first()->path }}"
                                        style="width:100px;height:100px;height: auto;float: right;">
                                    @endif
                                </td>
                                <td>
                                    @foreach ($u_info->roles as $role)
                                    ({{ $role->title }}),
                                    @endforeach
                                </td>

                                <td colspan="2">
                                    <a href="javascript:void(0)" id="edit-value" name="edit" data-id="{{ $u_info->id }}"
                                        class="edit btn btn-info mr-2">
                                        <i class="fa fa-edit"></i>
                                    </a> &nbsp;
                                    <a href="javascript:void(0)" id="delete-value" data-id="{{ $u_info->id }}"
                                        class="delete btn btn-danger delete-value">
                                        <i class="fa fa-trash"></i>
                                    </a>

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

@section('modol')

<div id="formModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modalTitle">Add New Record</h4>
            </div>
            <div class="modal-body">
                <span id="form_result"></span>
                <form method="post" id="sample_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-4"> نام : </label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">ایمیل : </label>
                        <div class="col-md-8">
                            <input type="email" name="email" id="email" class="form-control" disabled />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">سطح دسترسی </label>
                        <div class="col-md-8">
                        <select class="form-control" id="role_id" name="role_id[]" multiple>
                          @foreach ($roles as $role)  
                          <option value="{{ $role->id }}">{{ $role->title }}</option>
                          @endforeach
                        </select>
                        </div>
                      </div>

                    <div class="form-group">
                        <label class="control-label col-md-4">تصویرپروفایل : </label>
                        <div class="col-md-8">
                            <input type="file" name="image" id="image" />
                            <span id="store_image"></span>
                        </div>
                    </div>
                    <br />
                    <div class="form-group" align="center">
                        <input type="hidden" name="action" id="action" />
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <input type="submit" name="action_button" id="action_button" class="btn btn-warning"
                            value="Add" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title" id="confirmTitle"></h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">آیابرای حذف اطمینان هستید؟</h4>
            </div>
            <div class="modal-footer"  >
                <button style="float:left;" type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button style="float:left;margin-left:10px;" type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script-footer')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#create_record').click(function() {
            $('#sample_form')[0].reset();
            $('#store_image').html('');
            $('#passwordS').show();

            $('#modalTitle').text("افزودن کاربر جدید");
            $('#action_button').val("افزودن");
            $('#action').val("Add");
            $('#formModal').modal('show');
        });
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('user.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success +
                                '</div>';
                            $('#sample_form')[0].reset();
                            var value = '<tr id="value_id_' + data.user.id + '"><td>' + data
                                .user.id + '</td></td><td> <a  href="/admin/user/' + data.user.id +
                                '">' + data.user.name + '</a></td><td>' + data.user.email +
                                '</td><td><img src="/' + data.pic.path +
                                '" />';
                            value +=
                                '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' +
                                data.user.id +
                                '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                            value +=
                                ' <a href="javascript:void(0)" id="delete-value" data-id="' +
                                data.user.id +
                                '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                            $('#values-crud').prepend(value);
                            // $('#valueForm').trigger("reset");
                        }
                        $('#form_result').html(html);
                    }
                })
            }
            if ($('#action').val() == "Edit") {
                $.ajax({
                    url: "{{ route('user.update') }}",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    dataType: "json",
                    success: function(data) {
                        var html = '';
                        if (data.errors) {
                            html = '<div class="alert alert-danger">';
                            for (var count = 0; count < data.errors.length; count++) {
                                html += '<p>' + data.errors[count] + '</p>';
                            }
                            html += '</div>';
                        }
                        if (data.success) {
                            html = '<div class="alert alert-success">' + data.success +
                                '</div>';
                                var value = '<tr id="value_id_' + data.user.id + '"><td>' + data
                                .user.id + '</td></td><td> <a  href="/admin/user/' + data.user.id +
                                '">' + data.user.name + '</a></td><td>' + data.user.email +
                                '</td><td><img src="/' + data.pic.path +
                                '" />';
                            value +=
                                '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' +
                                data.user.id +
                                '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                            value +=
                                ' <a href="javascript:void(0)" id="delete-value" data-id="' +
                                data.user.id +
                                '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                            $('#sample_form')[0].reset();
                            $('#store_image').html('');
                            $("#value_id_" + data.user.id).replaceWith(value);
                        }
                        $('#form_result').html(html);
                        window.location.reload();

                    }
                });
            }
        });
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('admin/user')}}" + '/' + id + '/edit',
                dataType: "json",
                success: function(html) {
                    $('#name').val(html.data.name);
                    $('#email').val(html.data.email);
                    // $('#passwordS').hide();
                    $('#store_image').html("<img src=/" + html.pic.path +
                        " width='70' class='img-thumbnail' />");
                    $('#store_image').append(
                        "<input type='hidden' name='hidden_image' value='" + html
                        .image + "' />");
                    $('#hidden_id').val(html.data.id);
                    $('#modalTitle').text("ویرایش کاربر شماره" + html.data.id);
                    $('#action_button').val("ویرایش");
                    $('#action').val("Edit");
                    $('#formModal').modal('show');
                }
            })
        });
        $('body').on('click', '.delete', function() {
            var val_id = $(this).data('id');
            $('#confirmModal').modal('show');
            $('#confirmTitle').html("حذف کاربر شماره" + val_id);
            $('#ok_button').click(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/user')}}" + '/' + val_id,
                    beforeSend: function() {
                        $('#ok_button').text('Deleting...');
                    },
                    success: function(data) {
                        $("#value_id_" + val_id).remove();
                        window.location.reload();
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                })
            });
        });
    });
</script>

@endsection