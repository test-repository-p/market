@extends('admin.layouts.app')

@section('title')
<title>مدیریت لوگوی سایت</title>
@endsection
@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> لوگو</li>
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
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                            class="fa fa-times"></i></button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                برای وب سایت خود فقط یک لوگو تنظیم کنید.
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-9">
        <button type="button" name="create_record" id="create_record" class="btn btn-app bg-green">
            <i class="fa fa-save "></i> افزودن
        </button>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست لوگوهای وب سایت </h3>

                    {{-- search box --}}
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm"
                            style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}"
                                class="form-control pull-right" placeholder="جستجو">
                            <input type="text" hidden name="model" value="Logo">
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
                                <th>تصویر </th>
                                <th>نام </th>
                                <th>عنوان</th>
                                <td colspan="2">عملیات</td>
                            </tr>
                        </thead>
                        <tbody id="values-crud">
                            @foreach($logos as $u_info)
                            <tr id="value_id_{{ $u_info->id }}">
                                <td>{{ $u_info->id  }}</td>
                                <td>
                                    @if($u_info->photos()->first())
                                    <img src="/{{ $u_info->photos()->first()->path }}"
                                        style="width:170px;height:150px;height: auto;float: right;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('logo.show',['logo'=>$u_info->id]) }}">{{ $u_info->name }}</a>
                                </td>
                                <td>
                                    {{ $u_info->title}}
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
                {{ $logos->links() }}

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
                        <label class="control-label col-md-4"> Name : </label>
                        <div class="col-md-8">
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">title : </label>
                        <div class="col-md-8">
                            <input type="text" name="title" id="title" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Select Profile Image : </label>
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
                <h4 align="center" style="margin:0;">آیابرای حذف مطمین هستید؟</h4>
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
            $('#modalTitle').text("افزودن لوگو جدید");
            $('#action_button').val("افزودن");
            $('#action').val("Add");
            $('#formModal').modal('show');
        });
        $('#sample_form').on('submit', function(event) {
            event.preventDefault();
            if ($('#action').val() == 'Add') {
                $.ajax({
                    url: "{{ route('logo.store') }}",
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
                            var value = '<tr id="value_id_' + data.logo.id + '"><td>' + data
                                .logo.id + '</td><td><img src="/' + data.pic.path +
                                '" /></td><td> <a  href="/admin/logo/' + data.logo.id +
                                '">' + data.logo.name + '</a></td><td>' + data.logo.title +
                                '</td>';
                            value +=
                                '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' +
                                data.logo.id +
                                '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                            value +=
                                ' <a href="javascript:void(0)" id="delete-value" data-id="' +
                                data.logo.id +
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
                    url: "{{ route('logo.update') }}",
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
                            var value = '<tr id="value_id_' + data.logo.id + '"><td>' + data
                                .logo.id + '</td><td><img src="/' + data.pic.path +
                                '" /></td><td> <a  href="/admin/logo/' + data.logo.id +
                                '">' + data.logo.name + '</a></td><td>' + data.logo.title +
                                '</td>';
                            value +=
                                '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' +
                                data.logo.id +
                                '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                            value +=
                                ' <a href="javascript:void(0)" id="delete-value" data-id="' +
                                data.logo.id +
                                '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                            $('#sample_form')[0].reset();
                            $('#store_image').html('');
                            $("#value_id_" + data.logo.id).replaceWith(value);
                        }
                        $('#form_result').html(html);
                    }
                });
            }
        });
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            $('#form_result').html('');
            $.ajax({
                url: "{{ url('admin/logo')}}" + '/' + id + '/edit',
                dataType: "json",
                success: function(html) {
                    $('#name').val(html.data.name);
                    $('#title').val(html.data.title);
                    $('#store_image').html("<img src=/" + html.pic.path +
                        " width='70' class='img-thumbnail' />");
                    $('#store_image').append(
                        "<input type='hidden' name='hidden_image' value='" + html
                        .image + "' />");
                    $('#hidden_id').val(html.data.id);
                    $('#modalTitle').text("ویرایش لوگو شماره" + html.data.id);
                    $('#action_button').val("ویرایش");
                    $('#action').val("Edit");
                    $('#formModal').modal('show');
                }
            })
        });
        $('body').on('click', '.delete', function() {
            var val_id = $(this).data('id');
            $('#confirmModal').modal('show');
            $('#confirmTitle').html("حذف لوگو شماره" + val_id);
            $('#ok_button').click(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/logo')}}" + '/' + val_id,
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