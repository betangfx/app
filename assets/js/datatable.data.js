$(document).ready(function() {
	$("#list-analisa").DataTable({
		responsive: true,
		"pagingType": "simple"
	});
	$("#list-rencana").DataTable({
		responsive: true,
		"pagingType": "simple"
	});
	$("#list-jurnal").DataTable({
		responsive: true,
		"pagingType": "simple"
	});
	$('#list-rangkaian').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-struktur').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-pola').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-posisi').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-tipe').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-derajat').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-aturan').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list-joinaturan').DataTable( {
		columnDefs: [
			{
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$('#list_ringkasan_akun, #list_info_akun').DataTable( {
		searching: false,
		"paging": false,
		"info": false,
		"ordering": false,
		columnDefs: [
			{
				
				targets: -1,
				className: 'dt-body-center'
			}
		]
	} );
	$("#list_tambah_dana, #list_tarik_dana").DataTable({
		responsive: true,
		"pagingType": "simple"
	});
});