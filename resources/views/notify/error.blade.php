@if (session()->has('error'))
<script>
    var message="{{ session()->get('error') }}";
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
