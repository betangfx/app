<?php
	error_reporting(0);
	define	('BASEPATH', dirname(__FILE__));
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/function.php');
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$modul 		= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$id			= isset($_POST['ID']) ? $_POST['ID'] : NULL;
	$userid		= isset($_POST['UserID']) ? $_POST['UserID'] : NULL;
	
	if ($modul == 'tambah_analisa') {
		$NoAnalisa = NoAnalisa($id, $userid);
		$DAPasarID = '';
		$DASymbolID = '';
		$DAJangkaWaktuID = '';
		$DAArahID = '';
		$DARangkaianID = '';
		$DAStrukturID = '';
		$DATipeID = '';
		$DAPolaID = '';
		$DAPosisiID = '';
		$DADerajatID = '';
		$DANilai = '';
		$DASebelum = '';
		$DASesudah = '';
		$DACatatanSebelum = '';
		$DACatatanSesudah = '';
		$DAStatus = '1';
		
	}
	if ($modul == 'ubah_analisa' || $modul == 'lihat_analisa') {
		$qanalisa = mysqli_query($koneksi,"
		SELECT 
		a.AnalisaID, a.Pasar, a.Symbol, a.JangkaWaktu, a.Arah, a.Rangkaian, a.Struktur, a.Tipe, a.Pola, a.Posisi, a.Derajat, a.Aturan, a.Nilai, a.CatatanSebelum, a.CatatanSesudah, a.Sebelum, a.Sesudah, a.StatusID, a.TglBuat,
		b.Pasar AS PasarNM, c.Symbol AS SymbolNM, d.JangkaWaktu AS JangkaWaktuNM, e.Arah AS ArahNM, f.Rangkaian AS RangkaianNM, g.Struktur AS StrukturNM,
		h.Tipe AS TipeNM, i.Pola AS PolaNM, j.Posisi AS PosisiNM, k.Derajat AS DerajatNM
		FROM analisa a
		LEFT JOIN pasar b ON a.Pasar = b.PasarID
		LEFT JOIN symbol c ON a.Symbol = c.SymbolID
		LEFT JOIN jangkawaktu d ON a.JangkaWaktu = d.JangkaWaktuID
		LEFT JOIN wave_arah e ON a.Arah = e.ArahID
		LEFT JOIN wave_rangkaian f ON a.Rangkaian = f.RangkaianID
		LEFT JOIN wave_struktur g ON a.Struktur = g.StrukturID
		LEFT JOIN wave_tipe h ON a.Tipe = h.TipeID
		LEFT JOIN wave_pola i ON a.Pola = i.PolaID
		LEFT JOIN wave_posisi j ON a.Posisi = j.PosisiID
		LEFT JOIN wave_derajat k ON a.Derajat = k.DerajatID
		WHERE a.AnalisaID = '$id' AND a.UserID='$userid'
		");
		while ($danalisa = mysqli_fetch_array($qanalisa,MYSQLI_ASSOC)) {
			$NoAnalisa = $danalisa['AnalisaID'];
			$DAPasarID = $danalisa['Pasar'];
			$PasarNM = $danalisa['PasarNM'];
			$DASymbolID = $danalisa['Symbol'];
			$SymbolNM = $danalisa['SymbolNM'];
			$DAJangkaWaktuID = $danalisa['JangkaWaktu'];
			$JangkaWaktuNM = $danalisa['JangkaWaktuNM'];
			$DAArahID = $danalisa['Arah'];
			$ArahNM = $danalisa['ArahNM'];
			$DARangkaianID = $danalisa['Rangkaian'];
			$RangkaianNM = $danalisa['RangkaianNM'];
			$DAStrukturID = $danalisa['Struktur'];
			$StrukturNM = $danalisa['StrukturNM'];
			$DATipeID = $danalisa['Tipe'];
			$TipeNM = $danalisa['TipeNM'];
			$DAPolaID = $danalisa['Pola'];
			$PolaNM = $danalisa['PolaNM'];
			$DAPosisiID = $danalisa['Posisi'];
			$PosisiNM = $danalisa['PosisiNM'];
			$DADerajatID = $danalisa['Derajat'];
			$DerajatNM = $danalisa['DerajatNM'];
			$DAKondisiAturan = json_decode($danalisa['Aturan']);
			$DANilai = $danalisa['Nilai'];
			$DACatatanSebelum = $danalisa['CatatanSebelum'];
			$DACatatanSesudah = $danalisa['CatatanSesudah'];
			$DASebelum = $danalisa['Sebelum'];
			$DASesudah = $danalisa['Sesudah'];
			$DAStatus = $danalisa['StatusID'];
			$DATglBuat = $danalisa['TglBuat'];
		}
	} 
	if ($modul == 'tambah_analisa' || $modul == 'ubah_analisa') {
	?>
	<div class="row">
		<div class="col-md-6"> <!-- No. Analisa -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">No. Analisa</label>
				<div class="col-sm-8">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text">@</span>
						</div>
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						<input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $userid;?>" readonly>
						<input type="text" class="form-control" id="AnalisaID" name="AnalisaID" value="<?php echo $NoAnalisa;?>" readonly>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6"> <!-- Pasar -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Pasar</label>
				<div class="col-sm-8">
					<select id="PasarID" name="Pasar" class="form-control" required >
						<option value=""></option>
						<?php
							$qpasar = mysqli_query($koneksi,"SELECT * FROM pasar");
							while ($dpasar = mysqli_fetch_array($qpasar,MYSQLI_ASSOC)) {
								$PasarID	=	$dpasar['PasarID'];
								$Pasar		=	$dpasar['Pasar'];
							?>
							<option value="<?php echo $PasarID;?>" <?php if ($DAPasarID == $PasarID) { echo "selected='selected'";} ?>><?php echo $Pasar;?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- SymbolID -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Symbol</label>
				<div class="col-sm-8">
					<select id="SymbolID" name="Symbol" class="form-control" required >
						<option value=""></option>
						<?php
							$qsymbol = mysqli_query($koneksi,"SELECT * FROM symbol");
							while ($dsymbol = mysqli_fetch_array($qsymbol,MYSQLI_ASSOC)) {
								$SymbolID	=	$dsymbol['SymbolID'];
								$Symbol	=	$dsymbol['Symbol'];
							?>
							<option value="<?php echo $SymbolID;?>" <?php if ($DASymbolID == $SymbolID) { echo "selected='selected'";} ?>><?php echo $Symbol;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Jangka Waktu -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jangka Waktu</label>
				<div class="col-sm-8">
					<select id="JangkaWaktuID" name="JangkaWaktu" class="form-control" required >
						<option value=""></option>
						<?php
							$qjwaktu = mysqli_query($koneksi,"SELECT * FROM jangkawaktu");
							while ($djwaktu = mysqli_fetch_array($qjwaktu,MYSQLI_ASSOC)) {
								$JangkaWaktuID	=	$djwaktu['JangkaWaktuID'];
								$JangkaWaktu	=	$djwaktu['JangkaWaktu'];
							?>
							<option value="<?php echo $JangkaWaktuID;?>" <?php if ($DAJangkaWaktuID == $JangkaWaktuID) { echo "selected='selected'";} ?>><?php echo $JangkaWaktu;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Arah -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Arah Dominan</label>
				<div class="col-sm-8">
					<select id="ArahID" name="Arah" class="form-control" required >
						<option value=""></option>
						<?php
							$qarah = mysqli_query($koneksi,"SELECT * FROM wave_arah");
							while ($darah = mysqli_fetch_array($qarah,MYSQLI_ASSOC)) {
								$ArahID	=	$darah['ArahID'];
								$Arah	=	$darah['Arah'];
							?>
							<option value="<?php echo $ArahID;?>" <?php if ($DAArahID == $ArahID) { echo "selected='selected'";} ?>><?php echo $Arah;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Rangkaian -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Rangkaian</label>
				<div class="col-sm-8">
					<select id="RangkaianID" name="Rangkaian" class="form-control" required >
						<option value=""></option>
						<?php
							$qrangkaian = mysqli_query($koneksi,"SELECT * FROM wave_rangkaian");
							while ($drangkaian = mysqli_fetch_array($qrangkaian,MYSQLI_ASSOC)) {
								$RangkaianID	=	$drangkaian['RangkaianID'];
								$Rangkaian	=	$drangkaian['Rangkaian'];
							?>
							<option value="<?php echo $RangkaianID;?>" <?php if ($DARangkaianID == $RangkaianID) { echo "selected='selected'";} ?>><?php echo $Rangkaian;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Struktur -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Struktur</label>
				<div class="col-sm-8">
					<select id="StrukturID" name="Struktur" class="form-control" required >
						<option value=""></option>
						<?php
							$qstruktur = mysqli_query($koneksi,"SELECT * FROM wave_struktur");
							while ($dstruktur = mysqli_fetch_array($qstruktur,MYSQLI_ASSOC)) {
								$StrukturID	=	$dstruktur['StrukturID'];
								$Struktur	=	$dstruktur['Struktur'];
							?>
							<option value="<?php echo $StrukturID;?>" <?php if ($DAStrukturID == $StrukturID) { echo "selected='selected'";} ?>><?php echo $Struktur;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Tipe -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Tipe</label>
				<div class="col-sm-8">
					<select id="TipeID" name="Tipe" class="form-control" required >
						<option value=""></option>
						<?php
							$qtipe = mysqli_query($koneksi,"SELECT * FROM wave_tipe ORDER BY Urutan ASC");
							while ($dtipe = mysqli_fetch_array($qtipe,MYSQLI_ASSOC)) {
								$TipeID	=	$dtipe['TipeID'];
								$Tipe	=	$dtipe['Tipe'];
							?>
							<option value="<?php echo $TipeID;?>" <?php if ($DATipeID == $TipeID) { echo "selected='selected'";} ?>><?php echo $Tipe;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Pola -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Pola</label>
				<div class="col-sm-8">
					<select id="PolaID" name="Pola" class="form-control" required >
						<option value=""></option>
						<?php
							$qpola = mysqli_query($koneksi,"SELECT * FROM wave_pola");
							while ($dpola = mysqli_fetch_array($qpola,MYSQLI_ASSOC)) {
								$PolaID	=	$dpola['PolaID'];
								$Pola	=	$dpola['Pola'];
							?>
							<option value="<?php echo $PolaID;?>" <?php if ($DAPolaID == $PolaID) { echo "selected='selected'";} ?>><?php echo $Pola;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-6"> <!-- Posisi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Posisi</label>
				<div class="col-sm-8">
					<select id="PosisiID" name="Posisi" class="form-control" required >
						<option value=""></option>
						<?php
							$qposisi = mysqli_query($koneksi,"SELECT * FROM wave_posisi");
							while ($dposisi = mysqli_fetch_array($qposisi,MYSQLI_ASSOC)) {
								$PosisiID	=	$dposisi['PosisiID'];
								$Posisi		=	$dposisi['Posisi'];
							?>
							<option value="<?php echo $PosisiID;?>" <?php if ($DAPosisiID == $PosisiID) { echo "selected='selected'";} ?>><?php echo $Posisi;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		
		<div class="col-md-6"> <!-- Derajat -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Derajat</label>
				<div class="col-sm-8">
					<select id="DerajatID" name="Derajat" class="form-control" required >
						<option value=""></option>
						<?php
							$qderajat = mysqli_query($koneksi,"SELECT * FROM wave_derajat");
							while ($dderajat = mysqli_fetch_array($qderajat,MYSQLI_ASSOC)) {
								$DerajatID	=	$dderajat['DerajatID'];
								$Derajat		=	$dderajat['Derajat'];
							?>
							<option value="<?php echo $DerajatID;?>" <?php if ($DADerajatID == $DerajatID) { echo "selected='selected'";} ?>><?php echo $Derajat;?></option>
							<?php 
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div id="AturanShow" class="col-md-12">
			<?php 
				if ($modul == 'ubah_analisa') {
					foreach ($DAKondisiAturan as $AturanID => $Opsi) {
					?>
					<div id="AturanShowKiri['<?php echo $AturanID;?>']" class="form-group row">
						<label class="col-form-label col-sm-9 text-sm-left">
							<?php 
								$queryaturan	= 	mysqli_query($koneksi, "SELECT * FROM wave_aturan WHERE AturanID='$AturanID'");
								$dataaturan		=	mysqli_fetch_array($queryaturan);
								if ($dataaturan['AturanKategoriID'] == '1') {
									echo '<b>'.$dataaturan['Aturan'].'</b>';
									} else {
									echo $dataaturan['Aturan'];
								}
							?>
						</label>
						<div id="AturanShowKanan[<?php echo $AturanID?>]" class="col-sm-3">
							<select id="KondisiAturanID[<?php echo $AturanID;?>]" name="KondisiAturan[<?php echo $AturanID;?>]" class="form-control" required>
								<option value=""></option>
								<option value="Sesuai" <?php if ($Opsi == 'Sesuai') {echo 'selected="selected"';}?>>Sesuai</option>
								<option value="TidakSesuai" <?php if ($Opsi == 'TidakSesuai') {echo 'selected="selected"';}?>>Tidak Sesuai</option>
								<option value="BelumTerjadi"<?php if ($Opsi == 'BelumTerjadi') {echo 'selected="selected"';}?>>Belum Terjadi</option>
							</select>
						</div>
					</div>	
					<?php	
					}
				}
			?>
		</div>
		<div id="KondisiEkstensiID" />
	</div>
	<div id="AnalisaAttribute" class="row" <?php if ($modul == 'ubah_analisa') { echo 'style="display:flex"';} else { echo 'style="display:none"';}?>>
		<div class="col-md-8">
			<div class="text-sm-left">
				<p>Pembobotan:<br/> 
					1. Aturan Utama: 80%<br/>
					2. Aturan Rasio: 10%<br/>
					3. Aturan Waktu: 5%<br/>
				4. Aturan Ekstensi: 5%<br/></p>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group row">
				<label class="col-form-label col-sm-7 text-sm-left">Persentase Kesesuaian</label>
				<div class="input-group col-sm-5">
					<input type="text" class="form-control" id="NilaiSesuaiID" name="NilaiSesuai" value="<?php if ($modul == 'ubah_analisa') { echo $DANilai;}?>" readonly>
					<div class="input-group-append">
						<span class="input-group-text">%</span>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="input-group col-sm-5 text-sm-center">
					<button type="button" id="hitungnilai" class="btn btn-primary">Hitung</button>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sebelum:</strong>
				</div>
				<div class="input-group col-sm-12 mb-2 px-0">
					<textarea class="form-control" rows="4" placeholder="" id="CatatanSebelumID" name="CatatanSebelum" <?php if ($modul == 'ubah_analisa') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DACatatanSebelum;?></textarea>
				</div>
			</div>
			<div class="col-md-12 mb-2 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok Sebelum</button>
					</div>
					<input type="text" class="form-control" id="SebelumID" name="Sebelum" value="<?php echo $DASebelum;?>" <?php if ($modul == 'ubah_analisa') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12 px-0">
				<div class="mb-2">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="input-group col-sm-12 px-0 mb-2">
					<textarea class="form-control" rows="4" placeholder="" id="CatatanSesudahID" name="CatatanSesudah" <?php if ($modul == 'tambah_analisa') { echo 'readonly';} else { echo 'required';} ?>><?php echo $DACatatanSesudah;?></textarea>
				</div>
			</div>
			<div class="col-md-12 px-0">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-outline-primary">Dok Sesudah</button>
					</div>
					<input type="text" class="form-control" id="SesudahID" name="Sesudah" value="<?php echo $DASesudah;?>" <?php if ($modul == 'tambah_analisa') { echo 'readonly';} else { echo 'required';} ?>>
				</div>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="1" <?php if ($DAStatus == '1') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Terbuka
				</span>
			</label>
			<label class="form-check form-check-inline">
				<input class="form-check-input" type="radio" id="Status" name="Status" value="2" <?php if ($DAStatus == '2') { echo 'checked="checked"';}?>>
				<span class="form-check-label">
					Ditutup
				</span>
			</label>
		</div>
	</div>
	<?php
	}
	if ($modul == 'hapus_analisa') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $userid;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="AnalisaID" name="AnalisaID" value="<?php echo $id;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 text-center"> <!-- Struktur -->
			Hapus Analisa dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	} 
	if ($modul == 'lihat_analisa') {
	?>
	<div class="row">
		<div class="col-12">
			<div class="m-sm-3 mb-5">
				<div class="mb-1 text-center">
					<h4><strong><ins>Detail Analisa</ins></strong></h4>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<div class="text-muted">Analisa No.</div>
						<strong><?php echo $id;?></strong>
					</div>
					<div class="col-md-6 text-md-right">
						<div class="text-muted">Tanggal Buat</div>
						<strong><?php echo $DATglBuat;?></strong>
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
							<td class="text-right"><?php echo $DAPasarID;?></td>
						</tr>
						<tr>
							<td>Symbol</td>
							<td class="text-right"><?php echo $SymbolNM;?></td>
						</tr>
						<tr>
							<td>Jangka Waktu</td>
							<td class="text-right"><?php echo $JangkaWaktuNM;?></td>
						</tr>
						<tr>
							<td>Arah Dominan</td>
							<td class="text-right"><?php echo $ArahNM;?></td>
						</tr>
						<tr>
							<td>Rangkaian</td>
							<td class="text-right"><?php echo $RangkaianNM;?></td>
						</tr>
						<tr>
							<td>Struktur</td>
							<td class="text-right"><?php echo $StrukturNM;?></td>
						</tr>
						<tr>
							<td>Tipe</td>
							<td class="text-right"><?php echo $TipeNM;?></td>
						</tr>
						<tr>
							<td>Pola</td>
							<td class="text-right"><?php echo $PolaNM;?></td>
						</tr>
						<tr>
							<td>Posisi</td>
							<td class="text-right"><?php echo $PosisiNM;?></td>
						</tr>
						<tr>
							<td>Derajat</td>
							<td class="text-right"><?php echo $DerajatNM;?></td>
						</tr>
					</tbody>
				</table>
				<table class="table table-striped table-sm">
					<thead>
						<tr>
							<th class="text-center">Aturan</th>
							<th class="text-right">Penilaian</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($DAKondisiAturan as $AturanID => $Opsi) {
							?>
							<tr>
								<td class="text-sm">
									<?php 
										$queryaturan	= 	mysqli_query($koneksi, "SELECT * FROM wave_aturan WHERE AturanID='$AturanID'");
										$dataaturan		=	mysqli_fetch_array($queryaturan);
										if ($dataaturan['AturanKategoriID'] == '1') {
											echo '<strong>'.$dataaturan['Aturan'].'</strong>';
											} else {
											echo $dataaturan['Aturan'];
										}
									?>
								</td>
								<td class="text-right text-sm">
									<?php if ($Opsi == 'Sesuai') {echo 'Sesuai';}?>
									<?php if ($Opsi == 'TidakSesuai') {echo 'Tidak Sesuai';}?>
									<?php if ($Opsi == 'BelumTerjadi') {echo 'Belum Terjadi';}?>
								</td>
							</tr>	
							<?php	
							}
						?>
						<tr>
							<td class="text-center">
								Persentase Kesesuaian 
							</td>
							<td class="text-center">
								<?php echo $DANilai;?>%
							</td>
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
					<?php echo $DACatatanSebelum;?>
				</div>
			</div>
			<div class="col-md-12 mt-3">
				<div class="text-center">
					<strong>Gambar Sebelum</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DASebelum;?>" target="_blank"><img src="<?php echo $DASebelum;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="col-md-12">
				<div class="text-center">
					<strong>Catatan Sesudah:</strong>
				</div>
				<div class="py-2 py-md-3 border">
					<?php echo $DACatatanSesudah;?>
				</div>
			</div>
			<div class="col-md-12 mt-3">
				<div class="text-center">
					<strong>Gambar Sesudah</strong>
				</div>
				<div class="py-2 py-md-3">
					<a href="<?php echo $DASesudah;?>" target="_blank"><img src="<?php echo $DASesudah;?>" style="height: 100%; width: 100%"></a>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<?php
	}
?>
---
<?php if ($modul == 'tambah_analisa') { ?>
	<button type="button" id="batal" class="btn btn-danger">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'ubah_analisa') { 
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'hapus_analisa') { 
	?>
	<button type="submit" class="btn btn-danger">Hapus</button>
	<?php 
	}
?>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		KondisiUtama = [];
		KondisiRasio = [];
		KondisiWaktu = [];
		KondisiEkstensi = [];
		// trigger function
		$('#PasarID').change(function () {
			$('#SymbolID').trigger('contentchanged');
		});
		
		$('#SymbolID').change(function () {
			var PasarID = $("#PasarID").val();
			if ( PasarID == '') {
				$('#SymbolID').val('');
				$('#PasarID').focus();
				} else {
				$('#JangkaWaktuID').trigger('contentchanged');
			}
		});
		
		$('#JangkaWaktuID').change(function () {
			var SymbolID = $("#SymbolID").val();
			if ( SymbolID == '') {
				$('#JangkaWaktuID').val('');
				$('#SymbolID').focus();
				} else {
				$('#ArahID').trigger('contentchanged');
			}
		});
		
		$('#ArahID').change(function () {
			var JangkaWaktuID = $("#JangkaWaktuID").val();
			if ( JangkaWaktuID == '') {
				$('#ArahID').val('');
				$('#JangkaWaktuID').focus();
				} else {
				$('#RangkaianID').trigger('contentchanged');
			}
		});
		
		$('#RangkaianID').change(function () {
			var ArahID = $("#ArahID").val();
			if ( ArahID == '') {
				$('#RangkaianID').val('');
				$('#ArahID').focus();
				} else {
				$('#StrukturID').trigger('contentchanged');
			}
		});
		
		$('#StrukturID').change(function () {
			var RangkaianID = $("#RangkaianID").val();
			if ( RangkaianID == '') {
				$('#StrukturID').val('');
				$('#RangkaianID').focus();
				} else {
				$('#TipeID').trigger('contentchanged');
			}
		});
		
		$('#TipeID').change(function () {
			var StrukturID = $("#StrukturID").val();
			if ( StrukturID == '') {
				$('#TipeID').val('');
				$('#StrukturID').focus();
				} else {
				$('#PolaID').trigger('contentchanged');
			}
		});
		
		$('#PolaID').change(function () {
			var TipeID = $("#TipeID").val();
			if ( TipeID == '') {
				$('#PolaID').val('');
				$('#TipeID').focus();
				} else {
				$('#PosisiID').trigger('contentchanged');
			}
		});
		
		$('#PosisiID').change(function () {
			var PolaID = $("#PolaID").val();
			if ( PolaID == '') {
				$('#PosisiID').val('');
				$('#PolaID').focus();
			}
			else {
				$('#DerajatID').trigger('contentchanged');
				$('#KondisiEkstensiID').trigger('contentchanged');
				$('#AnalisaAttribute').show();
			}
		});
		
		$('#DerajatID').change(function () {
			var PosisiID = $("#PosisiID").val();
			if ( PosisiID == '') {
				$('#DerajatID').val('');
				$('#PosisiID').focus();
				} else {
				$('#KondisiEkstensiID').trigger('contentchanged');
			}
		});
		
		$('#SymbolID').on('contentchanged',function() {
			var PasarID = $("#PasarID").val();
			var getData = 'Symbol';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'ID' :PasarID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#SymbolID").empty();
					$("#SymbolID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['SymbolID'];
						var name = data[i]['Symbol'];
						$("#SymbolID").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			})
		});
		
		$('#StrukturID').on('contentchanged',function() {
			var RangkaianID = $("#RangkaianID").val();
			var getData = 'Struktur';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'ID' :RangkaianID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#StrukturID").empty();
					$("#StrukturID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['StrukturID'];
						var name = data[i]['Struktur'];
						$("#StrukturID").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			})
		});
		
		$('#TipeID').on('contentchanged',function() {
			var StrukturID = $("#StrukturID").val();
			var getData = 'Tipe';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'ID' :StrukturID, 'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#TipeID").empty();
					$("#TipeID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['TipeID'];
						var name = data[i]['Tipe'];
						$("#TipeID").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			})
		});
		
		$('#PolaID').on('contentchanged',function() {
			var RangkaianID = $("#RangkaianID").val();
			var StrukturID = $("#StrukturID").val();
			var TipeID = $("#TipeID").val();
			var getData = 'Pola';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'RangkaianID': RangkaianID, 'StrukturID': StrukturID, 'ID' :TipeID,'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#PolaID").empty();
					$("#PolaID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['PolaID'];
						var name = data[i]['Pola'];
						$("#PolaID").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			})
		});
		
		$('#PosisiID').on('contentchanged',function() {
			var RangkaianID = $("#RangkaianID").val();
			var StrukturID = $("#StrukturID").val();
			var TipeID = $("#TipeID").val();
			var getData = 'Posisi';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'RangkaianID': RangkaianID, 'StrukturID': StrukturID, 'ID' :TipeID,'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					$("#PosisiID").empty();
					$("#PosisiID").append('<option value=""></option>');
					for( var i = 0; i<len; i++){
						var id = data[i]['PosisiID'];
						var name = data[i]['Posisi'];
						$("#PosisiID").append('<option value="'+id+'">'+name+'</option>');
					}
				}
			})
		});
		
		$('#DerajatID').on('contentchanged',function() {
			var RangkaianID = $("#RangkaianID").val();
			var StrukturID = $("#StrukturID").val();
			var TipeID = $("#TipeID").val();
			var getData = 'Aturan';
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.data.php',
				data:{'RangkaianID': RangkaianID, 'StrukturID': StrukturID, 'ID' :TipeID,'getData': getData},
				dataType: 'json',
				success:function(data){
					var len = data.length;
					JumlahAturanUtama = 0;
					JumlahAturanRasio = 0;
					JumlahAturanWaktu = 0;
					JumlahAturanEkstensi = 0;
					
					$("#AturanShow").empty();
					
					for( var i = 0; i<len; i++){
						var id = data[i]['AturanID'];
						var aturan = data[i]['Aturan'];
						var aturankategori = data[i]['AturanKategoriID'];
						
						var NilaiPerAturan = 1;
						
						// Group Aturan Beradasarkan Kategori Utama
						if (aturankategori == 1) {
							
							AturanUtama = {};
							AturanUtama[0] = aturankategori;
							AturanUtama[1] = id;
							KondisiUtama.push(AturanUtama);
							$('#AturanShow').append('<div id="AturanShowKiri'+id+'"></div>').find('#AturanShowKiri'+id+'').addClass('form-group row');
							$('#AturanShowKiri'+id+'').append('<label class="col-form-label col-sm-9 text-sm-left"><b>'+aturan+'</b></label>');
							$('#AturanShowKiri'+id+'').append('<div id="AturanShowKanan'+id+'"></div>').find('#AturanShowKanan'+id+'').addClass('col-sm-3');
							$('#AturanShowKanan'+id+'').append('<select id="KondisiAturanID\['+id+'\]" name="KondisiAturan\['+id+'\]" class="form-control" required />');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value=""></option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Sesuai">Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="TidakSesuai">Tidak Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="BelumTerjadi">Belum Terjadi</option>');
							
							JumlahAturanUtama += NilaiPerAturan;
						}
						
						// Group Aturan Beradasarkan Kategori Rasio
						if (aturankategori == 2) {
							AturanRasio = {};
							AturanRasio[0] = aturankategori;
							AturanRasio[1] = id;
							KondisiRasio.push(AturanRasio);
							JumlahAturanRasio += NilaiPerAturan;
							$('#AturanShow').append('<div id="AturanShowKiri'+id+'"></div>').find('#AturanShowKiri'+id+'').addClass('form-group row');
							$('#AturanShowKiri'+id+'').append('<label class="col-form-label col-sm-9 text-sm-left">'+aturan+'</label>');
							$('#AturanShowKiri'+id+'').append('<div id="AturanShowKanan'+id+'"></div>').find('#AturanShowKanan'+id+'').addClass('col-sm-3');
							$('#AturanShowKanan'+id+'').append('<select id="KondisiAturanID\['+id+'\]" name="KondisiAturan\['+id+'\]" class="form-control" required >');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value=""></option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Sesuai">Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="TidakSesuai">Tidak Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Belum">Belum</option>');
							
						}
						
						// Group Aturan Beradasarkan Kategori Waktu
						if (aturankategori == 3) {
							AturanWaktu = {};
							AturanWaktu[0] = aturankategori;
							AturanWaktu[1] = id;
							KondisiWaktu.push(AturanWaktu);
							JumlahAturanWaktu += NilaiPerAturan;
							$('#AturanShow').append('<div id="AturanShowKiri'+id+'"></div>').find('#AturanShowKiri'+id+'').addClass('form-group row');
							$('#AturanShowKiri'+id+'').append('<label class="col-form-label col-sm-9 text-sm-left">'+aturan+'</label>');
							$('#AturanShowKiri'+id+'').append('<div id="AturanShowKanan'+id+'"></div>').find('#AturanShowKanan'+id+'').addClass('col-sm-3');
							$('#AturanShowKanan'+id+'').append('<select id="KondisiAturanID\['+id+'\]" name="KondisiAturan\['+id+'\]" class="form-control" required >');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value=""></option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Sesuai">Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="TidakSesuai">Tidak Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Belum">Belum</option>');
							
							
						}
						
						// Group Aturan Beradasarkan Kategori Ekstensi
						if (aturankategori == 4) {
							AturanEkstensi = {};
							AturanEkstensi[0] = aturankategori;
							AturanEkstensi[1] = id;
							KondisiEkstensi.push(AturanEkstensi);
							JumlahAturanEkstensi += NilaiPerAturan;
							$('#AturanShow').append('<div id="AturanShowKiri'+id+'"></div>').find('#AturanShowKiri'+id+'').addClass('form-group row');
							$('#AturanShowKiri'+id+'').append('<label class="col-form-label col-sm-9 text-sm-left">'+aturan+'</label>');
							$('#AturanShowKiri'+id+'').append('<div id="AturanShowKanan'+id+'"></div>').find('#AturanShowKanan'+id+'').addClass('col-sm-3');
							$('#AturanShowKanan'+id+'').append('<select id="KondisiAturanID\['+id+'\]" name="KondisiAturan\['+id+'\]" class="form-control" required >');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value=""></option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Sesuai">Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="TidakSesuai">Tidak Sesuai</option>');
							$('#KondisiAturanID\\['+id+'\\]').append('<option value="Belum">Belum</option>');
							
						}
						
					}
					
				}
			})
		});
		
		$('#KondisiEkstensiID').on('contentchanged',function() {
			$.each( KondisiEkstensi, function(index, value) {
				var id = value[1]; 
				$('#KondisiAturanID\\['+id+'\\]').change(function() {
					var OpsiDipilih = $(this).val();
					if (OpsiDipilih != '') {
						$.each(KondisiEkstensi, function (index, value) {
							var nextid = value[1];
							if ( nextid != id) {
								$('#KondisiAturanID\\['+nextid+'\\]').attr('disabled', true);
							}
						});
						} else {
						$.each(KondisiEkstensi, function (index, value) {
							var nextid = value[1];
							if ( nextid != id) {
								$('#KondisiAturanID\\['+nextid+'\\]').attr('disabled', false);
							}
						})
					}
				});
			});
		});
		
		
		$('#hitungnilai').click(function() {
			var Bobot_Aturan_Utama = 80;
			var Bobot_Aturan_Rasio = 10;
			var Bobot_Aturan_Waktu = 5;
			var Bobot_Aturan_Ekstensi = 5;
			
			
			
			var NAUtama = []; // NA Nilai Aturan
			var NSUTama = []; // NS Nilai Sesuai
			var ODPUtama = []; // Opsi Di Pilih
			var TotalNilaiAturanUtama = 0; // Total Nilai Aturan
			
			
			var jau = KondisiUtama.length; // Jumlah Aturan Utama
			for( var i = 0; i<jau; i++){
				var id = KondisiUtama[i][1];
				ODPUtama[i] = $('#KondisiAturanID\\['+id+'\\]').val();
				if (ODPUtama[i] == 'Sesuai') {
					NSUTama[i] = 1;
				} 
				else {
					NSUTama[i] = 0;
				}
				var DNAUtama = {}; // Data Nilai Aturan
				DNAUtama[0] = id;
				DNAUtama[1] = NSUTama[i];
				NAUtama.push(DNAUtama);
			}
			
			var NODUtama = []; // Nilai Opsi Dipilih
			for ( var i = 0; i<jau; i++){
				NODUtama[i] = NAUtama[i][1];
				TotalNilaiAturanUtama += NODUtama[i];
			}
			
			var NARasio = []; // NA Nilai Aturan
			var NSRasio = []; // NS Nilai Sesuai
			var ODPRasio = []; // Opsi Di Pilih
			var TotalNilaiAturanRasio = 0; // Total Nilai Aturan
			
			
			var jar = KondisiRasio.length; // Jumlah Aturan Rasio
			for( var i = 0; i<jar; i++){
				var id = KondisiRasio[i][1];
				ODPRasio[i] = $('#KondisiAturanID\\['+id+'\\]').val();
				if (ODPRasio[i] == 'Sesuai') {
					NSRasio[i] = 1;
				} 
				else {
					NSRasio[i] = 0;
				}
				var DNARasio = {}; // Data Nilai Aturan
				DNARasio[0] = id;
				DNARasio[1] = NSRasio[i];
				NARasio.push(DNARasio);
			}
			
			var NODRasio = []; // Nilai Opsi Dipilih
			for ( var i = 0; i<jar; i++){
				NODRasio[i] = NARasio[i][1];
				TotalNilaiAturanRasio += NODRasio[i];
			}
			
			var NAWaktu = []; // NA Nilai Aturan
			var NSWaktu = []; // NS Nilai Sesuai
			var ODPWaktu = []; // Opsi Di Pilih
			var TotalNilaiAturanWaktu = 0; // Total Nilai Aturan
			
			
			var jaw = KondisiWaktu.length; // Jumlah Aturan Waktu
			for( var i = 0; i<jaw; i++){
				var id = KondisiWaktu[i][1];
				ODPWaktu[i] = $('#KondisiAturanID\\['+id+'\\]').val();
				if (ODPWaktu[i] == 'Sesuai') {
					NSWaktu[i] = 1;
				} 
				else {
					NSWaktu[i] = 0;
				}
				var DNAWaktu = {}; // Data Nilai Aturan
				DNAWaktu[0] = id;
				DNAWaktu[1] = NSWaktu[i];
				NAWaktu.push(DNAWaktu);
			}
			
			var NODWaktu = []; // Nilai Opsi Dipilih
			for ( var i = 0; i<jaw; i++){
				NODWaktu[i] = NAWaktu[i][1];
				TotalNilaiAturanWaktu += NODWaktu[i];
			}
			
			var NAEkstensi = []; // NA Nilai Aturan
			var NSEkstensi = []; // NS Nilai Sesuai
			var ODPEkstensi = []; // Opsi Di Pilih
			var TotalNilaiAturanEkstensi = 0; // Total Nilai Aturan
			
			
			var jau = KondisiEkstensi.length; // Jumlah Aturan Ekstensi
			for( var i = 0; i<jau; i++){
				var id = KondisiEkstensi[i][1];
				ODPEkstensi[i] = $('#KondisiAturanID\\['+id+'\\]').val();
				if (ODPEkstensi[i] == 'Sesuai') {
					NSEkstensi[i] = 1;
				} 
				else {
					NSEkstensi[i] = 0;
				}
				var DNAEkstensi = {}; // Data Nilai Aturan
				DNAEkstensi[0] = id;
				DNAEkstensi[1] = NSEkstensi[i];
				NAEkstensi.push(DNAEkstensi);
			}
			
			var NODEkstensi = []; // Nilai Opsi Dipilih
			for ( var i = 0; i<jau; i++){
				NODEkstensi[i] = NAEkstensi[i][1];
				TotalNilaiAturanEkstensi += NODEkstensi[i];
			}
			
			
			
			var HasilAturanUtama = ((TotalNilaiAturanUtama/JumlahAturanUtama)*Bobot_Aturan_Utama);
			var HasilAturanRasio = ((TotalNilaiAturanRasio/JumlahAturanRasio)*Bobot_Aturan_Rasio);
			var HasilAturanWaktu = ((TotalNilaiAturanWaktu/JumlahAturanWaktu)*Bobot_Aturan_Waktu);
			var HasilAturanEkstensi = ((TotalNilaiAturanEkstensi/1)*Bobot_Aturan_Ekstensi);
			if(isNaN(HasilAturanUtama)) {
				var HasilAturanUtama = 0;
			}
			if(isNaN(HasilAturanRasio)) {
				var HasilAturanRasio = 0;
			}
			if(isNaN(HasilAturanWaktu)) {
				var HasilAturanWaktu = 0;
			}
			if(isNaN(HasilAturanEkstensi)) {
				var HasilAturanEkstensi = 0;
			}
			
			var HasilHitung = HasilAturanUtama + HasilAturanRasio + HasilAturanWaktu + HasilAturanEkstensi;
			
			$('#NilaiSesuaiID').val(parseFloat(HasilHitung.toFixed(2)));
			
		});
		
		$('#batal').click(function (){
			var modul = 'hapus_analisa';
			var UserID = $('#UserID').val();
			var AnalisaID = $('#AnalisaID').val();
			$.ajax({
				type:'POST',
				url:'../page/analisa/analisa.process.php',
				data:{'AnalisaID':AnalisaID, 'UserID': UserID, 'modul': modul},
				success:function(hasil){
					if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
						location.href = "/index.php?page=analisa"
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
					url : '../page/analisa/analisa.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses_ubah_data' || hasil=='sukses_ubah_data ' || hasil=='sukses_ubah_data	') {
							location.href = "/index.php?page=analisa"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
