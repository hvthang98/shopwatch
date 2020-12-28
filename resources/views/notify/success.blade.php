@if (session()->has('notification'))
<script>
    var message="{{ session()->get('notification') }}";
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: message,
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
