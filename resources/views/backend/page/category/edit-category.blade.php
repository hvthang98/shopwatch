@extends('backend.master.admin_master')
@section('main-content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <div>
                <a href="{{ route('admin.category.index') }}" class="black"><i
                        class="fa fa-arrow-circle-left"></i><span> Thoát</span></a>
            </div>
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('admin.category.update',$category->id) }}"
                        method="post">
                        @csrf
                        @method('put')
                        @if(count($errors->all())>0)
                            <div>
                                <h4 align="center" style="color: red">Thông tin không hợp lệ</h4>
                            </div>
                        @endif()

                        <div class="form-group">
                            <label for="category">Tên danh mục</label>
                            <input type="text" name="edit_category_name" class="form-control" id=""
                                placeholder="Nhập tên danh mục " required value="{{ $category->name }}">
                        </div>
                        <div class="form-group">
                            <label for="mota">Trạng thái</label>
                            <select name="edit_status" class="form-control input-sm m-bot15">
                                <option value="0" @if ($category->status==0)
                                    {{ 'selected' }}
                                    @endif>Ẩn</option>
                                <option value="1" @if ($category->status==1)
                                    {{ 'selected' }}
                                    @endif>Hiện</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mota">Trạng thái</label>
                            <select name="ordernum" class="form-control input-sm m-bot15">
                                <option value="0">Đầu tiên</option>
                                @if(isset($categories))
                                    @foreach($categories as $cate)
                                        @if($cate->id == $category->id)
                                            <option value="null" selected>Không đổi</option>
                                        @endif
                                        <option value="{{ $cate->ordernum }}">Sau {{ $cate->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-info" type="submit">Cập nhật danh mục</button>
                                <a href="{{ route('admin.category.edit',$category->id) }}"><button
                                        class="btn btn-default" type="button" onclick="loading()">Xóa</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <header class="panel-heading">
                Thương hiệu
            </header>
            <div class="panel-body">
                <table class="table">
                    <tbody>
                        @if(isset($category->brandCategories))
                            @foreach( $category->brandCategories as $item)
                                <tr>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.deleteBrand',[$item->id]) }}"
                                            onclick="return confirm('Bạn có chắc chắn muốn xóa ?');"><i
                                                class="fa fa-trash-o" style="font-size:24px"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</div>
@endsection
