<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/function.php');
	include ($_SERVER['DOCUMENT_ROOT'] . '/includes/dbold.php');
	$id			= isset($_POST['ID']) ? $_POST['ID'] : NULL;
	$modul 		= isset($_POST['modul']) ? $_POST['modul'] : NULL;
	$submodul	= isset($_POST['sub']) ? $_POST['sub'] : NULL;
	
	//pre
	if ($modul == 'tambah_setting-analisa' && $submodul == 'rangkaian') {
		$RangkaianID	=	'';
		$Rangkaian		=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'struktur') {
		$StrukturID		=	'';
		$Struktur		=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'tipe') {
		$TipeID			=	'';
		$Tipe			=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'pola') {
		$PolaID			=	'';
		$Pola			=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'posisi') {
		$PosisiID		=	'';
		$Posisi			=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'derajat') {
		$DerajatID		=	'';
		$Derajat		=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'aturan') {
		$AturanID		=	'';
		$Aturan			=	'';
		$Deskripsi		=	'';
	}
	if ($modul == 'tambah_setting-analisa' && $submodul == 'aturanjoin') {
		$AturanJoinID	=	'';
		$NamaAturan		=	'';
		$DlRangkaian	=	array();
		$DlStruktur		=	array();
		$DlTipe			=	array();
		$DlPola			=	array();
		$DlPosisi		=	array();
		$DlAturan		=	array();
		$Deskripsi		=	'';
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'rangkaian') || $modul == 'hapus_setting-analisa' && $submodul == 'rangkaian') {
		$qrangkaian = mysqli_query($koneksi,"SELECT * FROM wave_rangkaian WHERE RangkaianID = '$id'");
		while ($drangkaian = mysqli_fetch_array($qrangkaian,MYSQLI_ASSOC)) {
			$RangkaianID	=	$drangkaian['RangkaianID'];
			$Rangkaian		=	$drangkaian['Rangkaian'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'struktur') || $modul == 'hapus_setting-analisa' && $submodul == 'struktur') {
		$qstruktur = mysqli_query($koneksi,"SELECT * FROM wave_struktur WHERE StrukturID = '$id'");
		while ($dstruktur = mysqli_fetch_array($qstruktur,MYSQLI_ASSOC)) {
			$StrukturID		=	$dstruktur['StrukturID'];
			$Struktur		=	$dstruktur['Struktur'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'tipe') || $modul == 'hapus_setting-analisa' && $submodul == 'tipe') {
		$qtipe = mysqli_query($koneksi,"SELECT * FROM wave_tipe WHERE TipeID = '$id'");
		while ($dtipe = mysqli_fetch_array($qtipe,MYSQLI_ASSOC)) {
			$TipeID			=	$dtipe['TipeID'];
			$Tipe			=	$dtipe['Tipe'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'pola') || $modul == 'hapus_setting-analisa' && $submodul == 'pola') {
		$qpola = mysqli_query($koneksi,"SELECT * FROM wave_pola WHERE PolaID = '$id'");
		while ($dpola = mysqli_fetch_array($qpola,MYSQLI_ASSOC)) {
			$PolaID			=	$dpola['PolaID'];
			$Pola			=	$dpola['Pola'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'posisi') || $modul == 'hapus_setting-analisa' && $submodul == 'posisi') {
		$qposisi = mysqli_query($koneksi,"SELECT * FROM wave_posisi WHERE PosisiID = '$id'");
		while ($dposisi = mysqli_fetch_array($qposisi,MYSQLI_ASSOC)) {
			$PosisiID		=	$dposisi['PosisiID'];
			$Posisi			=	$dposisi['Posisi'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'derajat') || $modul == 'hapus_setting-analisa' && $submodul == 'derajat') {
		$qderajat = mysqli_query($koneksi,"SELECT * FROM wave_derajat WHERE DerajatID = '$id'");
		while ($dderajat = mysqli_fetch_array($qderajat,MYSQLI_ASSOC)) {
			$DerajatID		=	$dderajat['DerajatID'];
			$Derajat		=	$dderajat['Derajat'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'aturan') || $modul == 'hapus_setting-analisa' && $submodul == 'aturan') {
		$qaturan = mysqli_query($koneksi,"SELECT * FROM wave_aturan WHERE AturanID = '$id'");
		while ($daturan = mysqli_fetch_array($qaturan,MYSQLI_ASSOC)) {
			$AturanID		=	$daturan['AturanID'];
			$Aturan			=	$daturan['Aturan'];
			$Deskripsi		=	'';
		}
	}
	if (($modul == 'ubah_setting-analisa' && $submodul == 'aturanjoin') || $modul == 'hapus_setting-analisa' && $submodul == 'aturanjoin') {
		$qaturanjoin = mysqli_query($koneksi,"SELECT * FROM wave_aturanjoin WHERE AturanJoinID = '$id'");
		while ($daturanjoin = mysqli_fetch_array($qaturanjoin,MYSQLI_ASSOC)) {
			$AturanJoinID		=	$daturanjoin['AturanJoinID'];
			$NamaAturan			=	$daturanjoin['NamaAturan'];
			$DlRangkaian		=	explode(',',$daturanjoin['RangkaianID']);
			$DlStruktur			=	explode(',',$daturanjoin['StrukturID']);
			$DlTipe				=	explode(',',$daturanjoin['TipeID']);
			$DlPola				=	explode(',',$daturanjoin['PolaID']);
			$DlPosisi			=	explode(',',$daturanjoin['PosisiID']);
			$DlAturan			=	explode(',',$daturanjoin['AturanID']);
			$Deskripsi			=	$daturanjoin['Deskripsi'];
		}
	}
	// form body
	if (($modul == 'tambah_setting-analisa' && $submodul == 'rangkaian') || ($modul == 'ubah_setting-analisa' && $submodul == 'rangkaian')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $RangkaianID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Rangkaian -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Rangkaian</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="RangkaianID" name="Rangkaian" value="<?php echo $Rangkaian;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'struktur') || ($modul == 'ubah_setting-analisa' && $submodul == 'struktur')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $StrukturID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Struktur -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Struktur</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="StrukturID" name="Struktur" value="<?php echo $Struktur;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'tipe') || ($modul == 'ubah_setting-analisa' && $submodul == 'tipe')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $TipeID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Tipe -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Tipe</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="TipeID" name="Tipe" value="<?php echo $Tipe;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'pola') || ($modul == 'ubah_setting-analisa' && $submodul == 'pola')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $PolaID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Pola -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Pola</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="PolaID" name="Pola" value="<?php echo $Pola;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'posisi') || ($modul == 'ubah_setting-analisa' && $submodul == 'posisi')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $PosisiID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Posisi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Posisi</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="PosisiID" name="Posisi" value="<?php echo $Posisi;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'derajat') || ($modul == 'ubah_setting-analisa' && $submodul == 'derajat')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $DerajatID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Derajat -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Derajat</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="DerajatID" name="Derajat" value="<?php echo $Derajat;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	if (($modul == 'tambah_setting-analisa' && $submodul == 'aturan') || ($modul == 'ubah_setting-analisa' && $submodul == 'aturan')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $AturanID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Aturan -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Aturan</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input type="text" class="form-control" id="AturanID" name="Aturan" value="<?php echo $Aturan;?>" required>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Deskripsi</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="10"><?php echo $Deskripsi;?></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	}
	
	// Aturan Join
	if (($modul == 'tambah_setting-analisa' && $submodul == 'aturanjoin') || ($modul == 'ubah_setting-analisa' && $submodul == 'aturanjoin')) {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
					</div>
					<div class="input-group">
						<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $AturanJoinID;?>">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- NamaAturan -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Nama Aturan</label>
				<div class="col-sm-9">
					<div class="input-group">
						<input class="form-control" id="NamaAturanID" name="NamaAturan" value="<?php echo $NamaAturan;?>" required>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Rangkaian -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Rangkaian</label>
				<div class="col-sm-9">
					<div class="input-group">
						<?php
							$no = 1;
							$qrangkaian = mysqli_query($koneksi,"SELECT * FROM wave_rangkaian");
							while ($drangkaian = mysqli_fetch_array($qrangkaian,MYSQLI_ASSOC)) {
								$RangkaianID	=	$drangkaian['RangkaianID'];
								$Rangkaian		=	$drangkaian['Rangkaian'];
								
								
							?>
							<label class="custom-control custom-checkbox form-check-inline">
								<input type="checkbox" class="custom-control-input" id="RangkaianID[<?php echo $RangkaianID;?>]" name="RangkaianID[]" value="<?php echo $RangkaianID;?>" <?php if (in_array($RangkaianID,$DlRangkaian)) { echo 'checked'; };?>>
								<span class="custom-control-label"><?php echo $Rangkaian;?></span>
							</label>
							<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Struktur -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Struktur</label>
				<div class="col-sm-9">
					<div class="input-group">
						<?php
							$no = 1;
							$qstruktur = mysqli_query($koneksi,"SELECT * FROM wave_struktur");
							while ($dstruktur = mysqli_fetch_array($qstruktur,MYSQLI_ASSOC)) {
								$StrukturID		=	$dstruktur['StrukturID'];
								$Struktur		=	$dstruktur['Struktur'];
							?>
							<label class="custom-control custom-checkbox form-check-inline">
								<input type="checkbox" class="custom-control-input" id="StrukturID[<?php echo $StrukturID;?>]" name="StrukturID[]" value="<?php echo $StrukturID;?>" <?php if (in_array($StrukturID,$DlStruktur)) { echo 'checked'; };?>>
								<span class="custom-control-label"><?php echo $Struktur;?></span>
							</label>
							<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Tipe -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left align-middle">Tipe</label>
				<div class="col-sm-9">
					<div class="input-group">
						<?php
							$no = 1;
							$qtipe = mysqli_query($koneksi,"SELECT * FROM wave_tipe ORDER BY Urutan ASC");
							while ($dtipe = mysqli_fetch_array($qtipe,MYSQLI_ASSOC)) {
								$TipeID		=	$dtipe['TipeID'];
								$Tipe		=	$dtipe['Tipe'];
							?>
							<label class="custom-control custom-checkbox form-check-inline">
								<input type="checkbox" class="custom-control-input" id="TipeID[<?php echo $TipeID;?>]" name="TipeID[]" value="<?php echo $TipeID;?>" <?php if (in_array($TipeID,$DlTipe)) { echo 'checked'; };?>>
								<span class="custom-control-label"><?php echo $Tipe;?></span>
							</label>
							<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Pola -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left align-middle">Pola</label>
				<div class="col-sm-9">
					<div class="input-group">
						<?php
							$no = 1;
							$qpola = mysqli_query($koneksi,"SELECT * FROM wave_pola");
							while ($dpola = mysqli_fetch_array($qpola,MYSQLI_ASSOC)) {
								$PolaID		=	$dpola['PolaID'];
								$Pola		=	$dpola['Pola'];
							?>
							<label class="custom-control custom-checkbox form-check-inline">
								<input type="checkbox" class="custom-control-input" id="PolaID[<?php echo $PolaID;?>]" name="PolaID[]" value="<?php echo $PolaID;?>" <?php if (in_array($PolaID,$DlPola)) { echo 'checked'; };?>>
								<span class="custom-control-label"><?php echo $Pola;?></span>
							</label>
							<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Posisi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left align-middle">Posisi</label>
				<div class="col-sm-9">
					<div class="input-group">
						<?php
							$no = 1;
							$qposisi = mysqli_query($koneksi,"SELECT * FROM wave_posisi");
							while ($dposisi = mysqli_fetch_array($qposisi,MYSQLI_ASSOC)) {
								$PosisiID		=	$dposisi['PosisiID'];
								$Posisi		=	$dposisi['Posisi'];
							?>
							<label class="custom-control custom-checkbox form-check-inline">
								<input type="checkbox" class="custom-control-input" id="PosisiID[<?php echo $PosisiID;?>]" name="PosisiID[]" value="<?php echo $PosisiID;?>" <?php if (in_array($PosisiID,$DlPosisi)) { echo 'checked'; };?>>
								<span class="custom-control-label"><?php echo $Posisi;?></span>
							</label>
							<?php 
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Aturan -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left align-middle">Aturan</label>
				<div class="col-sm-9">
					<div class="input-group">
					<select id="AturanID" name="AturanID[]" class="form-control" multiple="multiple" style="height:500px;">
						<?php
							$no = 1;
							$qposisi = mysqli_query($koneksi,"SELECT * FROM wave_aturan");
							while ($dposisi = mysqli_fetch_array($qposisi,MYSQLI_ASSOC)) {
								$AturanID		=	$dposisi['AturanID'];
								$Aturan		=	$dposisi['Aturan'];
							?>
							<option value="<?php echo $AturanID;?>" <?php if (in_array($AturanID,$DlAturan)) { echo 'selected'; };?>><?php echo $Aturan;?></option>
							<?php 
							}
						?>
					</select>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"> <!-- Deskripsi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-3 text-sm-left">Catatan</label>
				<div class="col-sm-9">
					<textarea class="form-control" id="DeskripsiID" name="Deskripsi" rows="5"></textarea>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} 
	// EOF Aturan Join	
	
	if ($modul == 'hapus_setting-analisa' && $submodul == 'rangkaian') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- Data -->
			<div class="form-group row">
				<div class="col-sm-9">
					<div class="input-group">
						<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $RangkaianID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Rangkaian -->
				Hapus Rangkaian dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'struktur') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $StrukturID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Struktur -->
				Hapus Struktur dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'tipe') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $TipeID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Tipe -->
				Hapus Tipe dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'pola') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $PolaID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Pola -->
				Hapus Pola dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'posisi') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $PosisiID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Posisi -->
				Hapus Posisi dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'derajat') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $DerajatID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Derajat -->
				Hapus Derajat dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
		if ($modul == 'hapus_setting-analisa' && $submodul == 'aturan') {
		?>
		<div class="row">
			<div class="col-md-12"> <!-- Data -->
				<div class="form-group row">
					<div class="col-sm-9">
						<div class="input-group">
							<input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
						</div>
						<div class="input-group">
							<input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $AturanID;?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center"> <!-- Aturan -->
				Hapus Aturan dengan ID : <?php echo $id;?> ?
			</div>
		</div>
		<?php
			
		}
	?>
	---
	<?php // form submit
		if ($modul == 'tambah_setting-analisa') {
		?>
		<button type="button" id="batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
		<button type="submit" id="submit" class="btn btn-primary">Simpan</button>
	</form>
	<?php 
	}
	if ($modul == 'ubah_setting-analisa') {
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php
}
if ($modul == 'lihat_setting-analisa') {
}
if ($modul == 'hapus_setting-analisa') {
?>
<button type="submit" class="btn btn-danger">Ya. Hapus!</button>
</form>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function() {
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
				var modul = $('#modul').val();
				var submodul = $('#submodul').val();
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../page/setting-analisa/setting-analisa.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses_ubah_data') {
							location.href = "/index.php?page=setting-analisa"
						} else {
						$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
