<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	if ($modul == 'tambah_rencana') {
		$BuatNo 		= new No();
		$NoRencana 		= $BuatNo->NoRencana($id, $UserID);
		$AnalisaID 		= '';
		$Pasar 			= '';
		$PasarID 		= '';
		$Symbol 		= '';
		$SymbolID 		= '';
		$JangkaWaktu 	= '';
		$JangkaWaktuID 	= '';
		$RTipeID 		= '';
		$RAksiID 		= '';
		$Harga 			= '';
		$BatasRugi 		= '';
		$AmbilUntung 	= '';
		$RugiPoint 		= '';
		$UntungPoint 	= '';
		$CekSaldo 		= new settingAkun();
		foreach ($CekSaldo->cekSaldoAkun($UserID) as $row) {
		$saldoAkun 		= $row['SaldoAkhir'];
		}
		$Saldo 			= $saldoAkun;
		$Resiko 		= '';
		$Lot 			= '';
		$Rasio 			= '';
		$RugiSaldo 		= '';
		$UntungSaldo 	= '';
		$CatatanSebelum = '';
		$CaptureSebelum = '';
		$CatatanSesudah = '';
		$CaptureSesudah = '';
		$StatusID 		= '1';
				
	}
	if ($modul == 'ubah_rencana' || $modul == 'lihat_rencana') {
		$Rencana = new rencana_data();
		foreach ($Rencana->rencana($id,$UserID) as $row) {
			$NoRencana 			= $row['RencanaID'];
			$AnalisaID 			= $row['AnalisaID'];
			$PasarID 			= $row['PasarID'];
			$Pasar 				= $row['Pasar'];
			$SymbolID 			= $row['SymbolID'];
			$Symbol 			= $row['Symbol'];
			$JangkaWaktuID 		= $row['JangkaWaktuID'];
			$JangkaWaktu 		= $row['JangkaWaktu'];
			$RTipeID 			= $row['RencanaTipeID'];
			$RTipe 				= $row['RencanaTipe'];
			$RAksiID 			= $row['RencanaAksiID'];
			$RAksi 				= $row['RencanaAksi'];
			$Harga 				= $row['Harga'];
			$BatasRugi 			= $row['BatasRugi'];
			$AmbilUntung 		= $row['AmbilUntung'];
			$RugiPoint			= $row['RugiPoint'];
			$UntungPoint 		= $row['UntungPoint'];
			$Saldo 				= $row['SaldoAwal'];
			$Resiko 			= $row['Resiko'];
			$Lot 				= $row['Lot'];
			$Rasio 				= $row['Rasio'];
			$RugiSaldo 			= $row['Kerugian'];
			$UntungSaldo 		= $row['Keuntungan'];
			$CatatanSebelum 	= $row['CatatanSebelum'];
			$CatatanSesudah 	= $row['CatatanSesudah'];
			$CaptureSebelum 	= $row['CaptureSebelum'];
			$CaptureSesudah 	= $row['CaptureSesudah'];
			$StatusID 			= $row['StatusID'];
			$TglBuat 			= $row['TglBuat'];
		}
	}
	?>
	<div class="row">
		<!-- Form Hidden Value -->
		<div class="col-md-12">
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $id;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $UserID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php  
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
						<input type="text" class="form-control" id="RencanaID" name="RencanaID" value="<?php echo $NoRencana;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- No. Analisa -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Dasar Rencana</label>
				<div class="col-sm-8">
					<select id="AnalisaID" name="AnalisaID" class="form-control select2" data-toggle="select2" required >
						<optgroup><option value="">Analisa No...</option></optgroup>
						<optgroup label="Analisa Sederhana">
							<?php 
								$data_simple = new rencana_data();
								foreach ($data_simple->analisa_simple($UserID) as $row) {
								?>
							<option value="<?php echo $row['AnalisaID'];?>" <?php if ($AnalisaID == $row['AnalisaID']) {echo 'selected="selected"';}?> ><?php echo $row['AnalisaID'];?></option>
							<?php
								}
								?>
						</optgroup>
						<optgroup label="Analisa Penawaran & Permintaan">
						<?php 
								$data_snd = new rencana_data();
								foreach ($data_snd->analisa_snd($UserID) as $row) {
								?>
							<option value="<?php echo $row['AnalisaID'];?>" <?php if ($AnalisaID == $row['AnalisaID']) {echo 'selected="selected"';}?> ><?php echo $row['AnalisaID'];?></option>
							<?php
								}
								?>
						</optgroup>
						<optgroup label="Analisa Support & Resisten">
						<?php 
								$data_snr = new rencana_data();
								foreach ($data_snr->analisa_snr($UserID) as $row) {
								?>
							<option value="<?php echo $row['AnalisaID'];?>" <?php if ($AnalisaID == $row['AnalisaID']) {echo 'selected="selected"';}?> ><?php echo $row['AnalisaID'];?></option>
							<?php
								}
								?>
						</optgroup>
						<optgroup label="Analisa Gelombang Elliott">
						<?php 
								$data_elliott = new rencana_data();
								foreach ($data_elliott->analisa_elliott($UserID) as $row) {
								?>
							<option value="<?php echo $row['AnalisaID'];?>" <?php if ($AnalisaID == $row['AnalisaID']) {echo 'selected="selected"';}?> ><?php echo $row['AnalisaID'];?></option>
							<?php
								}
								?>
						</optgroup>
					
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Pasar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Pasar</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Pasar" value="<?php echo $Pasar;?>" readonly>
					<input type="hidden" id="PasarID" name="PasarID" value="<?php echo $PasarID;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Symbol -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Symbol</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Symbol" value="<?php echo $Symbol;?>" readonly>
					<input type="hidden" id="SymbolID" name="SymbolID" value="<?php echo $SymbolID;?>">
					<input type="hidden" id="SymbolUnit" value="<?php echo $SymbolUnits;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jangka Waktu -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jangka Waktu</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="JangkaWaktu" value="<?php echo $JangkaWaktu;?>" readonly>
					<input type="hidden" id="JangkaWaktuID" name="JangkaWaktuID" value="<?php echo $JangkaWaktuID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Tipe Rencana Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rencana Transaksi</label>
				<div class="col-sm-8">
					<select id="RencanaTipeID" name="RencanaTipeID" class="form-control" required >
						<option value=""></option>
						<?php
							$qsrtipe = mysqli_query($koneksi,"SELECT * FROM rencana_tipe");
							while ($tipe = mysqli_fetch_array($qsrtipe,MYSQLI_ASSOC)) {
								$DSRTipeID	=	$tipe['RencanaTipeID'];
								$DSRTipe	=	$tipe['RencanaTipe'];
							?>
							<option value="<?php echo $DSRTipeID;?>" <?php if ($RTipeID == $DSRTipeID) { echo "selected='selected'";} ?>><?php echo $DSRTipe;?></option>
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
					<select id="RencanaAksiID" name="RencanaAksiID" class="form-control" required >
						<option value=""></option>
						<?php
							$qsraksi = mysqli_query($koneksi,"SELECT * FROM rencana_aksi");
							while ($dsraksi = mysqli_fetch_array($qsraksi,MYSQLI_ASSOC)) {
								$DSRAksiID	=	$dsraksi['RencanaAksiID'];
								$DSRAksi	=	$dsraksi['RencanaAksi'];
							?>
							<option value="<?php echo $DSRAksiID;?>" <?php if ($RAksiID == $DSRAksiID) { echo "selected='selected'";} ?>><?php echo $DSRAksi;?></option>
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
					<input type="text" class="form-control text-right" id="HargaID" name="Harga" value="<?php echo $Harga;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Batas Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Batas Rugi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="BatasRugiID" name="BatasRugi" value="<?php echo $BatasRugi;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Ambil Untung -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Ambil Untung</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="AmbilUntungID" name="AmbilUntung" value="<?php echo $AmbilUntung;?>" required>
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
						<input type="text" class="form-control text-right" id="SaldoID" name="Saldo" value="<?php echo $Saldo;?>" required>
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
						<input type="text" class="form-control text-right" id="ResikoID" name="Resiko" value="<?php echo $Resiko;?>">
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
						<input type="text" class="form-control text-right" id="LotID" name="Lot" value="<?php echo $Lot;?>" readonly>
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
						<input type="text" class="form-control text-center" id="RasioID" name="Rasio" value="<?php echo $Rasio;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jarak Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kerugian</label>
				<div class="col-sm-8">
					<div class="input-group">
						<input type="text" class="form-control text-right" id="RugiPointID" name="RugiPoint" value="<?php echo $RugiPoint;?>" readonly>
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
						<input type="text" class="form-control text-right" id="UntungPointID" name="UntungPoint" value="<?php echo $UntungPoint;?>" readonly>
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
						<input type="text" class="form-control text-right" id="RugiSaldoID" name="RugiSaldo" value="<?php echo $RugiSaldo;?>" readonly>
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
						<input type="text" class="form-control text-right" id="UntungSaldoID" name="UntungSaldo" value="<?php echo $UntungSaldo;?>" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="CatatanSebelumID">Catatan</label>
				<textarea id="CatatanSebelumID" name="CatatanSebelum" class="form-control"><?php echo $CatatanSebelum;?></textarea>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Capture</button>
					</div>
					<input type="text" class="form-control" id="CaptureSebelumID" name="CaptureSebelum" value="<?php echo $CaptureSebelum;?>">
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="CatatanSesudahID">Catatan</label>
				<textarea id="CatatanSesudahID" name="CatatanSesudah" class="form-control"><?php echo $CatatanSesudah;?></textarea>
			</div>
			<div class="form-group">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Capture</button>
					</div>
					<input type="text" class="form-control" id="CaptureSesudahID" name="CaptureSesudah" value="<?php echo $CaptureSesudah;?>">
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="1"
					<?php if ($StatusID == '1') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Terbuka
				</span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="2"
					<?php if ($StatusID == '2') { echo 'checked="checked"';}?>>
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
						<strong><?php echo $TglBuat;?></strong>
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
							<td class="text-right"><?php echo $Pasar;?></td>
						</tr>
						<tr>
							<td>Symbol</td>
							<td class="text-right"><?php echo $Symbol;?></td>
						</tr>
						<tr>
							<td>Jangka Waktu</td>
							<td class="text-right"><?php echo $JangkaWaktu;?></td>
						</tr>
						<tr>
							<td><strong>Tipe Transaksi</strong></td>
							<td class="text-right"><strong><?php echo $RTipe;?></strong></td>
						</tr>
						<tr>
							<td><strong>Aksi</strong></td>
							<td class="text-right"><strong><?php echo $RAksi;?></strong></td>
						</tr>
						<tr>
							<td><strong>Dasar Analisa</strong></td>
							<td class="text-right"><strong><?php echo $AnalisaID;?></strong></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th colspan="2" class="text-center">Detail <?php echo $RAksi;?></th>
						</tr>
					</thead>
					<tbody>
							<tr>
								<td class="text-sm">Saldo</td>
								<td class="text-right text-sm">$ <?php echo $Saldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Resiko</td>
								<td class="text-right text-sm"><?php echo $Resiko;?>%</td>
							</tr>
							<tr>
								<td class="text-sm">Jumlah Lot</td>
								<td class="text-right text-sm"><strong><?php echo $Lot;?></strong></td>
							</tr>
							<tr>
								<td class="text-sm">Harga</td>
								<td class="text-right text-sm"><?php echo $Harga;?></td>
							</tr>
							<tr>
								<td class="text-sm">Batas Rugi</td>
								<td class="text-right text-sm"><?php echo $BatasRugi;?></td>
							</tr>
							<tr>
								<td class="text-sm">Ambil Untung</td>
								<td class="text-right text-sm"><?php echo $AmbilUntung;?></td>
							</tr>
							<tr>
								<td class="text-sm">Kerugian</td>
								<td class="text-right text-sm"><?php echo $RugiPoint;?> Point</td>
							</tr>
							<tr>
								<td class="text-sm">Keuntungan</td>
								<td class="text-right text-sm"><?php echo $UntungPoint;?> Point</td>
							</tr>
							<tr>
								<td class="text-sm">Kerugian</td>
								<td class="text-right text-sm">$ <?php echo $RugiSaldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Keuntungan</td>
								<td class="text-right text-sm">$ <?php echo $UntungSaldo;?></td>
							</tr>
							<tr>
								<td class="text-sm">Rasio</td>
								<td class="text-right text-sm"><?php echo $Rasio;?></td>
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
					<?php echo $CatatanSebelum;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sebelum</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $CaptureSebelum;?>" target="_blank"><img src="<?php echo $CaptureSebelum;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="text-center">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="py-2 py-md-3 border">
					<?php echo $CatatanSesudah;?>
				</div>
			</div>
			<div class="col-md-12">
				<div class="text-center">
					<strong>Gambar Sesudah</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $CaptureSesudah;?>" target="_blank"><img src="<?php echo $CaptureSesudah;?>" style="height: 100%; width: 100%"></a>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('.select2').each(function() {
			$(this)
				.wrap('<div class=\'position-relative\'></div>')
				.select2({
					placeholder: 'Select value',
					dropdownParent: $(this).parent()
				});
			});
		$('#CatatanSebelumID, #CatatanSesudahID').summernote({
        placeholder: '',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
		});
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
				url:'../modules/main/rencana/rencana.process.php',
				data:{'AnalisaID' :AnalisaID, 'UserID':UserID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					$('#Pasar, #PasarID, #Symbol, #SymbolID, #SymbolUnit, #JangkaWaktu, #JangkaWaktuID, #HargaID, #BatasRugiID, #AmbilUntungID, #RugiPointID, #UntungPointID').val('');
					$('#PasarID').val(data[0].PasarID);
					$('#Pasar').val(data[0].Pasar);
					$('#SymbolID').val(data[0].SymbolID);
					$('#Symbol').val(data[0].Symbol);
					$('#SymbolUnit').val(data[0].Units);
					$('#JangkaWaktuID').val(data[0].JangkaWaktuID);
					$('#JangkaWaktu').val(data[0].JangkaWaktu);
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
				url:'../modules/main/rencana/rencana.process.php',
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
				url:'../modules/main/rencana/rencana.process.php',
				data:{'ID':RencanaID, 'UserID': UserID, 'modul': modul},
				success:function(hasil){
					if (hasil=='sukses	') {
						location.href = "/index.php?page=rencana"
						} else {
						$('#modal-data').html(hasil);
					}
				}
			})
		});
		$("#newForm").validate({
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
					url : '../modules/main/rencana/rencana.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses	') {
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
