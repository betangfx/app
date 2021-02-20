<?php
	error_reporting(0);
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$modul 		= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$id			= isset($_POST['ID']) ? $_POST['ID'] : NULL;
	$UserID		= isset($_POST['UserID']) ? $_POST['UserID'] : NULL;
	
	if ($modul == 'tambah_jurnal') {
		$NoJurnal = NoJurnal($id, $UserID);
		$DJRencanaID = '';
		$DJPasar = '';
		$DJPasarID = '';
		$DJSymbol = '';
		$DJSymbolID = '';
		$DJJangkaWaktu = '';
		$DJJangkaWaktuID = '';
		$DJRAksi = '';
		$DJRAksiID = '';
		$DJWMasuk = '';
		$DJWKeluar = '';
		$DJHargaMasuk = '';
		$DJBatasRugi = '';
		$DJAmbilUntung = '';
		$DJRugiPoint = '';
		$DJUntungPoint = '';
		$DJSaldoAwal = '';
		$DJSaldoAkhir = '';
		$DJResiko = '';
		$DJLot = '';
		$DJRasio = '';
		$DJRugiSaldo = '';
		$DJUntungSaldo = '';
		$DJHargaKeluar = '';
		$DJSebelum = '';
		$DJSesudah = '';
		$DJCatatanSebelum = '';
		$DJCatatanSesudah = '';
		$DJStatus = '1';
		
	}
	if ($modul == 'ubah_jurnal' || $modul == 'lihat_jurnal') {
		$qjurnal = mysqli_query($koneksi,"	SELECT a.*, b.Pasar AS PasarNM, c.Symbol AS SymbolNM, c.Units AS SymbolUnits, c.Mask AS SymbolMask, d.JangkaWaktu AS JangkaWaktuNM, e.RencanaAksi AS AksiNM FROM jurnal a
		LEFT JOIN pasar b ON a.PasarID = b.PasarID
		LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
		LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
		LEFT JOIN rencana_aksi e ON a.AksiID = e.RencanaAksiID
		WHERE a.JurnalID ='$id' AND a.UserID = '$UserID'");
		while ($djurnal = mysqli_fetch_array($qjurnal,MYSQLI_ASSOC)) {
			$NoJurnal = $djurnal['JurnalID'];
			$DJRencanaID = $djurnal['RencanaID'];
			$DJPasar = $djurnal['PasarNM'];
			$DJPasarID = $djurnal['PasarID'];
			$DJSymbol = $djurnal['SymbolNM'];
			$DJSymbolID = $djurnal['SymbolID'];
			$DJSymbolUnits = $djurnal['SymbolUnits'];
			$DJSymbolMask = $djurnal['SymbolMask'];
			$DJJangkaWaktu = $djurnal['JangkaWaktuNM'];
			$DJJangkaWaktuID = $djurnal['JangkaWaktuID'];
			$DJRAksi = $djurnal['AksiNM'];
			$DJRAksiID = $djurnal['AksiID'];
			if ($djurnal['WaktuMasuk'] == '0000-00-00 00:00:00') {
				$DJWMasuk = '';
				}
			else {
				$DJWMasuk = $djurnal['WaktuMasuk'];
				}
			$DJHargaMasuk = $djurnal['HargaMasuk'];
			$DJBatasRugi = $djurnal['BatasRugi'];
			$DJAmbilUntung = $djurnal['AmbilUntung'];
			$DJRugiPoint = $djurnal['RugiPoint'];
			$DJUntungPoint = $djurnal['UntungPoint'];
			$DJSaldoAwal = $djurnal['SaldoAwal'];
			$DJResiko = $djurnal['Resiko'];
			$DJLot = $djurnal['Lot'];
			if ($djurnal['WaktuKeluar'] == '0000-00-00 00:00:00') {
				$DJWKeluar = '';
				}
			else {
				$DJWKeluar = $djurnal['WaktuKeluar'];
				}
			
			$DJAKeluar = $djurnal['AlasanKeluar'];
			$DJHargaKeluar = $djurnal['HargaKeluar'];
			$DJRasio = $djurnal['Rasio'];
			$DJRugiSaldo = $djurnal['Kerugian'];
			$DJUntungSaldo = $djurnal['Keuntungan'];
			$DJSaldoAkhir = $djurnal['SaldoAkhir'];
			$DJSebelum = $djurnal['Sebelum'];
			$DJSesudah = $djurnal['Sesudah'];
			$DJCatatanSebelum = $djurnal['CatatanSebelum'];
			$DJCatatanSesudah = $djurnal['CatatanSesudah'];
			$DJStatus = $djurnal['StatusID'];
			$DJTglBuat = $djurnal['TglBuat'];
		}
	} 
	if ($modul == 'tambah_jurnal' || $modul == 'ubah_jurnal') {
	?>
	<div class="row">
		<div class="col-md-6"> <!-- No. Jurnal -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">No. Jurnal</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input type="hidden" id="modul" name="modul" value="<?php echo $modul;?>">
						<input type="hidden" id="UserID" name="UserID" value="<?php echo $UserID;?>" readonly>
						<input type="text" class="form-control" id="JurnalID" name="Jurnal" value="<?php echo $NoJurnal;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- No. Rencana -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Dasar Transaksi</label>
				<div class="col-sm-8">
					<select id="RencanaID" name="Rencana" class="form-control" required >
						<option value="">Rencana No...</option>
						<option value="Manual">Tanpa Rencana</option>
						<?php
							$qsrencana = mysqli_query($koneksi,"SELECT * FROM rencana WHERE UserID='$UserID' AND StatusID='1' ORDER BY RencanaID DESC");
							while ($dsrencana = mysqli_fetch_array($qsrencana,MYSQLI_ASSOC)) {
								$DSRencanaID	=	$dsrencana['RencanaID'];
							?>
							<option value="<?php echo $DSRencanaID;?>" <?php if ($DJRencanaID == $DSRencanaID) { echo "selected='selected'";} ?>><?php echo $DSRencanaID;?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6"> <!-- Pasar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Pasar</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Pasar" value="<?php echo $DJPasar;?>" readonly>
					<input type="hidden" id="PasarID" name="Pasar" value="<?php echo $DJPasarID;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Symbol -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Symbol</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Symbol" value="<?php echo $DJSymbol;?>" readonly>
					<input type="hidden" id="SymbolID" name="Symbol" value="<?php echo $DJSymbolID;?>">
					<input type="hidden" id="SymbolUnit" value="<?php echo $DJSymbolUnits;?>">
					<input type="hidden" id="SymbolMask" value="<?php echo $DJSymbolMask;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jangka Waktu -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jangka Waktu</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="JangkaWaktu" value="<?php echo $DJJangkaWaktu;?>" readonly>
					<input type="hidden" id="JangkaWaktuID" name="JangkaWaktu" value="<?php echo $DJJangkaWaktuID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Transaksi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Aksi" value="<?php echo $DJRAksi;?>" readonly>
					<input type="hidden" id="AksiID" name="Aksi" value="<?php echo $DJRAksiID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Waktu Masuk -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Waktu Masuk</label>
				<div class="col-sm-8">
					<div class="input-group date" id="WaktuMasukID" data-target-input="nearest">
						<input type="text" id="WaktuMasuk" name="WaktuMasuk" class="form-control datetimepicker-input" data-target="#WaktuMasukID" value="<?php echo $DJWMasuk;?>" <?php if ($modul == 'ubah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
						<div class="input-group-append" data-target="#WaktuMasukID" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Harga -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Harga</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="HargaMasukID" name="HargaMasuk" value="<?php echo $DJHargaMasuk;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Batas Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Batas Rugi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="BatasRugiID" name="BatasRugi" value="<?php echo $DJBatasRugi;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Ambil Untung -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Ambil Untung</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="AmbilUntungID" name="AmbilUntung" value="<?php echo $DJAmbilUntung;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Rasio -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rasio </label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Rugi : Untung</span>
						</div>
						<input type="text" class="form-control text-center" id="RasioID" name="Rasio" value="<?php echo $DJRasio;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Resiko -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Resiko / Transaksi</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Persentase</span>
						</div>
						<input type="text" class="form-control text-right" id="ResikoID" name="Resiko" value="<?php echo $DJResiko;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">(%)</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Rekomendasi Lot -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jumlah Lot </label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="LotID" name="Lot" value="<?php echo $DJLot;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Lot</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Waktu Keluar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Waktu Keluar</label>
				<div class="col-sm-8">
					<div class="input-group date" id="WaktuKeluarID" data-target-input="nearest">
						<input type="text" id="WaktuKeluar" name="WaktuKeluar" class="form-control datetimepicker-input" data-target="#WaktuKeluarID" value="<?php echo $DJWKeluar;?>" <?php if ($modul == 'tambah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
						<div class="input-group-append" data-target="#WaktuKeluarID" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Alasan Keluar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Alasan Keluar</label>
				<div class="col-sm-8">
					<select id="AlasanKeluarID" name="AlasanKeluar" class="form-control" <?php if ($modul == 'tambah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
						<option value=""></option>
						<option value="Impas" <?php if ($modul == 'ubah_jurnal' && $DJAKeluar == 'Impas') { echo 'selected="selected"';}?>>Impas</option>
						<option value="Rugi" <?php if ($modul == 'ubah_jurnal' && $DJAKeluar == 'Rugi') { echo 'selected="selected"';}?>>Rugi</option>
						<option value="Untung" <?php if ($modul == 'ubah_jurnal' && $DJAKeluar == 'Untung') { echo 'selected="selected"';}?>>Untung</option>
						<option value="Manual" <?php if ($modul == 'ubah_jurnal' && $DJAKeluar == 'Manual') { echo 'selected="selected"';}?>>Manual</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Harga -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Harga Keluar</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="HargaKeluarID" name="HargaKeluar" value="<?php echo $DJHargaKeluar;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jarak Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kerugian</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="RugiPointID" name="RugiPoint" value="<?php echo $DJRugiPoint;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Point</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jarak Untung  -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Keuntungan</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="UntungPointID" name="UntungPoint" value="<?php echo $DJUntungPoint;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Point</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Kerugian -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kerugian</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div> 
						<input type="text" class="form-control text-right" id="RugiSaldoID" name="RugiSaldo" value="<?php echo $DJRugiSaldo;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Keuntungan --> 
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Keuntungan</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="UntungSaldoID" name="UntungSaldo" value="<?php echo $DJUntungSaldo;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Saldo -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Saldo Awal</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="SaldoAwalID" name="SaldoAwal" value="<?php echo $DJSaldoAwal;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Saldo -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Saldo Akhir</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="SaldoAkhirID" name="SaldoAkhir" value="<?php echo $DJSaldoAkhir;?>" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="Attribute" class="row" <?php //if ($modul == 'ubah_analisa') { echo 'style="display:flex"';} else { echo 'style="display:none"';}?>>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sebelum:</strong>
				</div>
				<div class="input-group col-sm-12 mb-2 px-0">
					<textarea class="form-control" rows="4" placeholder="" id="CatatanSebelumID" name="CatatanSebelum" <?php if ($modul == 'ubah_jurnal') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DJCatatanSebelum;?></textarea>
				</div>
			</div>
			<div class="col-md-12 mb-2 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok. Sebelum</button>
					</div>
					<input type="text" class="form-control" id="SebelumID" name="Sebelum" value="<?php echo $DJSebelum;?>" <?php if ($modul == 'ubah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="input-group col-sm-12 mb-2 px-0">
					<textarea class="form-control" rows="4" placeholder="" id="CatatanSesudahID" name="CatatanSesudah" <?php if ($modul == 'tambah_jurnal') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DJCatatanSesudah;?></textarea>
				</div>
			</div>
			<div class="col-md-12 mb-2 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok. Sesudah</button>
					</div>
					<input type="text" class="form-control" id="SesudahID" name="Sesudah" value="<?php echo $DJSesudah;?>" <?php if ($modul == 'tambah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="1" <?php if ($DJStatus == '1') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Terbuka
				</span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="2" <?php if ($DJStatus == '2') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Ditutup
				</span>
			</label>
		</div>
	</div>
	<?php
	}
	if ($modul == 'hapus_jurnal') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" id="UserID" name="UserID" value="<?php echo $UserID;?>">
					</div>
					<div class="input-group">
						<input type="hidden" id="JurnalID" name="JurnalID" value="<?php echo $id;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> 
			Hapus Jurnal dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	} 
	if ($modul == 'lihat_jurnal') {
	?>
	<div class="row">
		<div class="col-12">
			<div class="m-sm-3 mb-5">
				<div class="mb-1 text-center">
					<h4><strong><ins>Detail Rencana</ins></strong></h4>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="text-muted">Jurnal No.</div>
						<strong><?php echo $id;?></strong>
					</div>
					<div class="col-md-6 text-md-right">
						<div class="text-muted">Tanggal Buat</div>
						<strong><?php echo $DJTglBuat;?></strong>
					</div>
				</div>
				
				<hr class="my-1">
				
				<table id="mytable" class="table table-borderless table-sm">
					<thead>
						<tr>
							<th></th>
							<th class="text-right"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Pasar</td>
							<td class="text-right"><?php echo $DJPasar;?></td>
						</tr>
						<tr>
							<td>Symbol</td>
							<td class="text-right"><?php echo $DJSymbol;?></td>
						</tr>
						<tr>
							<td>Jangka Waktu</td>
							<td class="text-right"><?php echo $DJJangkaWaktu;?></td>
						</tr>
						<tr>
							<td><strong>Aksi</strong></td>
							<td class="text-right"><strong><?php echo $DJRAksi;?></strong></td>
						</tr>
						<tr>
							<td><strong>Dasar Rencana</strong></td>
							<td class="text-right"><strong><?php echo $DJRencanaID;?></strong></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th colspan="3" class="text-center">Detail <?php echo $DJRAksi;?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-sm">Saldo</td>
							<td colspan="2" class="text-right text-sm">$ <?php echo $DJSaldoAwal;?></td>
						</tr>
						<tr>
							<td class="text-sm">Resiko</td>
							<td colspan="2" class="text-right text-sm"><?php echo $DJResiko;?>%</td>
						</tr>
						<tr>
							<td class="text-sm">Jumlah Lot</td>
							<td colspan="2" class="text-right text-sm"><strong><?php echo $DJLot;?></strong></td>
						</tr>
						<tr>
							<td class="text-sm">Waktu Masuk</td>
							<td colspan="2" class="text-right text-sm"><?php echo $DJWMasuk;?></td>
						</tr>
						<tr>
							<td class="text-sm">Waktu Keluar</td>
							<td colspan="2" class="text-right text-sm"><?php echo $DJWKeluar;?></td>
						</tr>
						<tr>
							<td class="text-sm">Harga Masuk</td>
							<td colspan="2" class="text-right text-sm"><?php echo $DJHargaMasuk;?></td>
						</tr>
						<tr>
							<td class="text-sm">Harga Keluar</td>
							<td colspan="2" class="text-right text-sm"><?php echo $DJHargaKeluar;?></td>
						</tr>
						<tr>
							<td class="text-sm">Alasan Keluar</td>
							<td colspan="2" class="text-right text-sm">
								<?php 
									if ($DJAKeluar == 'Impas') {
									echo '<span class="badge badge-warning">'.$DJAKeluar.'</span>';
									}
									else if ($DJAKeluar == 'Rugi') {
									echo '<span class="badge badge-danger">'.$DJAKeluar.'</span>';
									}
									else if ($DJAKeluar == 'Untung') {
									echo '<span class="badge badge-success">'.$DJAKeluar.'</span>';
									}
								?>
							</td>
						</tr>
						<tr>
							<td class="text-sm">Kerugian</td>
							<td class="text-right text-sm"><?php echo $DJRugiPoint;?> Point</td>
							<td class="text-right text-sm">$ <?php echo $DJRugiSaldo;?></td>
						</tr>
						<tr>
							<td class="text-sm">Keuntungan</td>
							<td class="text-right text-sm"><?php echo $DJUntungPoint;?> Point</td>
							<td class="text-right text-sm">$ <?php echo $DJUntungSaldo;?></td>
						</tr>
					</tbody>
				</table>
				
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="text-center">
					<strong>Catatan Sebelum:</strong>
				</div>
				<div class="py-2 py-md-3 border">
					<?php echo $DJCatatanSebelum;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sebelum</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DJSebelum;?>" target="_blank"><img src="<?php echo $DJSebelum;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="text-center">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="py-2 py-md-3 border">
					<?php echo $DJCatatanSesudah;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sesudah</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DJSesudah;?>" target="_blank"><img src="<?php echo $DJSesudah;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php
	}
?>
---
<?php if ($modul == 'tambah_jurnal') { ?>
	<button type="button" id="batal" class="btn btn-danger">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'ubah_jurnal') { 
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'hapus_jurnal') { 
	?>
	<button type="submit" class="btn btn-danger">Hapus</button>
	<?php 
	}
?>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		SymbolMask = $('#SymbolMask').val();
		$('#HargaMasukID, #HargaKeluarID').mask(SymbolMask);
		
		$('#WaktuMasukID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#WaktuMasuk').val(),
			sideBySide: true
		});	
		
		$('#WaktuKeluarID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#WaktuKeluar').val(),
			sideBySide: true
		});	
		
		// trigger function
		$('#RencanaID').change(function () {
			$('#RencanaID').trigger('contentchanged');
		});
		
		$('#AlasanKeluarID').change(function () {
			var AlasanKeluar	= $('#AlasanKeluarID').val();
			var HargaMasuk 		= $('#HargaMasukID').val();
			var BatasRugi 		= $('#BatasRugiID').val();
			var AmbilUntung 	= $('#AmbilUntungID').val();
			if (AlasanKeluar == '') {
				$('#HargaKeluarID').val('');
				$('#RugiPointID').val('0');
				$('#UntungPointID').val('0');
				$('#HargaKeluarID').attr('readonly', true);
			}
			else if (AlasanKeluar == 'Impas') {
				$('#HargaKeluarID').val(HargaMasuk);
			}
			else if (AlasanKeluar == 'Rugi') {
				$('#HargaKeluarID').val(BatasRugi);
			}
			else if (AlasanKeluar == 'Untung') {
				$('#HargaKeluarID').val(AmbilUntung);
			}
			else if (AlasanKeluar == 'Manual') {
				$('#HargaKeluarID').val('');
				$('#RugiPointID').val('0');
				$('#UntungPointID').val('0');
				$('#HargaKeluarID').removeAttr('readonly');
			}
			$('#RugiPointID').trigger('contentchanged');
			$('#UntungPointID').trigger('contentchanged');
			$('#RugiSaldoID').trigger('contentchanged');
			$('#UntungSaldoID').trigger('contentchanged');
			$('#SaldoAkhirID').trigger('contentchanged');
		});
		
		
		$('#HargaID, #BatasRugiID, #AmbilUntungID, #HargaKeluarID').keyup(function() {
			$('#RugiPointID').trigger('contentchanged');
			$('#UntungPointID').trigger('contentchanged');
			$('#RugiSaldoID').trigger('contentchanged');
			$('#UntungSaldoID').trigger('contentchanged');
			$('#SaldoAkhirID').trigger('contentchanged');
		});
		
		
		
		$('#RencanaID').on('contentchanged',function() {
			var RencanaID 	= $('#RencanaID').val();
			var UserID 		= $('#UserID').val();
			var getData 	= 'rencanaInfo';
			$.ajax({
				type:'POST',
				url:'../page/jurnal/jurnal.data.php',
				data:{'RencanaID' :RencanaID, 'UserID':UserID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var RencanaAksi = data[0].RencanaAksiID;
					$('#Pasar, #PasarID, #Symbol, #SymbolID, #SymbolUnit, #JangkaWaktu, #JangkaWaktuID, #Aksi, #AksiID, #HargaMasukID, #BatasRugiID, #AmbilUntungID, #SaldoAwalID, #ResikoID, #LotID, #HargaKeluarID, #RugiPointID, #UntungPointID, #RugiSaldoID, #UntungSaldoID, #RasioID').val('');
					$('#Pasar').val(data[0].PasarNM);
					$('#PasarID').val(data[0].PasarID);
					$('#Symbol').val(data[0].SymbolNM);
					$('#SymbolID').val(data[0].SymbolID);
					$('#SymbolUnit').val(data[0].Units);
					$('#JangkaWaktu').val(data[0].JangkaWaktuNM);
					$('#JangkaWaktuID').val(data[0].JangkaWaktuID);
					if (RencanaAksi == '1' || RencanaAksi == '3' || RencanaAksi == '4'){
						$('#Aksi').val('Buy');
						$('#AksiID').val('1');	
					}
					if (RencanaAksi == '2' || RencanaAksi == '5' || RencanaAksi == '6'){
						$('#Aksi').val('Sell');
						$('#AksiID').val('2');	
					}
					$('#HargaMasukID').mask(data[0].Mask); 
					$('#HargaKeluarID').mask(data[0].Mask); 
					$('#HargaMasukID').val(data[0].Harga);
					$('#BatasRugiID').mask(data[0].Mask);
					$('#BatasRugiID').val(data[0].BatasRugi);
					$('#AmbilUntungID').mask(data[0].Mask);
					$('#AmbilUntungID').val(data[0].AmbilUntung);
					$('#SaldoAwalID').val(data[0].SaldoAwal);
					$('#ResikoID').val(data[0].Resiko);
					$('#LotID').val(data[0].Lot);
					$('#RugiPointID').val('');
					$('#UntungPointID').val('');
					$('#RugiSaldoID').val('');
					$('#UntungSaldoID').val('');
					$('#RasioID').val(data[0].Rasio);
				}
			})
		});
		
		
		$('#RugiPointID, #UntungPointID').on('contentchanged',function() {
			// Cek Aksi 
			var Aksi		= $('#AksiID').val();
			if (Aksi == '1' || Aksi == '3' || Aksi == '4') {
				var AksiIs = 'Buy';
			}
			else if (Aksi == '2' || Aksi == '5' || Aksi == '6') {
				var AksiIs = 'Sell';
			} 
			else {
				var AksiIs = 'DontKnow';
			}
			
			// Cek Input
			var AlasanKeluar	= $('#AlasanKeluarID').val();
			var SymbolUnit		= $('#SymbolUnit').val();
			var HargaMasuk		= $('#HargaMasukID').val();
			var HargaKeluar		= $('#HargaKeluarID').val();
			if(isNaN(HargaMasuk)) {
				var HargaMasuk = 0;
			}
			if(isNaN(HargaKeluar)) {
				var HargaKeluar = 0;
			}
			if (AlasanKeluar == '') {
				// Do Nothing
			}
			else if (AlasanKeluar == 'Impas') {	// Hitung Jumlah Point Jika Keluar Rugi
				// Hitung Point
				if (AksiIs == 'Buy') {
					RugiPoint 	= ((HargaMasuk - HargaKeluar)*SymbolUnit);
					UntungPoint =  ((HargaKeluar - HargaMasuk)*SymbolUnit);
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else if (AksiIs == 'Sell') {
					RugiPoint 	= ((HargaKeluar - HargaMasuk)*SymbolUnit);
					UntungPoint =  ((HargaMasuk - HargaKeluar)*SymbolUnit);
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else {
					// Do Nothing;
				}
			}
			else if (AlasanKeluar == 'Rugi') { // Hitung Jumlah Point Jika Keluar Rugi
				if (AksiIs == 'Buy') {
					RugiPoint 	= ((HargaKeluar - HargaMasuk)*SymbolUnit);
					UntungPoint =  ((HargaKeluar - HargaMasuk)*SymbolUnit);
					if (UntungPoint <= 0) {
						UntungPoint = 0;
					}
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else if (AksiIs == 'Sell') {
					RugiPoint 	= ((HargaMasuk - HargaKeluar)*SymbolUnit);
					UntungPoint =  ((HargaMasuk - HargaKeluar)*SymbolUnit);
					if (UntungPoint <= 0) {
						UntungPoint = 0;
					}
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else {
					
				}
			}
			else if (AlasanKeluar == 'Untung') { // Hitung Jumlah Point Jika Keluar Untung
				if (AksiIs == 'Buy') {
					RugiPoint 	= ((HargaKeluar - HargaMasuk)*SymbolUnit);
					if (RugiPoint => 0) {
						RugiPoint = 0;
					}
					UntungPoint =  ((HargaKeluar - HargaMasuk)*SymbolUnit);
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else if (AksiIs == 'Sell') {
					RugiPoint 	= ((HargaMasuk - HargaKeluar)*SymbolUnit);
					if (RugiPoint => 0) {
						RugiPoint = 0;
					}
					UntungPoint =  ((HargaMasuk - HargaKeluar)*SymbolUnit);
					$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
					$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				}
				else {
					
				}
			}
			else if (AlasanKeluar == 'Manual') { // Hitung Jumlah Point Jika Keluar Untung
				if (AksiIs == 'Buy') {
					if ( HargaKeluar < HargaMasuk ) {
						RugiPoint 	= ((HargaKeluar - HargaMasuk)*SymbolUnit);
						UntungPoint =  ((HargaKeluar - HargaMasuk)*SymbolUnit);
						if (UntungPoint <= 0) {
							UntungPoint = 0;
						}
						$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
						$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
					}
					else if ( HargaKeluar > HargaMasuk) {
						RugiPoint 	= ((HargaKeluar - HargaMasuk)*SymbolUnit);
						if (RugiPoint => 0) {
							RugiPoint = 0;
						}
						UntungPoint =  ((HargaKeluar - HargaMasuk)*SymbolUnit);
						$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
						$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
					}
				}
				else if (AksiIs == 'Sell') {
					if ( HargaMasuk <  HargaKeluar) {
						RugiPoint 	= ((HargaMasuk - HargaKeluar)*SymbolUnit);
						UntungPoint =  ((HargaMasuk - HargaKeluar)*SymbolUnit);
						if (UntungPoint <= 0) {
							UntungPoint = 0;
						}
						$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
						$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
					}
					else if ( HargaMasuk > HargaKeluar) {
						RugiPoint 	= ((HargaMasuk - HargaKeluar)*SymbolUnit);
						if (RugiPoint => 0) {
							RugiPoint = 0;
						}
						UntungPoint =  ((HargaMasuk - HargaKeluar)*SymbolUnit);
						$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
						$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
					}
				}
				else {
					//Do Nothing
				}
			}
			
		});
		
		$('#RugiSaldoID, #UntungSaldoID').on('contentchanged',function() {
			// Cek Aksi 
			var Aksi		= $('#AksiID').val();
			if (Aksi == '1' || Aksi == '3' || Aksi == '4') {
				var AksiIs = 'Buy';
			}
			else if (Aksi == '2' || Aksi == '5' || Aksi == '6') {
				var AksiIs = 'Sell';
			} 
			else {
				var AksiIs = 'DontKnow';
			}
			
			// Cek Input
			var AlasanKeluar	= $('#AlasanKeluarID').val();
			var Lot				= $('#LotID').val();
			var RugiPoint		= $('#RugiPointID').val();
			var UntungPoint		= $('#UntungPointID').val();
			if(isNaN(Lot)) {
				var Lot = 0;
			}
			if(isNaN(RugiPoint)) {
				var RugiPoint = 0;
			}
			if(isNaN(UntungPoint)) {
				var UntungPoint = 0;
			}
			
			var Kerugian = (Lot*RugiPoint);
			var Keuntungan = (Lot*UntungPoint);
			$('#RugiSaldoID').val(Kerugian);
			$('#UntungSaldoID').val(Keuntungan);
			
		});
		
		$('#SaldoAkhirID').on('contentchanged',function() {
			var SaldoAwal = parseInt($('#SaldoAwalID').val());
			var Kerugian = parseInt($('#RugiSaldoID').val());
			var Keuntungan = parseInt($('#UntungSaldoID').val());
			if (Kerugian == '0') {
				SaldoAkhir = (SaldoAwal+Keuntungan);
				$('#SaldoAkhirID').val(SaldoAkhir);
			}
			else if (Keuntungan == '0') {
				SaldoAkhir = (SaldoAwal+Kerugian);
				$('#SaldoAkhirID').val(SaldoAkhir);
			}
		});
		
		$('#batal').click(function (){
			var modul = 'hapus_jurnal';
			var UserID = $('#UserID').val();
			var JurnalID = $('#JurnalID').val();
			$.ajax({
				type:'POST',
				url:'../page/jurnal/jurnal.process.php',
				data:{'JurnalID':JurnalID, 'UserID': UserID, 'modul': modul},
				success:function(hasil){
					if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
						location.href = "/index.php?page=jurnal"
						} else {
						$('#modal-data').html(hasil);
					}
				}
			})
		});
		$("#myform").validate({
			errorElement: 'div',
			errorClass: 'help-block',
			focusInvalid: true,
			messages: {
			},
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},
			submitHandler: function(form, event) {
				event.preventDefault();
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../page/jurnal/jurnal.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
							location.href = "/index.php?page=jurnal"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
