@extends('backend.master.admin_master')
@section('title')
    Quản lý ảnh
@endsection
@section('main-content')
    <style>
        .col-sm-9 {
            width: 70%;
        }

        .panel {
            padding: 10px;
        }

        .style-icon {
            color: black;
            font-size: 22px;
            margin-right: 10px;
        }

        .style-icon:hover {
            color: red;
        }

        .table>thead>tr>th {
            color: #000;
        }

        .table>tbody>tr>td {
            color: #747171;
        }

        .list-img {
            width: 200px;
            height: 210px;
        }

        .btn-success {
            margin-top: 10px;
        }

        .btn-danger {
            margin-left: 5px;
        }

        .center {
            text-align: center;
        }

        .black {
            color: rgb(240, 30, 30);
        }
    </style>

    <div>
        <div>
            <a href="{{ route('admin.product.index') }}" class="black"><i class="fa fa-arrow-circle-left"></i><span>
                    Thoát</span></a>
        </div>
        <div class="panel-heading">
            Quản lý ảnh sản phẩm
        </div>

        <div class="row">
            <div class="col-sm-3 com-w3ls">
                <section class="panel">

                    <div class="panel-body">
                        <a class="btn btn-compose">
                            Thêm ảnh
                        </a>
                    </div>
                    <div>
                        @if (count($errors))
                            @include('error.Note')
                        @endif
                        <form action="{{ route('admin.imageProduct.store', $products_id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="file" class="form-control" id="image" name="image" title="chọn file ảnh"
                                accept="image/x-png,image/gif,image/jpeg" required>
                            </div>
                            <div class="form-group center">
                                <button type="submit" class="btn btn-info">Lưu</button>
                            </div>
                        </form>
                    </div>
                </section>
                <div class="panel-heading">
                    Ảnh đại diện
                </div>
                @if (isset($images))
                    @foreach ($images as $image)
                        @if ($image->level == 1)
                            <img class="img-thumbnail" src="../storage/{{ $image->image }}" alt="">
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                        <h4 class="gen-case">Danh sách ảnh
                        </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="table-inbox-wrap ">
                            <div class="table-responsive">
                                <table class="table" ui-jq="footable">
                                    <thead>
                                        <tr>
                                            <th style="width:50px;">STT</th>
                                            <th style="width:250px;">Ảnh sản phẩm</th>
                                            <th style="width:125px;">Trạng thái</th>
                                            <th style="width:150px;">Chú thích</th>
                                            <th>Tùy Chọn</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($images))
                                            @php
                                                $stt = $images->firstItem() - 1;
                                            @endphp
                                            @foreach ($images as $image)
                                                @php
                                                    $stt++;
                                                @endphp
                                                <tr>
                                                    <td>{{ $stt }}</td>
                                                    <td>
                                                        <img src="../storage/{{ $image->image }}" alt="" class="list-img">
                                                    </td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox"
                                                                class="custom-control-input status-control"
                                                                id="status{{ $stt }}" data-id="{{ $image->id }}"
                                                                {{ $image->status == 1 ? 'checked' : '' }}>
                                                            <label class="custom-control-label"
                                                                for="status{{ $stt }}">Hiện</label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($image->level == 1)
                                                            {{ 'Ảnh đại diện' }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a data-toggle="modal" class="btn btn-danger destroy"
                                                            data-target="#destroyImage" data-id="{{ $image->id }}">
                                                            Xóa
                                                        </a>
                                                        @if ($image->level != 1)
                                                            <a href="{{ route('admin.imageProduct.changeAvatar', [$image->id, $image->products_id]) }}" class="btn btn-success">
                                                                Chọn làm ảnh đại diện
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <footer class="panel-footer">
                                <div class="row">
                                    {{ $images->render() }}
                                </div>
                            </footer>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="destroyImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa ảnh</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa ảnh này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/image-product/', '#destroyImage');
        $(document).ready(function() {
            $('.status-control').on('change', function() {
                let status = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    method: 'PATCH',
                    url: '{{ route('admin.imageProduct.updateStatus') }}',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id,
                        'status': status == true ? 1 : 0,
                    },
                    success: function(response) {
                        let status = response.success ? 'success': 'error';
                        notify(status, response.message);
                    },
                })
            });
        });

    </script>
@endsection
