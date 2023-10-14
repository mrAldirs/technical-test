@if (Session::has('failed'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Login',
            text: '{{ Session::get('failed') }}',
        })
    </script>
@endif
