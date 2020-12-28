@extends('backend.master.admin_master')
@section('title')
    Danh sách các banner
@endsection
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div>
                <a class="btn btn-primary" href="{{ route('admin.banner.create') }}" role="button">Thêm banner</a>
            </div>
            <div class="panel-heading">
                Danh mục banner
                
            </div>
            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            <table class="table table-striped b-t b-light tableData">

                <tr>
                    <th>STT</th>
                    <th>Tên Banner</th>
                    <th>Liên kết</th>
                    <th>Hình Ảnh</th>
                    <th>Trạng thái</th>
                    <th>Thứ tự</th>
                    <th></th>
                </tr>
                <?php $stt = 1; ?>
                @foreach ($banners as $ban)
                    <tr class="itemsBanner">
                        <td>{{ $stt++ }}</td>
                        <td>{{ $ban->name }}</td>
                        <td>{{ $ban->link }}</td>
                        <td><img src="../storage/{{ $ban->image }}" width="100" height="100"></td>
                        <td id="status{{ $ban->id }}">
                            @if ($ban->status == 0)
                                {{--  <a href="{{ route('admin.banner.active', ['id' => $ban->id]) }}">Ẩn</a>  --}}
                                <button class="btn btn-danger btnUnactive" type="button" data-id="{{ $ban->id }}">Ẩn</button>
                            @elseif($ban->status==1)
                                {{--  <a href="{{ route('admin.banner.unactive', ['id' => $ban->id]) }}">Hiện</a>  --}}
                                <button class="btn btn-success btnActive" type="button" data-id="{{ $ban->id }}">Hiện</button>
                            @endif
                        </td>
                        <td>{{ $ban->ordernum }}</td>
                        <td>
                            <a href="{{ route('admin.banner.edit', ['id' => $ban->id]) }}"><i style="font-size: 20px"
                                    class="fa fa-pencil text-success text-active"></i></a>
                            <a data-toggle="modal" data-target="#destroyBanner" data-id="{{ $ban->id }}" class="destroy"><i
                                    class="fa fa-trash-o" style="font-size:24px"></i></a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroyBanner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa banner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="formDestroyBanner" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <p>Bạn có chắc chắn xóa banner này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        let id;
        let destroy = document.querySelectorAll('.destroy');
        if (destroy) {
            Array.from(destroy).forEach(function(e){
                e.addEventListener('click', function() {
                    id = this.dataset.id;
                });
            })
            
            document.querySelector('#button-destroy').addEventListener('click', function() {
                let api = '/admin/banner/' + id;
                submitApi('#destroyBanner', api);
            })
        }
        //active or unactive
        $('.itemsBanner').on('click','.btnUnactive',function(){
            let id=$(this).data('id');
            let url='/admin/banner/active/'+id;
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
        $('.itemsBanner').on('click','.btnActive',function(){
            let id=this.dataset.id;
            let url='/admin/banner/unactive/'+id;
            $.get(url,function(data,status){
                if(data.status==true){
                    let elementStatus=document.querySelector('#status'+id);
                    elementStatus.innerHTML=`<button class="btn btn-danger btnUnactive" type="button" data-id="${id}">Ẩn</button>`;
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
