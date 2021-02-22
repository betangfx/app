<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	if ($modul == 'tambah_jurnal') {
		$BuatNo 		= new No();
		$NoJurnal 		= $BuatNo->NoJurnal($id, $UserID);
		$RencanaID 		= '';
		$Pasar 			= '';
		$SymbolID 		= '';
		$Symbol 		= '';
		$JangkaWaktuID 	= '';
		$JangkaWaktu 	= '';
		$RAksiID 		= '';
		$RAksi 			= '';
		$WKeluar 		= '';
		$WMasuk 		= '';
		$HargaMasuk 	= '';
		$BatasRugi 		= '';
		$AmbilUntung 	= '';
		$RugiPoint 		= '';
		$UntungPoint 	= '';
		$SaldoAwal 		= '';
		$SaldoAkhir 	= '';
		$Resiko 		= '';
		$Lot 			= '';
		$Rasio 			= '';
		$RugiSaldo 		= '';
		$UntungSaldo 	= '';
		$HargaKeluar 	= '';
		$CatatanSebelum = '';
		$CatatanSesudah = '';
		$CaptureSebelum = '';
		$CaptureSesudah = '';
		$StatusID 		= '1';
		
	}
	if ($modul == 'ubah_jurnal' || $modul == 'lihat_jurnal') {
		$Jurnal = new jurnal_data();
		foreach ($Jurnal->jurnal($id,$UserID) as $row) {
			$NoJurnal 		= $row['JurnalID'];
			$RencanaID 		= $row['RencanaID'];
			$Pasar 			= $row['Pasar'];
			$SymbolID 		= $row['SymbolID'];
			$Symbol 		= $row['Symbol'];
			$SymbolUnits 	= $row['Units'];
			$SymbolMask 	= $row['Mask'];
			$JangkaWaktuID 	= $row['JangkaWaktuID'];
			$JangkaWaktu 	= $row['JangkaWaktu'];
			$RAksi			= $row['RencanaAksi'];
			$RAksiID 		= $row['AksiID'];
			if ($row['WaktuMasuk'] == '0000-00-00 00:00:00') {
				$WMasuk 	= '';
				}
			else {
				$WMasuk 	= $row['WaktuMasuk'];
				}
			$HargaMasuk 	= $row['HargaMasuk'];
			$BatasRugi 		= $row['BatasRugi'];
			$AmbilUntung 	= $row['AmbilUntung'];
			$RugiPoint 		= $row['RugiPoint'];
			$UntungPoint 	= $row['UntungPoint'];
			$SaldoAwal 		= $row['SaldoAwal'];
			$Resiko 		= $row['Resiko'];
			$Lot 			= $row['Lot'];
			if ($row['WaktuKeluar'] == '0000-00-00 00:00:00') {
				$WKeluar 	= '';
				}
			else {
				$WKeluar 	= $row['WaktuKeluar'];
				}
			
			$AKeluar 		= $row['AlasanKeluar'];
			$HargaKeluar 	= $row['HargaKeluar'];
			$Rasio 			= $row['Rasio'];
			$RugiSaldo 		= $row['Kerugian'];
			$UntungSaldo 	= $row['Keuntungan'];
			$SaldoAkhir 	= $row['SaldoAkhir'];
			$CatatanSebelum = $row['CatatanSebelum'];
			$CatatanSesudah = $row['CatatanSesudah'];
			$CaptureSebelum = $row['CaptureSebelum'];
			$CaptureSesudah = $row['CaptureSesudah'];
			$StatusID 		= $row['StatusID'];
			$TglBuat 		= $row['TglBuat'];
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
						<input type="text" class="form-control" id="JurnalID" name="JurnalID" value="<?php echo $NoJurnal;?>" readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- No. Rencana -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Dasar Transaksi</label>
				<div class="col-sm-8">
					<select id="RencanaID" name="RencanaID" class="form-control" required >
						<option value="">Rencana No...</option>
						<option value="Manual">Tanpa Rencana</option>
						<?php
							$data_rencana = new rencana_data();
							foreach ($data_rencana->rencana('',$UserID) as $row) {
							?>
							<option value="<?php echo $row['RencanaID'];?>" <?php if ($RencanaID == $row['RencanaID']) { echo "selected='selected'";} ?>><?php echo $row['RencanaID'];?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Pasar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Pasar</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Pasar" value="<?php echo $Pasar;?>" data-container="body" data-toggle="popover" data-placement="top" data-content="Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa." readonly>
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
					<input type="hidden" id="SymbolMask" value="<?php echo $SymbolMask;?>">
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
		<div class="col-md-6"> <!-- Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Transaksi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Aksi" value="<?php echo $RAksi;?>" readonly>
					<input type="hidden" id="AksiID" name="AksiID" value="<?php echo $RAksiID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Waktu Masuk -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Waktu Masuk</label>
				<div class="col-sm-8">
					<div class="input-group date" id="WaktuMasukID" data-target-input="nearest">
						<input type="text" id="WaktuMasuk" name="WaktuMasuk" class="form-control datetimepicker-input" data-target="#WaktuMasukID" value="<?php echo $WMasuk;?>" <?php if ($modul == 'ubah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
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
					<input type="text" class="form-control text-right" id="HargaMasukID" name="HargaMasuk" value="<?php echo $HargaMasuk;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Batas Rugi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Batas Rugi</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="BatasRugiID" name="BatasRugi" value="<?php echo $BatasRugi;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Ambil Untung -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Ambil Untung</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="AmbilUntungID" name="AmbilUntung" value="<?php echo $AmbilUntung;?>" readonly>
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
		<div class="col-md-6"> <!-- Resiko -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Resiko / Transaksi</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">Persentase</span>
						</div>
						<input type="text" class="form-control text-right" id="ResikoID" name="Resiko" value="<?php echo $Resiko;?>" readonly>
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
						<input type="text" class="form-control text-right" id="LotID" name="Lot" value="<?php echo $Lot;?>" readonly>
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
						<input type="text" id="WaktuKeluar" name="WaktuKeluar" class="form-control datetimepicker-input" data-target="#WaktuKeluarID" value="<?php echo $WKeluar;?>" <?php if ($modul == 'tambah_jurnal') { echo 'readonly';} else { echo 'required';} ?>>
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
						<option value="Impas" <?php if ($modul == 'ubah_jurnal' && $AKeluar == 'Impas') { echo 'selected="selected"';}?>>Impas</option>
						<option value="Rugi" <?php if ($modul == 'ubah_jurnal' && $AKeluar == 'Rugi') { echo 'selected="selected"';}?>>Rugi</option>
						<option value="Untung" <?php if ($modul == 'ubah_jurnal' && $AKeluar == 'Untung') { echo 'selected="selected"';}?>>Untung</option>
						<option value="Manual" <?php if ($modul == 'ubah_jurnal' && $AKeluar == 'Manual') { echo 'selected="selected"';}?>>Manual</option>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Harga -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Harga Keluar</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-right" id="HargaKeluarID" name="HargaKeluar" value="<?php echo $HargaKeluar;?>" readonly>
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
		<div class="col-md-6"> <!-- Jarak Untung  -->
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
		<div class="col-md-6"> <!-- Kerugian -->
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
		<div class="col-md-6"> <!-- Keuntungan --> 
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
		<div class="col-md-6"> <!-- Saldo -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Saldo Awal</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">($)</span>
						</div>
						<input type="text" class="form-control text-right" id="SaldoAwalID" name="SaldoAwal" value="<?php echo $SaldoAwal;?>" readonly>
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
						<input type="text" class="form-control text-right" id="SaldoAkhirID" name="SaldoAkhir" value="<?php echo $SaldoAkhir;?>" readonly>
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
	if ($modul == 'hapus_jurnal') {
	?>
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
							<td><strong>Aksi</strong></td>
							<td class="text-right"><strong><?php echo $RAksi;?></strong></td>
						</tr>
						<tr>
							<td><strong>Dasar Rencana</strong></td>
							<td class="text-right"><strong><?php echo $RencanaID;?></strong></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th colspan="3" class="text-center">Detail <?php echo $RAksi;?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-sm">Saldo</td>
							<td colspan="2" class="text-right text-sm">$ <?php echo $SaldoAwal;?></td>
						</tr>
						<tr>
							<td class="text-sm">Resiko</td>
							<td colspan="2" class="text-right text-sm"><?php echo $Resiko;?>%</td>
						</tr>
						<tr>
							<td class="text-sm">Jumlah Lot</td>
							<td colspan="2" class="text-right text-sm"><strong><?php echo $Lot;?></strong></td>
						</tr>
						<tr>
							<td class="text-sm">Waktu Masuk</td>
							<td colspan="2" class="text-right text-sm"><?php echo $WMasuk;?></td>
						</tr>
						<tr>
							<td class="text-sm">Waktu Keluar</td>
							<td colspan="2" class="text-right text-sm"><?php echo $WKeluar;?></td>
						</tr>
						<tr>
							<td class="text-sm">Harga Masuk</td>
							<td colspan="2" class="text-right text-sm"><?php echo $HargaMasuk;?></td>
						</tr>
						<tr>
							<td class="text-sm">Harga Keluar</td>
							<td colspan="2" class="text-right text-sm"><?php echo $HargaKeluar;?></td>
						</tr>
						<tr>
							<td class="text-sm">Alasan Keluar</td>
							<td colspan="2" class="text-right text-sm">
								<?php 
									if ($AKeluar == 'Impas') {
									echo '<span class="badge badge-warning">'.$AKeluar.'</span>';
									}
									else if ($AKeluar == 'Rugi') {
									echo '<span class="badge badge-danger">'.$AKeluar.'</span>';
									}
									else if ($AKeluar == 'Untung') {
									echo '<span class="badge badge-success">'.$AKeluar.'</span>';
									}
								?>
							</td>
						</tr>
						<tr>
							<td class="text-sm">Kerugian</td>
							<td class="text-right text-sm"><?php echo $RugiPoint;?> Point</td>
							<td class="text-right text-sm">$ <?php echo $RugiSaldo;?></td>
						</tr>
						<tr>
							<td class="text-sm">Keuntungan</td>
							<td class="text-right text-sm"><?php echo $UntungPoint;?> Point</td>
							<td class="text-right text-sm">$ <?php echo $UntungSaldo;?></td>
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
					<a href="<?php echo $Sebelum;?>" target="_blank"><img src="<?php echo $Sebelum;?>" style="height: 100%; width: 100%"></a>
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
					<a href="<?php echo $Sesudah;?>" target="_blank"><img src="<?php echo $Sesudah;?>" style="height: 100%; width: 100%"></a>
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

<script type="text/javascript">
	$(document).ready(function() {

		$('#CatatanSebelumID, #CatatanSesudahID').summernote({
        placeholder: '',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
		});

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
				url:'../modules/main/jurnal/jurnal.process.php',
				data:{'RencanaID' :RencanaID, 'UserID':UserID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var RencanaAksi = data[0].RencanaAksiID;
					$('#Pasar, #Symbol, #SymbolID, #SymbolUnit, #JangkaWaktu, #JangkaWaktuID, #Aksi, #AksiID, #HargaMasukID, #BatasRugiID, #AmbilUntungID, #SaldoAwalID, #ResikoID, #LotID, #HargaKeluarID, #RugiPointID, #UntungPointID, #RugiSaldoID, #UntungSaldoID, #RasioID').val('');
					$('#Pasar').val(data[0].Pasar);
					$('#SymbolID').val(data[0].SymbolID);
					$('#Symbol').val(data[0].Symbol);
					$('#SymbolUnit').val(data[0].Units);
					$('#JangkaWaktuID').val(data[0].JangkaWaktuID);
					$('#JangkaWaktu').val(data[0].JangkaWaktu);
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
				url:'../modules/main/jurnal/jurnal.process.php',
				data:{'ID':JurnalID, 'UserID': UserID, 'modul': modul},
				success:function(hasil){
					if (hasil=='sukses	') {
						location.href = "/index.php?page=jurnal"
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
					url : '../modules/main/jurnal/jurnal.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses	') {
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
