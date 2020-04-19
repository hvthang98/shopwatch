@extends('backend.master.admin_master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    @foreach($category as $cat)
                        <form role="form"
                            action="{{ route('post-edit-category',['id'=>$cat->id]) }}"
                            method="post">
                            @csrf
                            @if(count($errors->all())>0)
                                <div>
                                    <h4 align="center" style="color: red">Thông tin không hợp lệ</h4>
                                </div>
                            @endif()

                            <div class="form-group">
                                <label for="category">Tên danh mục</label>
                                <input type="text" name="edit_category_name" class="form-control" id=""
                                    placeholder="Nhập tên danh mục " required value="{{ $cat->name }}">
                            </div>
                            <div class="form-group">
                                <label for="mota">Trạng thái</label>
                                <select name="edit_status" class="form-control input-sm m-bot15">
                                    <option value="0" @if ($cat->status==0)
                                        {{ 'selected' }}
                                    @endif>Ẩn</option>
                                    <option value="1" @if ($cat->status==1)
                                        {{ 'selected' }}
                                    @endif>Hiện</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-info" type="submit">Cập nhật danh mục</button>
                                    <a
                                        href="{{ route('edit-category',['id'=>$cat->id]) }}"><button
                                            class="btn btn-default" type="button" onclick="loading()">Xóa</button>
                                    </a>
                                </div>
                    @endforeach
                </div>
                </form>
            </div>

    </div>
    </section>

</div>
</div>
@endsection
