@extends('backend.master.admin_master')
@section('title')
Danh sách tin tức
@endsection
@section('main-content')
<style>
    .news-content {
        padding: 10px;
        overflow: hidden;
        width: 600px;
        height: 220px;
    }

</style>
<div class="table-agile-info">
    <div class="panel">
        <div>
            <a class="btn btn-primary" href="{{ route('admin.news.create') }}" role="button">Thêm tin tức mới</a>
        </div>
        <div class="panel-heading">
            Danh mục tin tức
        </div>
        <table class="table table-striped b-t b-light">
            <tr>
                <th style="text-align: center;">STT</th>
                <th style="text-align: center;">Tiêu đề tin</th>
                <th style="text-align: center;">Nội dung</th>
                <th style="text-align: center;">Hình Ảnh</th>
                <th style="text-align: center;">Trạng thái</th>
                <th></th>
            </tr>
            <?php $stt=$news->firstItem() ?>
            
            @foreach($news as $key=>$new)
                <tr class="items">
                    <td>{{ $stt++ }}</td>
                    <td>{{ $new->title }}</td>
                    <td>
                        <div class="news-content">
                            {!! $new->content !!}
                        </div>
                    </td>
                    <td><img src="storage/{{ $new->image }}" width="100" height="100"></td>
                    <td style="text-align: center;" id="status{{ $new->id }}">
                        @if($new->status==0)
                            <button class="btn btn-danger btnUnactive" type="button" data-id="{{ $new->id }}">Ẩn</button>
                        @elseif($new->status==1)
                            <button class="btn btn-success btnActive" type="button" data-id="{{ $new->id }}">Hiện</button>
                        @endif
                    </td>
                    <td>
                        <a
                            href="{{ route('admin.news.edit',['id'=>$new->id]) }}"><i
                                style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                        <a class="destroy" data-toggle="modal" data-target="#destroyNews" title="Xóa" data-id="{{ $new->id }}"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $news->links() }}
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="destroyNews" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa thương hiệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="formDestroyBanner" method="post">
                    @csrf
                    @method('DELETE')
                </form>
                <p>Bạn có chắc chắn xóa tin tức này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
            </div>
        </div>
    </div>
</div>
<script>
    destroyItems('/admin/news/','#destroyNews');
    //active or unactive
    $('.items').on('click','.btnUnactive',function(){
        let id=$(this).data('id');
        let url='/admin/news/active/'+id;
        $.get(url,function(data,status){
            if(data.status==true){
                let elementStatus=$('#status'+id);
                elementStatus.html(`<button class="btn btn-success btnActive" type="button" data-id="${id}">Hiện</button>`);
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 800
                })
            }
            else{
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'error',
                    title: 'Lỗi server',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            
        })
    })
    $('.items').on('click','.btnActive',function(){
        let id=this.dataset.id;
        let url='/admin/news/unactive/'+id;
        $.get(url,function(data,status){
            console.log(data);
            if(data.status==true){
                let elementStatus=$('#status'+id);
                elementStatus.html(`<button class="btn btn-danger btnUnactive" type="button" data-id="${id}">Ẩn</button>`);
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'success',
                    title: data.message,
                    showConfirmButton: false,
                    timer: 800
                })
            }
            else{
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'error',
                    title: 'Lỗi server',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        })
    })
</script>
@endsection
