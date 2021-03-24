<!-- Modal -->
<div class="modal fade" id="destroyForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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


    })

</script>
