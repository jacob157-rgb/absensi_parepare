<script>
    $(document).ready(function() {

        // Fetch provinsi
        $.ajax({
            url: '/provinsi',
            type: 'GET',
            success: function(data) {
                let options = '<option value="">Pilih Provinsi</option>';
                data.provinsi.forEach(prov => {
                    options += `<option value="${prov.name}">${prov.name}</option>`;
                });
                $('#provinsi').html(options).trigger('change');
            }
        });

        // Fetch kabupaten based on provinsi
        $('#provinsi').on('change', function() {
            const provinsiId = $(this).val();
            $.ajax({
                url: '/kabupaten',
                type: 'GET',
                data: {
                    provinsi: provinsiId
                },
                success: function(data) {
                    let options = '<option value="">Pilih Kabupaten</option>';
                    data.kabupaten.forEach(kab => {
                        options +=
                            `<option value="${kab.name}">${kab.name}</option>`;
                    });
                    $('#kabupaten').html(options);
                    $('#kecamatan').html('<option value="">Pilih Kecamatan</option>');
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
                }
            });
        });

        // Fetch kecamatan based on kabupaten
        $('#kabupaten').on('change', function() {
            const kabupatenId = $(this).val();
            $.ajax({
                url: '/kecamatan',
                type: 'GET',
                data: {
                    kabupaten: kabupatenId
                },
                success: function(data) {
                    let options = '<option value="">Pilih Kecamatan</option>';
                    data.kecamatan.forEach(kec => {
                        options +=
                            `<option value="${kec.name}">${kec.name}</option>`;
                    });
                    $('#kecamatan').html(options);
                    $('#kelurahan').html('<option value="">Pilih Kelurahan</option>');
                }
            });
        });

        // Fetch kelurahan based on kecamatan
        $('#kecamatan').on('change', function() {
            const kecamatanId = $(this).val();
            $.ajax({
                url: '/kelurahan',
                type: 'GET',
                data: {
                    kecamatan: kecamatanId
                },
                success: function(data) {
                    let options = '<option value="">Pilih Kelurahan</option>';
                    data.kelurahan.forEach(kel => {
                        options +=
                            `<option value="${kel.name}">${kel.name}</option>`;
                    });
                    $('#kelurahan').html(options);
                }
            });
        });
    });
</script>
