$(document).ready(function() {
    $('#submitButton, #findMaps').click(function(event) {
        event.preventDefault();
        requestLocation();
    });

    function requestLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        } else {
            Swal.fire({
                title: 'Geolocation Tidak Didukung',
                text: 'Geolocation tidak didukung oleh browser ini.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }

    function successCallback(position) {
        if (!$('#latitude').length) {
            $('<input>').attr({
                type: 'hidden',
                name: 'latitude',
                id: 'latitude',
                value: position.coords.latitude
            }).appendTo('#loginForm, #searchLocation');
        } else {
            $('#latitude').val(position.coords.latitude);
        }

        if (!$('#longitude').length) {
            $('<input>').attr({
                type: 'hidden',
                name: 'longitude',
                id: 'longitude',
                value: position.coords.longitude
            }).appendTo('#loginForm, #searchLocation');
        } else {
            $('#longitude').val(position.coords.longitude);
        }

        $('#loginForm, #searchLocation').off('submit').submit();
    }

    function errorCallback(error) {
        let errorMessage = "";
        switch (error.code) {
            case error.PERMISSION_DENIED:
                errorMessage =
                    "Pengguna menolak permintaan lokasi. Untuk melanjutkan, aktifkan izin lokasi di pengaturan browser Anda.";
                break;
            case error.POSITION_UNAVAILABLE:
                errorMessage = "Informasi lokasi tidak tersedia.";
                break;
            case error.TIMEOUT:
                errorMessage = "Permintaan lokasi melebihi batas waktu.";
                break;
            case error.UNKNOWN_ERROR:
                errorMessage = "Terjadi kesalahan yang tidak diketahui.";
                break;
        }

        Swal.fire({
            title: 'Izin Lokasi Dibutuhkan',
            text: errorMessage,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Pelajari Cara Mengatur',
            cancelButtonText: 'Coba Lagi',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/privacy_location";
            } else {
                $('#submitButton').trigger('click');
            }
        });
    }


});
