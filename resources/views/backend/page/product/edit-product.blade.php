@extends('backend.master.admin_master')
@section('title')
Chỉnh sửa sản phẩm
@endsection
@section('main-content')
<div class="form-w3layouts">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div>
                    <a href="{{ route('listProduct') }}" class="black"><i class="fa fa-arrow-circle-left"></i><span> Thoát</span></a>
                </div>
                <header class="panel-heading">
                    thông tin sản phẩm
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="cmxform form-horizontal " id="" method="get"
                            action="{{ route('updateProduct',$product->id) }}"
                            novalidate="novalidate" enctype="multipart/form-data">
                            <div class="form-group ">
                                <label for="name" class="control-label col-lg-3">Tên sản phẩm</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="name" name="name" type="text"
                                        value="{{ $product->name }}" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="price" class="control-label col-lg-3">Giá bán</label>
                                <div class="col-lg-6">
                                    <input class=" form-control" id="price" name="price" type="number" min=0
                                        value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Giá khuyến mãi</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="sellprice" name="sellprice" type="number" min=0
                                        value="{{ $product->sellprice }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Số lượng</label>
                                <div class="col-lg-6">
                                    <input class="form-control " id="quantily" name="quantily" type="number" min=0
                                        value="{{ $product->quantily }}">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Danh mục</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="category" id="category">
                                        <option value="0" selected>Chọn danh mục</option>
                                        @if(isset($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" <?php if($category->id==$product->categories_id) echo 'selected' ?>>{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Thương hiệu</label>
                                <div class="col-lg-6" id="brands">
                                    <select class="form-control m-bot15" name="brands">
                                        @if(isset($brands))
                                            @foreach($brands as $item)           
                                                    <option value="{{ $item->brand->id }}" <?php if($item->brand->id==$product->brands_id) echo 'selected' ?>>{{  $item->brand->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="password" class="control-label col-lg-3">Mô tả</label>
                                <div class="col-lg-6">
                                    <textarea class="ckeditor" id="content"
                                        name="content">{{ $product->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="" class="control-label col-lg-3">Thứ tự sắp xếp</label>
                                <div class="col-lg-6">
                                    <select class="form-control m-bot15" name="ordernum">
                                        <option value="0" <?php if($product->ordernum==0) echo 'selected' ?>>Không hiển
                                            thị trang chủ</option>
                                        <option value="1" <?php if($product->ordernum==1) echo 'selected' ?>>Sản phẩm
                                            nổi bật</option>
                                        <option value="2" <?php if($product->ordernum==2) echo 'selected'?>>Sản phẩm mới
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Tags</label>
                                <?php $tags=explode(',',$product->tags);?>
                                <select name="tags[]" class="form-control multi-tag" style="width: 500px"
                                    multiple="multiple">
                                    @foreach ($tags as $tag)
                                    <option selected="selected">{{ $tag }}</option>
                                    @endforeach
                                </select>
                                <script type="text/javascript">
                                    $(".multi-tag").select2({
                                        tags: true,
                                        tokenSeparators: [',']
                                    })

                                </script>
                            </div>
                            <div class="form-group ">
                                <label for="sellprice" class="control-label col-lg-3">Trạng thái</label>
                                <div class="col-lg-6">
                                    <label>
                                        <input type="radio" name="status" id="" value="1" @if ($product->status==1)
                                        {{ 'checked' }}
                                        @endif>
                                        Hiện
                                        <input type="radio" name="status" id="" value="0" @if ($product->status==0)
                                        {{ 'checked' }}
                                        @endif>
                                        Ẩn
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <button class="btn btn-primary" type="submit">Lưu</button>
                                    <a href="{{ route('editProduct',$product->id) }}"><button
                                            class="btn btn-default" type="button" onclick="loading()">Đặt
                                            lại</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <!-- information product -->
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thông tin kỹ thuật
                    <span class="tools pull-right">
                        <a class="fa fa-chevron-down" href="javascript:;"></a>
                    </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <form class="form-horizontal" method="post" action="">
                            <div class="content-infor">
                                @if(isset($info_product))
                                    @foreach($info_product as $key=>$info)
                                        <div class="form-group">
                                            <div class="col-lg-4"><input class="form-control name_infor_{{ $key+1 }}"
                                                    value="{{ $info->name }}"></div>
                                            <div class="col-lg-8"><input
                                                    class="form-control content_infor_{{ $key+1 }}"
                                                    value="{{ $info->content }}"></div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-lg-4">
                                    <button class="btn btn-success" id="add-infor" type="button"
                                        data-count="{{ $countInfor}}">Thêm</button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12" style="text-align: center">
                                    <button class="btn btn-primary" type="button" id="save-infor"
                                        data-product="{{ $product->id }}">Lưu</button>
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
@if(session()->has('notification'))
    @include('notify.note');
@endif
<script>
    CKEDITOR.replace('content');
    //add infor
    let dataInfor = [];
    let count = $('#add-infor').data('count');
    count = parseInt(count);
    $('#add-infor').click(function () {
        count++;
        let content =
            '<div class="form-group"><div class="col-lg-4"><input class="form-control name_infor_' + count +
            '"></div><div class="col-lg-8"><input class="form-control content_infor_' + count +
            '"></div></div>';
        $('.content-infor').append(content);
    });
    $('#save-infor').click(function () {
        if (count > 0) {
            dataInfor = [];
            for (let i = 1; i <= count; i++) {
                let elementName = '.name_infor_' + i;
                let elementContent = '.content_infor_' + i;
                let name = $(elementName).val();
                let content = $(elementContent).val();
                if (name != '') {
                    dataInfor.push({
                        name: name,
                        content: content
                    });
                }
            }
        }
        //ajax
        let json = JSON.stringify(dataInfor);
        let url = location.origin + '/shopwatch/admin/product/store-infor';
        let idProduct = this.dataset.product;
        $.get(url, {
            id: idProduct,
            content: json
        }, function (data) {
            if (data == true) {
                alert('Lưu thành công');
            }
        })
    })
    //ajax categrory
    $('#category').change(function () {
        let idCategory = this.value;
        let url = location.origin + '/shopwatch/ajax/brand';
        $.get(url, {
            id: idCategory
        }, function (data) {
            $('#brands').html(data);
        });
    });
</script>
@endsection
