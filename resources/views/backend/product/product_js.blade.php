<script>
    $(".multi-tag").select2({
        tags: true,
        tokenSeparators: [',']
    })
    $('#btn-save-category').on('click', function() {
        let url = '/api/category';
        let name = $('#addCategory input[name="name"]').val();
        $.post(url, {
            name: name,
        }, function(data) {
            let html = `<option value="${data.data.id}">${data.data.name}</option>`;
            $('#category').append(html);
            Swal.fire({
                position: 'top-end',
                width: 600,
                icon: 'success',
                title: 'Thêm danh mục thành công',
                showConfirmButton: false,
                timer: 800
            })
        })
        $('#addCategory input[name="name"]').val('');
        $('#addCategory').modal('hide');
    });

    $('#btn-save-brand').on('click', function(event) {
        let url = '/api/brand';
        let name = $('#addBrand input[name="name"]').val();
        let info = $('#addBrand input[name="info"]').val();
        let category_id = $('select[name="category"]').val();
        $.post(url, {
            name: name,
            info: info,
            status: 1,
        }, function(data) {
            if (data.status == true) {
                let html = `<option value="${data.data.id}">${data.data.name}</option>`;
                $('#brands').append(html);
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'success',
                    title: 'Thêm thương hiệu thành công',
                    showConfirmButton: false,
                    timer: 800
                })
            } else {
                Swal.fire({
                    position: 'top-end',
                    width: 600,
                    icon: 'error',
                    title: 'Thêm thương hiệu không thành công',
                    showConfirmButton: false,
                    timer: 800
                })
            }
        })
        $('#addBrand input[name="name"]').val('');
        $('#addBrand input[name="info"]').val('');
        $('#addBrand').modal('hide');
    })

    $('#add-infor').click(function() {
        let content =
            `<div class="form-group">
                <div class="col-lg-4">
                    <input class="form-control name_infor" required>
                </div>
                <div class="col-lg-7">
                    <textarea class="form-control content_infor" rows="3" required></textarea>
                </div>
                <div class="col-lg-1">
                    <i class="fa fa-remove remove-infor" style="font-size:24px;color:red;cursor: pointer;"></i>
                </div>
            </div>`;
        $('.content-infor').append(content);
        resetNameInfor();
    });

    function resetNameInfor() {
        let nameElement = document.querySelectorAll('.name_infor');
        let contentElement = document.querySelectorAll('.content_infor');
        Array.from(nameElement).forEach(function(item, key) {
            item.name = `infor[${key+1}][name]`;
        });
        Array.from(contentElement).forEach(function(item, key) {
            item.name = `infor[${key+1}][content]`;
        });
    }
    
    $('.content-infor').on('click', '.remove-infor', function() {
        $(this).parent().parent().remove();
        resetNameInfor();
    })
</script>
