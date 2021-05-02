<!-- Modal popup -->
<div class="modal fade" id="modal-popup-ajax" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">

            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="destroyForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comfirm delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    @method('delete')
                    @csrf
                    Bạn có chắc chắn xóa dữ liệu này?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit form -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="form" style="padding:40px"></div>
        </div>
    </div>
</div>


<script>
    function notify($status, $message) {
        Swal.fire({
            position: 'top-end',
            icon: $status,
            title: $message,
            showConfirmButton: false,
            timer: 1500
        });
    }

    $(document).ready(function() {
        $('.only-number').on('keyup', function() {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });

        $('.destroy-button').on('click', function() {
            let link = $(this).data('link');
            $('#destroyForm form').attr('action', link);
        })

        $('[data-target="#modalForm"]').on('click', function(e) {
            e.preventDefault();
            let link = $(this).data('link');
            $.ajax({
                url:link,
                data:{},
                success: function(response){
                    $('#modalForm .form').html(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(document).on('click','[data-popup-ajax="true"]',function(e){
            e.preventDefault();
            let url = $(this).data('target');
            $.ajax({
                url: url,
                success: function(res){
                    $('#modal-popup-ajax .modal-body').html(res);
                    $('#modal-popup-ajax').modal('show');
                },
                error: function(err) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            })
        });
    })

</script>
