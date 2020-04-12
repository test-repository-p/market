<!DOCTYPE html>
<html>
<head>
    <title>عملیات CRUD با استفاده از Datatable و Ajax در لاراول 5.8 | تجاری اپ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 
    <style>
        body {
            direction: rtl;
            text-align: right;
            background-color: #FFF5EE;
        }
        .container h1 {
            font-size: 2rem;
            text-align: center;
            margin: 50px 0;
        }
    </style>
</head>
<body>
 
<div class="container">
    <h1>عملیات CRUD با استفاده از Datatable و Ajax در لاراول 5.8 - تجاری اپ</h1>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct"> ایجاد محصول جدید</a>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>ردیف</th>
            <th>نام</th>
            <th>جزئیات محصول</th>
            <th width="280px">عملیات</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
 
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                    <input type="hidden" name="tag_id" id="tag_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">نام</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="نام را وارد کنید" value="" maxlength="50" required="">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="col-sm-4 control-label">جزئیات محصول</label>
                        <div class="col-sm-12">
                            <textarea id="detail" name="detail" required="" placeholder="جزئیات محصول را وارد کنید" class="form-control"></textarea>
                        </div>
                    </div>
 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">ذخیره تغییرات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
</body>
 
<script type="text/javascript">
    $(function () {
 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
 
        var table = $('.data-table').DataTable({
            "oLanguage":{
                "sEmptyTable":     "هیچ داده ای در جدول وجود ندارد",
                "sInfo":           "نمایش _START_ تا _END_ از _TOTAL_ رکورد",
                "sInfoEmpty":      "نمایش 0 تا 0 از 0 رکورد",
                "sInfoFiltered":   "(فیلتر شده از _MAX_ رکورد)",
                "sInfoPostFix":    "",
                "sInfoThousands":  ",",
                "sLengthMenu":     "نمایش _MENU_ رکورد",
                "sLoadingRecords": "در حال بارگزاری...",
                "sProcessing":     "در حال پردازش...",
                "sSearch":         "جستجو:",
                "sZeroRecords":    "رکوردی با این مشخصات پیدا نشد",
                "oPaginate": {
                    "sFirst":    "ابتدا",
                    "sLast":     "انتها",
                    "sNext":     "بعدی",
                    "sPrevious": "قبلی"
                },
                "oAria": {
                    "sSortAscending":  ": فعال سازی نمایش به صورت صعودی",
                    "sSortDescending": ": فعال سازی نمایش به صورت نزولی"
                }
            },
            processing: true,
            serverSide: true,
            ajax: "{{ route('tag.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'detail', name: 'detail'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
 
        $('#createNewProduct').click(function () {
            $('#saveBtn').val("create-product");
            $('#tag_id').val('');
            $('#productForm').trigger("reset");
            $('#modelHeading').html("ایحاد محصول جدید");
            $('#ajaxModel').modal('show');
        });
 
        $('body').on('click', '.editProduct', function () {
            var tag_id = $(this).data('id');
            $.get("{{ route('tag.index') }}" +'/' + tag_id +'/edit', function (data) {
                $('#modelHeading').html("ویرایش محصول");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#tag_id').val(data.id);
                $('#name').val(data.name);
                // $('#detail').val(data.detail);
            })
        });
 
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('ثبت..');
 
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('tag.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
 
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
 
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('ذخیره تغییرات');
                }
            });
        });
 
        $('body').on('click', '.deleteProduct', function () {
 
            var tag_id = $(this).data("id");
            confirm("آیا شما می خواهید این محصول را حذف کنید؟");
 
            $.ajax({
                type: "DELETE",
                url: "{{ route('tag.store') }}"+'/'+tag_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
 
    });
</script>
</html>
