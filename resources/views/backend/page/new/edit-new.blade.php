@extends('backend.master.admin_master')
@section('title')
    Chỉnh sửa tin tức
@endsection
@section('main-content')
<div class="row"><div class="table-agile-info">
                 <div class="panel panel-default">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Chỉnh sửa tin tức
                        </header>
                        <div class="panel-body">
                        	
                            <div class="position-center">
                                @foreach($new as  $n)
                                <form role="form" method="post" action="{{route('post-edit',['id'=>$n->id])}}"  enctype="multipart/form-data">
                                    @csrf
                                    
                                <div class="form-group">
                                    <label for="product">Tiêu đề tin tức</label>
                                    <input type="text" name="title" class="form-control" id="banner" value="{{$n->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="product">Nội dung</label>
                                    <textarea class="ckeditor" id="content" name="content">
                                        {!! $n->content !!}
                                    </textarea>
                                </div>
                                
                             
                                <div class="form-group">
                                    <label for="mota">Trạng thái</label>
                                    <select name="status" class="form-control input-sm m-bot15">
                                        <option value="0" @if ($n->status==0)
                                            {{ 'selected' }}
                                        @endif>Ẩn</option>
                                        <option value="1" @if ($n->status==1)
                                            {{ 'selected' }}
                                        @endif>Hiện</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="edit_new" class="btn btn-info">Cập nhật tin tức</button>
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