$(document).ready(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        $.fn.dataTable
            .tables({ visible: true, api: true })
            .columns.adjust();
    })
    $('table.table').DataTable({
        scrollY: 500,
        scrollCollapse: true,
        paging: false
    });

    table = $('#list-rencana').DataTable({
        retrieve: true,
        responsive: true,
        "pagingType": "simple"
    });
    table = $("#list-jurnal").DataTable({
        retrieve: true,
        responsive: true,
        "pagingType": "simple"
    });
    table = $('#list-rangkaian').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-struktur').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-pola').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-posisi').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-tipe').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-derajat').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-aturan').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list-joinaturan').DataTable({
        columnDefs: [{
            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $('#list_ringkasan_akun, #list_info_akun').DataTable({
        retrieve: true,
        searching: false,
        "paging": false,
        "info": false,
        "ordering": false,
        columnDefs: [{

            targets: -1,
            className: 'dt-body-center'
        }]
    });
    table = $("#list_tambah_dana, #list_tarik_dana").DataTable({
        retrieve: true,
        responsive: true,
        "pagingType": "simple"
    });
});