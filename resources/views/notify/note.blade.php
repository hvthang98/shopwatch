@if (session()->has('notification'))
<script>
    var notify="{{ session()->get('notification') }}";
    // alert(notify);
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: notify,
        showConfirmButton: false,
        timer: 1500
    })
</script>
@endif
