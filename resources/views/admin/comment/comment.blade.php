@extends('admin.layouts.app')

@section('header-title')
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="{{ Route('home') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> کامنت ها</li>
    </ol>
</section>
@endsection

@section('content')
<section class="content">

    <div class="col-md-9">
        <a href="javascript:void(0)" class="btn btn-app bg-green float-right" id="create-new-value" disabled>
            <i class="fa fa-save "></i> افزودن
        </a>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">لیست کامنت ها </h3>

                    {{-- search box --}}
                    <div class="box-tools">
                        <form method="GET" action="{{ route('searchadmin') }}" class="input-group input-group-sm"
                            style="width: 150px;">
                            <input type="text" name="query" value="{{ request()->input('query') }}"
                                class="form-control pull-right" placeholder="جستجو">
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
                                <th>متن کامنت </th>
                                <th>نام کالای مربوطه</th>
                                <th> وضعیت نمایش</th>
                                <th> کاربر</th>
                                <th>تاریخ کامنت</th>
                                <td colspan="2">عملیات</td>
                            </tr>
                        </thead>
                        <tbody id="values-crud">
                            @foreach($comments as $comment)
                            <tr id="value_id_{{ $comment->id }}">
                                
                                @can('edite_comment_product', $comment)
                                <td>{{ $comment->id  }}</td>
                                <td width="30%">
                                    <a
                                        href="{{ route('comment.show',['comment'=>$comment->id]) }}">{{ $comment->comment }}</a>
                                </td>

                                <td>
                                    @foreach($comment->products as $item)
                                    {{ $item->name }},
                                    @endforeach
                                    @foreach($comment->articles as $item)
                                    {{ $item->title }},
                                    @endforeach
                                </td>
                                <td>
                                    <?php if($comment->status == '0') echo " نمایش داده نشود"; else echo "نمایش داده شود"; ?>
                                </td>
                                <td>
                                    {{ $comment->user->name}}
                                </td>
                                <td>
                                    {{ Verta::instance($comment->created_at)->format('Y/n/j') }}
                                </td>
                                <td colspan="2">
                                    <a href="javascript:void(0)" id="edit-value" data-id="{{ $comment->id }}"
                                        class="btn btn-info mr-2">
                                        <i class="fa fa-edit"></i>
                                    </a> &nbsp;
                                    <a href="javascript:void(0)" id="delete-value" data-id="{{ $comment->id }}"
                                        class="btn btn-danger delete-value">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>

                                @elsecan('edite_comment_article', $comment)
                                <td>{{ $comment->id  }}</td>
                                <td width="30%">
                                    <a
                                        href="{{ route('comment.show',['comment'=>$comment->id]) }}">{{ $comment->comment }}</a>
                                </td>

                                <td>
                                    @foreach($comment->products as $item)
                                    {{ $item->name }},
                                    @endforeach
                                    @foreach($comment->articles as $item)
                                    {{ $item->title }},
                                    @endforeach
                                </td>
                                <td>
                                    <?php if($comment->status == '0') echo " نمایش داده نشود"; else echo "نمایش داده شود"; ?>
                                </td>
                                <td>
                                    {{ $comment->user->name}}
                                </td>
                                <td>
                                    {{ Verta::instance($comment->created_at)->format('Y/n/j') }}
                                </td>
                                <td colspan="2">
                                    <a href="javascript:void(0)" id="edit-value" data-id="{{ $comment->id }}"
                                        class="btn btn-info mr-2">
                                        <i class="fa fa-edit"></i>
                                    </a> &nbsp;
                                    <a href="javascript:void(0)" id="delete-value" data-id="{{ $comment->id }}"
                                        class="btn btn-danger delete-value">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                @endcan


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $comments->links() }}

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
                        <label for="comment" class="col-sm-1 control-label">متن کامنت</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" name="comment" id="comment" cols="30" rows="3" value=""
                                maxlength="50"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">مقاله/&nbsp;محصول</label>
                        <div class="col-sm-12">
                            <input type="text" disabled value="" name="item" id="item" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">وضعیت&nbsp;نمایش</label>
                        <div class="col-sm-12">
                            <select class="form-control" id="status" name="status">
                                <option value="">انتخاب کنید...</option>
                                <option value="1">نمایش داده شود</option>
                                <option value="0">نمایش داده نشود</option>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*  When value click add value button */
        $('#create-new-value').click(function() {
            $('#msg_div').empty();
            $('#msg_div').removeClass('alert-danger');
            $("#product_id option:selected").removeAttr("selected");
            $('#btn-save').val("create-value");
            $('#valueForm').trigger("reset");
            $('#valueCrudModal').html(" افزودن  کامنت جدید");
            $('#ajax-crud-modal').modal('show');
        });
        /* When click edit value */
        $('body').on('click', '#edit-value', function() {
            var value_id = $(this).data('id');
            $.get("{{ url('admin/comment')}}" + '/' + value_id + '/edit', function(data) {
                $('#msg_div').empty();
                $('#msg_div').removeClass('alert-danger');
                $('#valueCrudModal').html("ویرایش  کامنت ");
                $('#btn-save').val("edit-value");
                $('#ajax-crud-modal').modal('show');
                $('#value_id').val(data.comment.id);
                $('#comment').val(data.comment.comment);
                $('#item').val(data.item.name)
                $("#status >[value=" + data.comment.status + "]").attr('selected', true);
            })
        });
        //delete value login
        $('body').on('click', '.delete-value', function() {
            var value_id = $(this).data("id");
            if (confirm("آیاکامنت  انتخاب شده حذف شود !")) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/comment')}}" + '/' + value_id,
                    success: function(data) {
                        $("#value_id_" + value_id).remove();
                        window.location.reload();
                    },
                    error: function(data) {
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
                    success: function(data) {
                        $('#msg_div').empty();
                        if (data.arr.status) {
                            $('#msg_div').removeClass('alert-danger');
                            $('#msg_div').show();
                            $('#res_message').show();
                        } else {
                            $('#msg_div').addClass('alert-danger');
                            $('#msg_div').show();
                            $('#res_message').show();
                            jQuery('.alert-danger').append('<p>' + data.arr.msg + '</p>');
                            jQuery.each(data.errors, function(key, value) {
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<p>' + value + '</p>');
                            });
                        }
                        var value = '<tr id="value_id_' + data.comment.id + '"><td>' + data
                            .comment.id + '</td><td> <a  href="/admin/comment/' + data.comment
                            .id + '">' + data.comment.comment + '</a></td><td>' + data.item
                            .name + '</td><td>' + data.user + '</td>';
                        value +=
                            '<td colspan="2"><a href="javascript:void(0)" id="edit-value" data-id="' +
                            data.comment.id +
                            '" class="btn btn-info mr-2"><i class="fa fa-edit"></i></a> &nbsp;';
                        value += ' <a href="javascript:void(0)" id="delete-value" data-id="' +
                            data.comment.id +
                            '" class="btn btn-danger delete-value ml-1"><i class="fa fa-trash"></i></a></td></tr>';
                        if (actionType == "create-value") {
                            $('#values-crud').prepend(value);
                        } else {
                            $("#value_id_" + data.comment.id).replaceWith(value);
                             window.location.reload();

                        }
                        window.location.reload();
                        $('#valueForm').trigger("reset");
                        $('#ajax-crud-modal').modal('hide');
                        $('#btn-save').html('درحال ارسال... ');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#btn-save').html('ارور... ');
                    }
                });
            }
        })
    }
</script>
@endsection