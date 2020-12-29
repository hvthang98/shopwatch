@extends('backend.master.admin_master')
@section('title')
Chỉnh sửa thương hiệu
@endsection
@section('main-content')
<div class="form-w3layouts">
    <!-- page start-->
    <div class="row">
        <div clasupdateBrands="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    chỉnh sửa thương hiệu
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="" method="post"
                            action="{{ route('admin.brand.update',$brand->id) }}">
                            @include('error.Note')
                            @method('put')
                            @csrf
                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên thương hiệu mới</label>

                                <div class="col-lg-6">
                                    <input class=" form-control" id="name" name="name" type="text" required
                                        oninvalid="this.setCustomValidity('Không được để trống')"
                                        oninput="this.setCustomValidity('')" value="{{ $brand->name }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="ckeditor" id="content" name="content">
                                        {{ $brand->info }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Trạng thái</label>
                                <div class="col-lg-6">
                                    <label>
                                        <input type="radio" name="status" id="" value="1" @if ($brand->status==1)
                                        {{ 'checked' }}
                                        @endif>
                                        Hiện
                                        <input type="radio" name="status" id="" value="0" @if ($brand->status==0)
                                        {{ 'checked' }}
                                        @endif>
                                        Ẩn
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href="{{ route('admin.brand.index') }}" onclick="out()"><button
                                            class="btn btn-default" type="button">Thoát</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</div>
@endsection
@section('js')
<script>
    CKEDITOR.replace('content');

</script>
@if(session()->has('notification'))
    @include('notify.note');
@endif
@endsection
