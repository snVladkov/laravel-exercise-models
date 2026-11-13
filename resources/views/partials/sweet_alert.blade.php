{{-- флаш съобщенията са изнесени в partial, за да се преизползват в layout и в admin layout --}}

@if (Session::has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            swalNotify('success', '{{ Session::get('success') }}');
        });
    </script>
@endif

@if (Session::has('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            swalNotify('error', '{{ Session::get('error') }}');
        });
    </script>
@endif
