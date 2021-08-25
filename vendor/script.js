const pesan = $('.notif').data('pesan');
const alertType = $('.notif').data('alert');

// cek pesan 
if (pesan) {
    // cek tipe alertnya
    const title = (alertType == 'success') ? 'Success' : 'Failed';
    Swal.fire({
        icon: alertType,
        title: title,
        text: pesan
    });
}

$('input[type=checkbox].pass-open').on('change', function () {
    const pass = document.querySelector('input[type=password].reset-pass');
    if (pass.hasAttribute('readonly')) {
        pass.removeAttribute('readonly');
    } else {
        pass.setAttribute('readonly', 'raedonly');
    }
});

$('select[name=accessibility]').on('change', function () {
    const value = this.value;
    let helpText = '';
    switch (value) {
        case '2':
            helpText = 'Your Todoo can see with others ( public ).';
            break;

        default:
            helpText = 'Nobody else know your todoo , just only for you.';
            break;
    }

    document.querySelector('.info-text-access').innerText = helpText;

});

// Menghapus Todo
$('.remove-todo').on('click', function (e) {
    e.preventDefault();

    const hapus = $(this).attr('href');

    Swal.fire({
        icon: 'warning',
        title: 'Removed ??',
        text: 'Your Todoo Will Remove Permanently',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Remove',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33'
    }).then((result) => {
        if (result.value) {
            document.location.href = hapus;
        }
    });
});

// activation tooltip bootsrap
$('[data-toggle="tooltip"]').tooltip();
$('[data-custom="tooltip"]').tooltip();