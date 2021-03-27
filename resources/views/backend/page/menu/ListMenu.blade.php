@extends('backend.master.admin_master')
@section('title')
    Danh sách các banner
@endsection
@section('main-content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div>
                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#modalForm"
                    data-link={{ route('admin.menu.create') }} role="button">Thêm menu</a>
            </div>
            <div class="panel-heading">
                Danh mục menu
            </div>
            @if (session('status'))
                <div class="alert alert-info">
                    <p style="text-align: center;color: red;">{{ session('status') }}</p>
                </div>
            @endif
            @if (count($errors->all()) > 0)
                @include('error.Note')
            @endif()
            <table class="table table-striped b-t b-light tableData">
                <tr>
                    <th>STT</th>
                    <th>Tên menu</th>
                    <th>Trạng thái</th>
                    <th>Sub menu</th>
                    <th>Thứ tự</th>
                    <th></th>
                </tr>
                <?php $stt = 1; ?>
                @isset($menus)
                    @foreach ($menus as $key => $menu)
                        <tr class="itemsMenu">
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $menu->name }}</td>
                            <td id="status{{ $menu->id }}">
                                @if ($menu->status == 0)
                                    <button class="btn btn-danger btnUnactive" type="button"
                                        data-id="{{ $menu->id }}">Ẩn</button>
                                @elseif($menu->status==1)
                                    <button class="btn btn-success btnActive" type="button"
                                        data-id="{{ $menu->id }}">Hiện</button>
                                @endif
                            </td>
                            <td id="submenu{{ $menu->id }}" data-id="{{ $menu->id }}" class="submenu">
                                <ul></ul>
                                <button class="btn btn-primary add-submenu" data-toggle="modal" data-target="#addSubMenu"
                                    type="button" data-id="{{ $menu->id }}">Chỉnh sửa</button>
                            </td>
                            <td>{{ $menu->ordernum }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#modalForm"
                                    data-link="{{ route('admin.menu.edit', ['id' => $menu->id]) }}"><i
                                        style="font-size: 20px" class="fa fa-pencil text-success text-active"></i></a>
                                <a href="#" data-toggle="modal" data-target="#destroy" data-id="{{ $menu->id }}"
                                    class="destroy"><i class="fa fa-trash-o" style="font-size:24px"></i></a>
                            </td>
                        </tr>
                    @endforeach

                @endisset
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="destroy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <p>Bạn có chắc chắn xóa menu này?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-danger" id="button-destroy">Xóa</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSubMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Danh mục sản phẩm</label>
                            @isset($categories)
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="category"
                                            value="{{ $category->id }}">
                                        <label class="form-check-label">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <div class="col-lg-6">
                            <label class="font-weight-bold">Thương hiệu</label>
                            @isset($brands)
                                @foreach ($brands as $brand)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand"
                                            value="{{ $brand->id }}">
                                        <label class="form-check-label">
                                            {{ $brand->name }}
                                        </label>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                    <button type="button" class="btn btn-primary" id="button-save-submenu">Lưu</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        destroyItems('/admin/menu/', '#destroy');
        //active or unactive
        $('.itemsMenu').on('click', '.btnUnactive', function() {
            let id = $(this).data('id');
            let url = '/admin/menu/active';
            $.post(url, {
                id: id
            }, function(data, status) {
                if (data.status == true) {
                    let elementStatus = $('#status' + id);
                    elementStatus.html(
                        `<button class="btn btn-success btnActive" type="button" data-id="${id}">Hiện</button>`
                    );
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 800
                    })
                } else {
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
        $('.itemsMenu').on('click', '.btnActive', function() {
            let id = this.dataset.id;
            let url = '/admin/menu/unactive';
            $.post(url, {
                id: id
            }, function(data, status) {
                if (data.status == true) {
                    let elementStatus = document.querySelector('#status' + id);
                    elementStatus.innerHTML =
                        `<button class="btn btn-danger btnUnactive" type="button" data-id="${id}">Ẩn</button>`;
                    Swal.fire({
                        position: 'top-end',
                        width: 600,
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 800
                    })
                } else {
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
        /**
         * show submenu
         */
        const eClassSubmenu = document.querySelectorAll('.submenu');
        Array.from(eClassSubmenu).forEach(e => {
            let id = e.dataset.id;
            const eSubmenu = $('#submenu' + id + ' ul');
            $.get('api/menu/brand/' + id, {}, function(data) {
                let name = data.data.map(item => item.brand.name);
                let html = name.map(item => `<li>${item}</li>`).join('');
                eSubmenu.append(html);
            });
            $.get('api/menu/category/' + id, {}, function(data) {
                let name = data.data.map(item => item.category.name);
                let html = name.map(item => `<li>${item}</li>`).join('');
                eSubmenu.append(html);
            })
        })
        /**
         * save submenu
         */
        const eMenu = document.querySelectorAll('.add-submenu');
        const eBrand = document.querySelectorAll('input[name="brand"]');
        const eCategory = document.querySelectorAll('input[name="category"]');
        let idMenu;
        Array.from(eMenu).forEach(function(e) {
            e.addEventListener('click', function() {
                idMenu = this.dataset.id;
                $.get('api/menu/brand/' + idMenu, {}, function(data) {
                    let brand = data.data.map(item => item.brands_id);
                    Array.from(eBrand).forEach(function(e) {
                        if (brand.indexOf(parseInt(e.value)) >= 0) {
                            e.checked = true;
                        } else {
                            e.checked = false;
                        };
                    })
                });
                $.get('api/menu/category/' + idMenu, {}, function(data) {
                    let category = data.data.map(item => item.categories_id);
                    Array.from(eCategory).forEach(function(e) {
                        if (category.indexOf(parseInt(e.value)) >= 0) {
                            e.checked = true;
                        } else {
                            e.checked = false;
                        };
                    })
                })
            })
        })
        $('#button-save-submenu').on('click', function() {
            let idBrand = [];
            let idCategory = [];
            let list = [];
            const eSubmenu = $('#submenu' + idMenu + ' ul');
            eSubmenu.html('');
            const brand = document.querySelectorAll('input[name="brand"]:checked');
            const category = document.querySelectorAll('input[name="category"]:checked');
            if (brand) {
                Array.from(brand).forEach(function(e) {
                    idBrand.push(e.value);
                });
            }
            if (category) {
                Array.from(category).forEach(function(e) {
                    idCategory.push(e.value);
                })
            }
            $.post('api/menu/brand/create', {
                menus_id: idMenu,
                brands_id: idBrand,
            }, function(data) {
                if (data.status == true && data.data != []) {
                    data.data.forEach(function(eData) {
                        let html = `<li>${eData.brand.name}</li>`
                        eSubmenu.append(html);
                    })
                }
            });
            $.post('api/menu/category/create', {
                menus_id: idMenu,
                categories_id: idCategory,
            }, function(data) {
                if (data.status == true && data.data != []) {
                    data.data.forEach(function(eData) {
                        let html = `<li>${eData.category.name}</li>`
                        eSubmenu.append(html);
                    })
                }
            });
            $('#addSubMenu').modal('hide');
        });

    </script>

@endsection
