@extends('backend.master.admin_master')
@section('title')
   Chỉnh sửa banner
@endsection
@section('main-content')
<div class="row"><div class="table-agile-info">
                 <div class="panel panel-default">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa banner
                        </header>
                        <div class="panel-body">
                        	
                            <div class="position-center">
                                @foreach($banners as  $ban)
                                <form role="form" method="post" action="{{route('edit-banner',['id'=>$ban->id])}}"  enctype="multipart/form-data">
                                    @csrf
                                    
                                <div class="form-group">
                                    <label for="product">Tên Banner</label>
                                    <input type="text" name="edit_banner_name" class="form-control" id="banner" value="{{$ban->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="product">Liên kết Banner</label>
                                    <input type="text" name="edit_banner_link" class="form-control" id="product" value="{{$ban->link}}">
                                </div>
                                <div class="form-group">
                                    <label for="product">Hình ảnh </label>
                                    <input type="file" name="edit_banner_img" class="form-control" id="product" >
                                    
                                </div>
                             
                                <div class="form-group">
                                    <label for="mota">Trạng thái</label>
                                    <select name="edit_banner_status" class="form-control input-sm m-bot15">
                                        <option value="0" @if ($ban->status==0)
                                            {{ 'selected' }}
                                        @endif>Ẩn</option>
                                        <option value="1" @if ($ban->status==1)
                                            {{ 'selected' }}
                                        @endif>Hiện</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="banner_ordernum">Order num</label>
                                    <input type="text" name="edit_banner_ordernum" class="form-control" id="banner_ordernum" value="{{$ban->ordernum}}">
                                </div>
                                <button type="submit" name="edit_banner" class="btn btn-info">Cập nhật banner</button>
                            </form>
                            </div>
                            @endforeach

                        </div>
                    </section>

            </div>
           </div>
       </div>
        </div>
@endsection