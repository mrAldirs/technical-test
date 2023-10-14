@if (Session::has('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: true,
            timer: 3000
        });
    </script>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('saveButton').addEventListener('click', function() {
            Swal.fire({
                title: 'Apakah Anda ingin mengubah data?',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                denyButtonText: `Jangan Simpan`,
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editForm').submit();
                } else if (result.isDenied) {
                    Swal.fire('Perubahan tidak disimpan!', '', 'info');
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.btn-danger');

        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah perilaku default tombol
                const form = this.parentElement;

                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan menghapus data ini secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Tidak, Batalkan',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirimkan formulir ketika dikonfirmasi
                    }
                }).catch((error) => {
                    console.log(error);
                });
            });
        });
    });
</script>
