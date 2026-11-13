import Swal from 'sweetalert2';

window.swalNotify = function (type, message) {
    Swal.fire({
        icon: type,
        title: message,
        toast: true,
        position: "top",
        timer: 8000,
        timerProgressBar: true,
        showConfirmButton: false,
        showCloseButton: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
}

window.swalDeleteConfirm = function (event, message) {
    event.preventDefault();
    const form = event.target;
    Swal.fire({
        title: 'Are you sure?',
        text: message,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}