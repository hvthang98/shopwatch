@extends('backend.master.admin_master')
@section('title')
Quản lý ảnh
@endsection
@section('main-content')
<style>
    @media (min-width: 768px) {
        .col-sm-3 {
            width: 30%;
        }

        .col-sm-9 {
            width: 70%;
        }
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

</style>

<div class="">
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
                    @if(count($errors))
                        @include('error.Note')
                    @endif
                    <form action="{{ route('addImageProduct',$products_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" id="image" name="image" title="chọn file ảnh"
                                required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-info">Lưu</button>
                        </div>
                    </form>
                </div>
            </section>
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
                            <table class="table" ui-jq="footable" ui-options="{
        " paging": { "enabled" : true }, "filtering" : { "enabled" : true }, "sorting" : { "enabled" : true }}">
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
                                    @if(isset($images))
                                        @php
                                            $stt=$images->firstItem()-1;
                                        @endphp
                                        @foreach($images as $image)
                                            @php
                                                $stt++;
                                            @endphp
                                            <tr>
                                                <td>{{ $stt }}</td>
                                                <td>
                                                    <img src="{{ asset($image->image) }}" alt="" class="list-img">
                                                </td>
                                                <td>
                                                    @if($image->status==1)
                                                        {{ 'Hiện' }}
                                                    @else
                                                        {{ 'Ẩn' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($image->level==1)
                                                        {{ 'Ảnh đại diện' }}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($image->level!=1)
                                                        @if($image->status==0)
                                                            <a href="{{ route('updateImageProduct',[$image->id,$image->status]) }}"
                                                                data-toggle="modal" class="btn btn-primary">
                                                                Hiện
                                                            </a>
                                                        @else
                                                            <a href="{{ route('updateImageProduct',[$image->id,$image->status]) }}"
                                                                data-toggle="modal" class="btn btn-primary">
                                                                Ẩn
                                                            </a>
                                                        @endif
                                                    @endif

                                                    <a href="{{ route('delImageProduct',$image->id) }}"
                                                        data-toggle="modal" class="btn btn-danger"
                                                        onclick="confirm('Bạn có chắc chắn muốn xóa ảnh này?')">
                                                        Xóa
                                                    </a>
                                                    @if($image->level!=1)
                                                        <a href="{{ route('changeAvatar',[$image->id,$image->products_id]) }}"
                                                            data-toggle="modal" class="btn btn-success">
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
@endsection
