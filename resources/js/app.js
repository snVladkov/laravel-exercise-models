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