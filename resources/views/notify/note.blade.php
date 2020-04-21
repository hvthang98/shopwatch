@if (session()->has('notification'))
<script>
    var notify="{{ session()->get('notification') }}";
    alert(notify);
</script>
@endif
