<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






@if(session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif


@if(session('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif



