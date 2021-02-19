<?php
	error_reporting(0);
	require_once ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$modul 		= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$id			= isset($_POST['ID']) ? $_POST['ID'] : NULL;
	$userid		= isset($_POST['UserID']) ? $_POST['UserID'] : NULL;
	
	if ($modul == 'tambah_rencana') {
		$NoRencana = NoRencana($id, $userid);
		$DRAnalisaID = '';
		$DRPasar = '';
		$DRPasarID = '';
		$DRSymbol = '';
		$DRSymbolID = '';
		$DRJangkaWaktu = '';
		$DRJangkaWaktuID = '';
		$DRRTipeID = '';
		$DRRAksiID = '';
		$DRHarga = '';
		$DRBatasRugi = '';
		$DRAmbilUntung = '';
		$DRRugiPoint = '';
		$DRUntungPoint = '';
		$CekSaldo = new settingAkun();
		foreach ($CekSaldo->cekSaldoAkun($userid) as $row) {
			$saldoAkun = $row['SaldoAkhir'];
			}
		$DRSaldo = $saldoAkun;
		$DRResiko = '';
		$DRLot = '';
		$DRRasio = '';
		$DRRugiSaldo = '';
		$DRUntungSaldo = '';
		$DRSebelum = '';
		$DRSesudah = '';
		$DRCatatanSebelum = '';
		$DRCatatanSesudah = '';
		$DRStatus = '1';
				
	}
	if ($modul == 'ubah_rencana' || $modul == 'lihat_rencana') {
		$qrencana = mysqli_query($koneksi,"
		SELECT 
		a.RencanaID, a.AnalisaID, a.PasarID, a.SymbolID, a.JangkaWaktuID, a.RencanaTipeID, a.RencanaAksiID, a.Harga, a.BatasRugi, a.AmbilUntung, a.RugiPoint, a.UntungPoint, a.SaldoAwal, a.Resiko, a.Lot, a.Rasio, a.Kerugian, a.Keuntungan, a.CatatanSebelum, a.CatatanSesudah, a.Sebelum, a.Sesudah, a.StatusID, a.TglBuat,
		b.Pasar AS PasarNM, c.Symbol AS SymbolNM, d.JangkaWaktu AS JangkaWaktuNM, e.RencanaTipe AS RencanaTipeNM, f.RencanaAksi AS RencanaAksiNM
		FROM rencana a
		LEFT JOIN pasar b ON a.PasarID = b.PasarID
		LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
		LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
		LEFT JOIN rencana_tipe e ON a.RencanaTipeID = e.RencanaTipeID
		LEFT JOIN rencana_aksi f ON a.RencanaAksiID = f.RencanaAksiID
		WHERE a.RencanaID = '$id' AND a.UserID='$userid'
		");
		while ($drencana = mysqli_fetch_array($qrencana,MYSQLI_ASSOC)) {
			$NoRencana 			= $drencana['RencanaID'];
			$DRAnalisaID 		= $drencana['AnalisaID'];
			$DRPasar 			= $drencana['PasarNM'];
			$DRPasarID 			= $drencana['PasarID'];
			$DRSymbol 			= $drencana['SymbolNM'];
			$DRSymbolID 		= $drencana['SymbolID'];
			$DRJangkaWaktu 		= $drencana['JangkaWaktuNM'];
			$DRJangkaWaktuID 	= $drencana['JangkaWaktuID'];
			$DRRTipe 			= $drencana['RencanaTipeNM'];
			$DRRTipeID 			= $drencana['RencanaTipeID'];
			$DRRAksi 			= $drencana['RencanaAksiNM'];
			$DRRAksiID 			= $drencana['RencanaAksiID'];
			$DRHarga 			= $drencana['Harga'];
			$DRBatasRugi 		= $drencana['BatasRugi'];
			$DRAmbilUntung 		= $drencana['AmbilUntung'];
			$DRRugiPoint		= $drencana['RugiPoint'];
			$DRUntungPoint 		= $drencana['UntungPoint'];
			$DRSaldo 			= $drencana['SaldoAwal'];
			$DRResiko 			= $drencana['Resiko'];
			$DRLot 				= $drencana['Lot'];
			$DRRasio 			= $drencana['Rasio'];
			$DRRugiSaldo 		= $drencana['Kerugian'];
			$DRUntungSaldo 		= $drencana['Keuntungan'];
			$DRSebelum 			= $drencana['Sebelum'];
			$DRSesudah 			= $drencana['Sesudah'];
			$DRCatatanSebelum 	= $drencana['CatatanSebelum'];
			$DRCatatanSesudah 	= $drencana['CatatanSesudah'];
			$DRStatus 			= $drencana['StatusID'];
			$DRTglBuat 			= $drencana['TglBuat'];
		}
	} 
	if ($modul == 'tambah_rencana' || $modul == 'ubah_rencana') {
	?>
	<div class="row">
		<div class="col-md-6"> <!-- No. Rencana -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">No. Rencana</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input type="hidden" id="modul" name="modul" value="<?php echo $modul;?>">
						<input type="hidden" id="UserID" name="UserID" value="<?php echo $userid;?>" readonly>
						<input type="text" class="form-control" id="RencanaID" name="Rencana" value="<?php echo $NoRencana;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- No. Analisa -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Dasar Rencana</label>
				<div class="col-sm-8">
					<select id="AnalisaID" name="Analisa" class="form-control" required >
						<option value="">Analisa No...</option>
						<option value="">Tanpa Analisa</option>
						<?php
							$qsanalisa = mysqli_query($koneksi,"SELECT * FROM analisa WHERE UserID='$userid' AND StatusID='1' ORDER BY AnalisaID DESC");
							while ($dsanalisa = mysqli_fetch_array($qsanalisa,MYSQLI_ASSOC)) {
								$DSAnalisaID	=	$dsanalisa['AnalisaID'];
							?>
							<option value="<?php echo $DSAnalisaID;?>" <?php if ($DRAnalisaID == $DSAnalisaID) { echo "selected='selected'";} ?>><?php echo $DSAnalisaID;?></option>
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
					<input type="text" class="form-control text-center" id="Pasar" value="<?php echo $DRPasar;?>" readonly>
					<input type="hidden" id="PasarID" name="Pasar" value="<?php echo $DRPasarID;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Symbol -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Symbol</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Symbol" value="<?php echo $DRSymbol;?>" readonly>
					<input type="hidden" id="SymbolID" name="Symbol" value="<?php echo $DRSymbolID;?>">
					<input type="hidden" id="SymbolUnit" value="">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jangka Waktu -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jangka Waktu</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="JangkaWaktu" value="<?php echo $DRJangkaWaktu;?>" readonly>
					<input type="hidden" id="JangkaWaktuID" name="JangkaWaktu" value="<?php echo $DRJangkaWaktuID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Tipe Rencana Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rencana Transaksi</label>
				<div class="col-sm-8">
					<select id="RencanaTipeID" name="RencanaTipe" class="form-control" required >
						<option value=""></option>
						<?php
							$qsrtipe = mysqli_query($koneksi,"SELECT * FROM rencana_tipe");
							while ($drtipe = mysqli_fetch_array($qsrtipe,MYSQLI_ASSOC)) {
								$DSRTipeID	=	$drtipe['RencanaTipeID'];
								$DSRTipe	=	$drtipe['RencanaTipe'];
							?>
							<option value="<?php echo $DSRTipeID;?>" <?php if ($DRRTipeID == $DSRTipeID) { echo "selected='selected'";} ?>><?php echo $DSRTipe;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Rencana Aksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rencana Aksi</label>
				<div class="col-sm-8">
					<select id="RencanaAksiID" name="RencanaAksi" class="form-control" required >
						<option value=""></option>
						<?php
							$qsraksi = mysqli_query($koneksi,"SELECT * FROM rencana_aksi");
							while ($dsraksi = mysqli_fetch_array($qsraksi,MYSQLI_ASSOC)) {
								$DSRAksiID	=	$dsraksi['RencanaAksiID'];
								$DSRAksi	=	$dsraksi['RencanaAksi'];
							?>
							<option value="<?php echo $DSRAksiID;?>" <?php if ($DRRAksiID == $DSRAksiID) { echo "selected='selected'";} ?>><?php echo $DSRAksi;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Harga -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Harga</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="HargaID" name="Harga" value="<?php echo $DRHarga;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Batas Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Batas Rugi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="BatasRugiID" name="BatasRugi" value="<?php echo $DRBatasRugi;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Ambil Untung -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Ambil Untung</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="AmbilUntungID" name="AmbilUntung" value="<?php echo $DRAmbilUntung;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Saldo -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Saldo</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="SaldoID" name="Saldo" value="<?php echo $DRSaldo;?>" required>
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
						<input type="text" class="form-control text-right" id="ResikoID" name="Resiko" value="<?php echo $DRResiko;?>">
						<div class="input-group-append">
							<span class="input-group-text">(%)</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Rekomendasi Lot -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rekomendasi Lot </label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="LotID" name="Lot" value="<?php echo $DRLot;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Lot</span>
						</div>
					</div>
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
						<input type="text" class="form-control text-center" id="RasioID" name="Rasio" value="<?php echo $DRRasio;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jarak Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kerugian</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="RugiPointID" name="RugiPoint" value="<?php echo $DRRugiPoint;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Point</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jarak Untung -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Keuntungan</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="UntungPointID" name="UntungPoint" value="<?php echo $DRUntungPoint;?>" readonly>
						<div class="input-group-append">
							<span class="input-group-text">Point</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Kerugian $ -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kerugian</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div> 
						<input type="text" class="form-control text-right" id="RugiSaldoID" name="RugiSaldo" value="<?php echo $DRRugiSaldo;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Keuntungan $ -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Keuntungan</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="UntungSaldoID" name="UntungSaldo" value="<?php echo $DRUntungSaldo;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div id="RekomendasiShow" class="col-md-12">
		</div>
	</div>
	<div id="Attribute" class="row" <?php //if ($modul == 'ubah_analisa') { echo 'style="display:flex"';} else { echo 'style="display:none"';}?>>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sebelum:</strong>
				</div>
				<div class="input-group col-sm-12 mb-2 px-0">
						<textarea class="form-control" rows="4" placeholder="" id="CatatanSebelumID" name="CatatanSebelum" <?php if ($modul == 'ubah_rencana') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DRCatatanSebelum;?></textarea>
				</div>
			</div>
			<div class="col-md-12 mb-2 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok. Sebelum</button>
					</div>
					<input type="text" class="form-control" id="SebelumID" name="Sebelum" value="<?php echo $DRSebelum;?>" <?php if ($modul == 'ubah_rencana') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="input-group col-sm-12 mb-2 px-0">
						<textarea class="form-control" rows="4" placeholder="" id="CatatanSesudahID" name="CatatanSesudah" <?php if ($modul == 'tambah_rencana') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DRCatatanSesudah;?></textarea>
				</div>
			</div>
			<div class="col-md-12 mb-2 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok. Sesudah</button>
					</div>
					<input type="text" class="form-control" id="SesudahID" name="Sesudah" value="<?php echo $DRSesudah;?>" <?php if ($modul == 'tambah_rencana') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="1" <?php if ($DRStatus == '1') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Terbuka
				</span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="2" <?php if ($DRStatus == '2') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Ditutup
				</span>
			</label>
		</div>
	</div>
	<?php
	}
	if ($modul == 'hapus_rencana') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" id="UserID" name="UserID" value="<?php echo $userid;?>">
					</div>
					<div class="input-group">
						<input type="hidden" id="RencanaID" name="RencanaID" value="<?php echo $id;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> 
			Hapus Rencana dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	} 
	if ($modul == 'lihat_rencana') {
	?>
	<div class="row">
		<div class="col-12">
			<div class="m-sm-3 mb-5">
				<div class="mb-1 text-center">
					<h4><strong><ins>Detail Rencana</ins></strong></h4>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="text-muted">Rencana No.</div>
						<strong><?php echo $id;?></strong>
					</div>
					<div class="col-md-6 text-md-right">
						<div class="text-muted">Tanggal Buat</div>
						<strong><?php echo $DRTglBuat;?></strong>
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
							<td class="text-right"><?php echo $DRPasar;?></td>
						</tr>
						<tr>
							<td>Symbol</td>
							<td class="text-right"><?php echo $DRSymbol;?></td>
						</tr>
						<tr>
							<td>Jangka Waktu</td>
							<td class="text-right"><?php echo $DRJangkaWaktu;?></td>
						</tr>
						<tr>
							<td><strong>Tipe Transaksi</strong></td>
							<td class="text-right"><strong><?php echo $DRRTipe;?></strong></td>
						</tr>
						<tr>
							<td><strong>Aksi</strong></td>
							<td class="text-right"><strong><?php echo $DRRAksi;?></strong></td>
						</tr>
						<tr>
							<td><strong>Dasar Analisa</strong></td>
							<td class="text-right"><strong><?php echo $DRAnalisaID;?></strong></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th colspan="2" class="text-center">Detail <?php echo $DRRAksi;?></th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td class="text-sm">Saldo</td>
								<td class="text-right text-sm">$ <?php echo $DRSaldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Resiko</td>
								<td class="text-right text-sm"><?php echo $DRResiko;?>%</td>
							</tr>
							<tr>
								<td class="text-sm">Jumlah Lot</td>
								<td class="text-right text-sm"><strong><?php echo $DRLot;?></strong></td>
							</tr>
							<tr>
								<td class="text-sm">Harga</td>
								<td class="text-right text-sm"><?php echo $DRHarga;?></td>
							</tr>
							<tr>
								<td class="text-sm">Batas Rugi</td>
								<td class="text-right text-sm"><?php echo $DRBatasRugi;?></td>
							</tr>
							<tr>
								<td class="text-sm">Ambil Untung</td>
								<td class="text-right text-sm"><?php echo $DRAmbilUntung;?></td>
							</tr>
							<tr>
								<td class="text-sm">Kerugian</td>
								<td class="text-right text-sm"><?php echo $DRRugiPoint;?> Point</td>
							</tr>
							<tr>
								<td class="text-sm">Keuntungan</td>
								<td class="text-right text-sm"><?php echo $DRUntungPoint;?> Point</td>
							</tr>
							<tr>
								<td class="text-sm">Kerugian</td>
								<td class="text-right text-sm">$ <?php echo $DRRugiSaldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Keuntungan</td>
								<td class="text-right text-sm">$ <?php echo $DRUntungSaldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Rasio</td>
								<td class="text-right text-sm"><?php echo $DRRasio;?></td>
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
					<?php echo $DRCatatanSebelum;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sebelum</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DRSebelum;?>" target="_blank"><img src="<?php echo $DRSebelum;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="text-center">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="py-2 py-md-3 border">
					<?php echo $DRCatatanSesudah;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sesudah</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DRSesudah;?>" target="_blank"><img src="<?php echo $DRSesudah;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
	</div>
	
	
	<?php
	}
?>
---
<?php if ($modul == 'tambah_rencana') { ?>
	<button type="button" id="batal" class="btn btn-danger">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'ubah_rencana') { 
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'hapus_rencana') { 
	?>
	<button type="submit" class="btn btn-danger">Hapus</button>
	<?php 
	}
?>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$('#ResikoID').mask('99.99');
		
		// trigger function
		$('#AnalisaID').change(function () {
			$('#AnalisaID').trigger('contentchanged');
		});
		
		$('#RencanaTipeID').change(function () {
			$('#RencanaAksiID').trigger('contentchanged');
		});
		
		$('#RencanaAksiID').change(function () {
			var RencanaTipe = $('#RencanaTipeID').val();
			if (RencanaTipe=='') {
				$('#RencanaAksiID').val('');
				$('#RencanaTipeID').focus();
			}
			else {
				$('#RugiPointID').trigger('contentchanged');
				$('#UntungPointID').trigger('contentchanged');
				$('#RugiSaldoID').trigger('contentchanged');
				$('#UntungSaldoID').trigger('contentchanged');
				$('#RasioID').trigger('contentchanged');
				$('#LotID').trigger('contentchanged');
			}
		});
		
		$('#HargaID, #BatasRugiID, #AmbilUntungID').keyup(function() {
			var RencanaAksi = $('#RencanaAksiID').val();
			if (RencanaAksi=='') {
				alert('Pilih Rencana Aksi Terlebih Dahulu!');
				$('#HargaID').val('');
				$('#RencanaAksiID').focus();
			}
			else {
				$('#RugiPointID').trigger('contentchanged');
				$('#UntungPointID').trigger('contentchanged');
				$('#RugiSaldoID').trigger('contentchanged');
				$('#UntungSaldoID').trigger('contentchanged');
				$('#RasioID').trigger('contentchanged');
				$('#LotID').trigger('contentchanged');
			}
		});
		
		$('#ResikoID').keyup(function() {
			var RencanaAksi 	= $('#RencanaAksiID').val();
			var HargaID 		= $('#HargaID').val();
			var BatasRugiID 	= $('#BatasRugiID').val();
			var AmbilUntungID 	= $('#AmbilUntungID').val();
			if (RencanaAksi=='' || HargaID == '' || BatasRugiID == '' || AmbilUntungID == '') {
				alert('Isi Form Sebelumnya Terlebih Dahulu!');
				$('#ResikoID').val('');
			}
			else {
				$('#RugiSaldoID').trigger('contentchanged');
				$('#UntungSaldoID').trigger('contentchanged');
				$('#LotID').trigger('contentchanged');
			}
		});
		
		$('#AnalisaID').on('contentchanged',function() {
			var AnalisaID 	= $('#AnalisaID').val();
			var UserID 		= $('#UserID').val();
			var getData 	= 'analisaInfo';
			$.ajax({
				type:'POST',
				url:'../page/rencana/rencana.data.php',
				data:{'AnalisaID' :AnalisaID, 'UserID':UserID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					$('#Pasar, #PasarID, #Symbol, #SymbolID, #SymbolUnit, #JangkaWaktu, #JangkaWaktuID, #HargaID, #BatasRugiID, #AmbilUntungID, #RugiPointID, #UntungPointID').val('');
					$('#Pasar').val(data[0].PasarNM);
					$('#PasarID').val(data[0].Pasar);
					$('#Symbol').val(data[0].SymbolNM);
					$('#SymbolID').val(data[0].Symbol);
					$('#SymbolUnit').val(data[0].Units);
					$('#JangkaWaktu').val(data[0].JangkaWaktuNM);
					$('#JangkaWaktuID').val(data[0].JangkaWaktu);
					$('#HargaID').mask(data[0].Mask); 
					$('#BatasRugiID').mask(data[0].Mask); 
					$('#AmbilUntungID').mask(data[0].Mask);
					
				}
			})
		});
		
		$('#RencanaAksiID').on('contentchanged',function() {
			var RencanaTipeID 	= $('#RencanaTipeID').val();
			var getData 	= 'rencanaaksi';
			$.ajax({
				type:'POST',
				url:'../page/rencana/rencana.data.php',
				data:{'ID':RencanaTipeID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#RencanaAksiID").empty();
					$("#RencanaAksiID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['RencanaAksiID'];
						var name = data[i]['RencanaAksi'];
						$("#RencanaAksiID").append('<option value="'+id+'">'+name+'</option>');
					}
					
				}
			})
		});
		
		
		$('#RugiPointID, #UntungPointID').on('contentchanged',function() {
			// Cek Aksi 
			var Aksi		= $('#RencanaAksiID').val();
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
			var SymbolUnit	= $('#SymbolUnit').val();
			var Harga 		= $('#HargaID').val();
			var BatasRugi 	= $('#BatasRugiID').val();
			var AmbilUntung	= $('#AmbilUntungID').val();
			if(isNaN(Harga)) {
				var Harga = 0;
			}
			if(isNaN(BatasRugi)) {
				var BatasRugi = 0;
			}
			if(isNaN(AmbilUntung)) {
				var AmbilUntung = 0;
			}
			
			
			// Hitung Point
			if (AksiIs == 'Buy') {
				RugiPoint 	= ((BatasRugi - Harga)*SymbolUnit);
				UntungPoint =  ((AmbilUntung - Harga)*SymbolUnit);
				Rasio =  Math.abs(UntungPoint/RugiPoint);
				if(isNaN(Rasio)) {
				var Rasio = 0;
			}
				$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
				$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				$('#RasioID').val('1:'+parseFloat(Rasio.toFixed(2)));
			}
			else if (AksiIs == 'Sell') {
				RugiPoint 	= ((Harga - BatasRugi)*SymbolUnit);
				UntungPoint =  ((Harga - AmbilUntung )*SymbolUnit);
				Rasio =  Math.abs(UntungPoint/RugiPoint);
				$('#RugiPointID').val(parseFloat(RugiPoint.toFixed(0)));
				$('#UntungPointID').val(parseFloat(UntungPoint.toFixed(0)));
				$('#RasioID').val('1:'+parseFloat(Rasio.toFixed(2)));
			}
			else {
				// Do Nothing;
			}
			
			
			
		});
		
		$('#RugiSaldoID, #UntungSaldoID').on('contentchanged',function() {
			var Saldo		= $('#SaldoID').val();
			var Resiko		= $('#ResikoID').val();
			var RugiPoint 	= $('#RugiPointID').val();
			var UntungPoint	= $('#UntungPointID').val();
			if(isNaN(Saldo)) {
				var Saldo = 0;
			}
			if(isNaN(Resiko)) {
				var Resiko = 0;
			}
			if(isNaN(RugiPoint)) {
				var RugiPoint = 0;
			}
			if(isNaN(UntungPoint)) {
				var UntungPoint = 0;
			}
			var RugiSaldo 	= parseFloat(((Resiko/100) * Saldo).toFixed(2));
			var Lot 		= parseFloat(Math.abs(RugiSaldo/RugiPoint).toFixed(2));
			var UntungSaldo = parseFloat(Math.abs((UntungPoint * Lot).toFixed(2)));
			if(isNaN(RugiSaldo)) {
				var RugiSaldo = 0;
			}
			if(isNaN(Lot)) {
				var Lot = 0;
			}
			if(isNaN(UntungSaldo)) {
				var UntungSaldo = 0;
			}
			$('#LotID').val(Lot);
			$('#RugiSaldoID').val(RugiSaldo);
			$('#UntungSaldoID').val(UntungSaldo);
			
		});
		
		$('#batal').click(function (){
			var modul = 'hapus_rencana';
			var UserID = $('#UserID').val();
			var RencanaID = $('#RencanaID').val();
			$.ajax({
				type:'POST',
				url:'../page/rencana/rencana.process.php',
				data:{'RencanaID':RencanaID, 'UserID': UserID, 'modul': modul},
				success:function(hasil){
					if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
						location.href = "/index.php?page=rencana"
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
					url : '../page/rencana/rencana.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
							location.href = "/index.php?page=rencana"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
