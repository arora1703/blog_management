
    @if(Session::has('success'))
    swal({
    title: "Good job!",
    text: "{{ Session::get('success') }}",
    icon: "success",
    timer: 1500
    });
    @elseif(Session::has('warning'))
    swal({
    title: "OOPsy!",
    text: "{{ Session::get('warning') }}",
    icon: "warning",
    timer: 1500
    });
    @elseif(Session::has('danger'))
    swal({
    title: "No!! No!!",
    text: "{{ Session::get('danger') }}",
    icon: "error",
    timer: 3000
    });
    @endif
    