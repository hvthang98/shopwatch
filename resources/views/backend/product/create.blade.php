@extends('backend.layouts.admin_master')
@section('title')
    {{ __('Add New Product') }}
@endsection
@section('main-content')
    <div class="form-w3layouts">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{ __('Add New Product') }}
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            @if (count($errors) > 0)
                                @include('error.Note')
                            @endif
                            <form class="cmxform form-horizontal " id="" method="POST"
                                action=" {{ route('admin.product.store') }} " enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-3">{{ __('Name') }}</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="name" name="name" type="text" required
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="control-label col-lg-3">{{ __('Price') }}</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" data-toggle="number" data-format="default" id="price" name="price" type="text"
                                            required value="{{ old('price') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">{{ __('Price Sell') }}</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="sellprice" name="sellprice" type="text" data-toggle="number" data-format="default"
                                            required value="{{ old('sellprice') }}">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">{{ __('Quantily') }}</label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="quantily" name="quantily" type="text" data-toggle="number" data-format="default"
                                            value="{{ old('quantily') }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label col-lg-3">{{ __('Avatar') }}</label>
                                    <div class="col-lg-6">
                                        <input class="form-control " id="image" name="image" type="file" data-type="image" data-review="#avatar_review"
                                            value="{{ old('image') }}" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <img src="" alt="" class="form-image-review" id="avatar_review">
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">{{ __('Category') }}</label>
                                    <div class="col-lg-6">
                                        <select class="form-control select2-custom" name="category" id="category" required
                                            data-toggle="select2">
                                            @if (isset($categories))
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div>
                                        <a data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-square-o fz-2rem pt-2"></i></a>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">{{ __('Brand') }}</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" id="brands" name="brands" required
                                            data-toggle="select2">
                                            @isset($brands)
                                                @foreach ($brands as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                    </div>
                                    <div id="formAddBrand">
                                        <a data-toggle="modal" data-target="#addBrand"><i class="fa fa-plus-square-o fz-2rem pt-2"></i></a>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="password" class="control-label col-lg-3">{{ __('Description') }}</label>
                                    <div class="col-lg-6">
                                        <textarea class="ckeditor" id="content"
                                            name="content">{{ old('content') }}</textarea>
                                    </div>
                                </div>

                                {{--  <div class="form-group ">
                                    <label for="" class="control-label col-lg-3">Danh mục trang chủ</label>
                                    <div class="col-lg-6">
                                        <select class="form-control m-bot15" name="ordernum" required>
                                            <option value="0" checked>Không hiển thị trang chủ</option>
                                            <option value="1">Sản phẩm nổi bật</option>
                                            <option value="2">Sản phẩm mới</option>
                                        </select>
                                    </div>
                                </div>  --}}
                                <div class="form-group ">
                                    <label for="sellprice" class="control-label col-lg-3">{{ __('Status') }}</label>
                                    <div class="col-lg-6">
                                        <label>
                                            <input type="radio" name="status" id="" value="1" checked="checked">
                                            {{ __('Show') }}
                                            <input type="radio" name="status" id="" value="0">
                                            {{ __('Hide') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-lg-3">{{ __('Tags') }}</label>
                                    <div class="col-lg-6">
                                        <select name="tags[]" class="form-control multi-tag" style="width: 500px"
                                            multiple="multiple">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <section class="panel">
                                        <header class="panel-heading">
                                            {{ __('More Information') }}
                                        </header>
                                        <div class="panel-body">
                                            <div class="form">
                                                <div>
                                                    <div class="form-group">
                                                        <div class="col-lg-4 text-center"><b>{{ __('Name') }}</b></div>
                                                        <div class="col-lg-8 text-center"><b>{{ __('Description') }}</b></div>
                                                    </div>
                                                </div>
                                                <div class="content-infor">
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-4 d-right">
                                                        <button class="btn btn-success" id="add-infor"
                                                            type="button">{{ __('Add') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="form-group">
                                    <div class="text-right mr-5">
                                        <button class="btn btn-primary" type="submit">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-lg-3">Tên danh mục</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="btn-save-category">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm thương hiệu sản phẩm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-lg-12">Tên thương hiệu</label>
                        <input class="form-control" name="name" type="text" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-12">Mô tả</label>
                        <input class="form-control" name="info" type="text" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="btn-save-brand">Lưu</button>
                </div>
            </div>
        </div>
    </div>

    @include('backend.product.product_js')
@endsection
@section('scripts')
@endsection
