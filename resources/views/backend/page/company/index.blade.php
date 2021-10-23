@extends('backend.layouts.admin_master')
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Thông tin cửa hàng
            </div>
            <div class="panel-body">
                <div class="form">
                    @if (count($errors) > 0)
                        @include('error.Note')
                    @endif
                    <form class="cmxform form-horizontal " id="" method="POST"
                        action=" {{ route('admin.company.store') }} " enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-3">Địa chỉ</label>
                            <div class="col-lg-6">
                                <input class=" form-control" name="address" type="text" value="{{ $company ? $company->address:''  }}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="price" class="control-label col-lg-3">Email</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="email" type="email" value="{{ $company ? $company->email:''  }}">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="sellprice" class="control-label col-lg-3">Điện thoại</label>
                            <div class="col-lg-6">
                                <input class="form-control only-number" name="phone" type="text" required
                                value="{{ $company ? $company->phone:''  }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
