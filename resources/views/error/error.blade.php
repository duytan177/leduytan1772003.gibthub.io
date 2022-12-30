<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.16/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.16/sweetalert2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous">
</script>
@if ($errors->any())
    <div class="alert alert-danger  alert-dismissible d-flex align-items-center fade show">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(Session::has('error'))
{{-- <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show">
    <i class='bx bx-error-alt' ></i>
    <strong class="mx-2">Error!</strong> {{Session::get('error')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div> --}}
@php
$error = json_encode(Session::get('error'));
@endphp
<script>
    var error = <?php echo $error ?>;
    Swal.fire({
        title: error,
        icon: 'error',
        showCloseButton: true,
    })
</script>
@endif

@if(Session::has('success'))
 @php
    $success = json_encode(Session::get('success'));
 @endphp
<script>
    var success = <?php echo $success ?>;
    Swal.fire({
        title: success,
        icon: 'success',
        showCloseButton: true,
    })
</script>
@endif