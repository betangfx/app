$(document).ready(function() {
    $('#globalModal').on('show.bs.modal', function(e) {
        var size = $(e.relatedTarget).data('size');
        var action = $(e.relatedTarget).data('action');
        var sub = $(e.relatedTarget).data('sub');
        var header = $(e.relatedTarget).data('header');
        var folder = $(e.relatedTarget).data('folder');
        var page = $(e.relatedTarget).data('page');
        var id = $(e.relatedTarget).data('id');
        var UserID = $(e.relatedTarget).data('UserID');
        if (action == 'tambah') {
            $('#globalModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#globalModal .modal-title').text('Form ' + header);
            $('#globalModal .modal-header .close').hide();
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../page/' + folder + '/' + page + '.form.php',
                data: { 'ID': id, 'UserID': UserID, 'modul': modul, 'sub': sub },
                success: function(data) {
                    var divs = data.split('---');
                    $('#globalModal .modal-body-data').html(divs[0]);
                    $('#globalModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'ubah') {
            $('#globalModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#globalModal .modal-title').text('Form ' + header + ' ID: ' + id);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../page/' + folder + '/' + page + '.form.php',
                data: { 'ID': id, 'UserID': UserID, 'modul': modul, 'sub': sub },
                success: function(data) {
                    var divs = data.split('---');
                    $('#globalModal .modal-body-data').html(divs[0]);
                    $('#globalModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'hapus') {
            $('#globalModal .modal-dialog').removeClass('modal-dialog').removeClass('modal-dialog').removeClass('modal-lg').addClass('modal-dialog').addClass('modal-' + size);
            $('#globalModal .modal-title').text('Form ' + header + ' ID: ' + id);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../page/' + folder + '/' + page + '.form.php',
                data: { 'ID': id, 'UserID': UserID, 'modul': modul, 'sub': sub },
                success: function(data) {
                    var divs = data.split('---');
                    $('#globalModal .modal-body-data').html(divs[0]);
                    $('#globalModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'lihat') {
            $('#globalModal .modal-dialog').removeClass('modal-dialog').removeClass('modal-dialog').removeClass('modal-lg').addClass('modal-dialog').addClass('modal-' + size);
            $('#globalModal .modal-title').text('');
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../page/' + folder + '/' + page + '.form.php',
                data: { 'ID': id, 'UserID': UserID, 'modul': modul, 'sub': sub },
                success: function(data) {
                    var divs = data.split('---');
                    $('#globalModal .modal-body-data').html(divs[0]);
                    $('#globalModal .modal-footer-data').html(divs[1]);
                }
            });

        }
    });


    $('#newModal').on('show.bs.modal', function(e) {
        var action = $(e.relatedTarget).data('action');
        var size = $(e.relatedTarget).data('size');
        var header = $(e.relatedTarget).data('header');
        var sub_header = $(e.relatedTarget).data('sub-header');
        var module = $(e.relatedTarget).data('module');
        var sub = $(e.relatedTarget).data('submodule');
        var folder = $(e.relatedTarget).data('folder');
        var page = $(e.relatedTarget).data('form');
        var id = $(e.relatedTarget).data('id');
        var UserID = $(e.relatedTarget).data('userid');
        if (action == 'tambah') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            $('#newModal .modal-header .close').hide();
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'ubah') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'lihat') {
            $('#newModal .modal-dialog').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text(header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
        if (action == 'hapus') {
            $('#newModal .modal-dialog').removeClass('modal-dialog').removeClass('modal-dialog').removeClass('modal-lg').addClass('modal-dialog').addClass('modal-' + size);
            $('#newModal .modal-title').text('Form ' + header + ' ' + sub_header);
            var modul = action + '_' + page;
            $.ajax({
                type: 'POST',
                url: '../modules/' + folder + '/' + module + '/' + page + '.form.php',
                data: { 'ID': id, 'modul': modul, 'submodul': sub, 'UserID': UserID },
                success: function(data) {
                    var divs = data.split('---');
                    $('#newModal .modal-body-data').html(divs[0]);
                    $('#newModal .modal-footer-data').html(divs[1]);
                }
            });

        }
    });
});