<?php
	
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	//pre
	if ($modul == 'tambah_setting-akun' && $submodul == 'infoakun') {
		$AkunID		=	'';
		$BrokerID	=	'';
		$NoAkun		=	'';
		$Leverage	=	'';
	}
	if (($modul == 'ubah_setting-akun' && $submodul == 'infoakun') || ($modul == 'hapus_setting-akun' && $submodul == 'infoakun')) {
		$infoAkun = new settingAkun();
		foreach ($infoAkun->infoAkun('read','akunid','brokerid','noakun', 'leverage',$UserID) as $row) {
			$AkunID		=	$row['AkunID'];
			$BrokerID	=	$row['BrokerID'];
			$NoAkun		=	$row['NoAkun'];
			$Leverage	=	$row['Leverage'];
		}
	}
	if ($modul == 'tambah_setting-akun' && $submodul == 'transaksi') {
		$AkunID			= $id;
		$TransaksiID	= '';
		$NominalID		= '';
		$TglTransaksi	= '';
	}
	if (($modul == 'ubah_setting-akun' && $submodul == 'transaksi') || ($modul == 'hapus_setting-akun' && $submodul == 'transaksi')) {
		$infoTransaksi = new settingAkun();
		foreach ($infoTransaksi->infoTransaksi('read','', '', '', '', '', $UserID) as $row) {
		$AkunID			= $row['AkunID'];
		$TransaksiID	= $row['TransaksiID'];
		$NominalID		= $row['Nominal'];
		$TglTransaksi	= $row['TglTransaksi'];
		}
	}
	// form body
	if (($modul == 'tambah_setting-akun' && $submodul == 'infoakun') || ($modul == 'ubah_setting-akun' && $submodul == 'infoakun')) {
	?>
	<div class="row"> <!-- hidden -->
		<div class="col-md-12"> <!-- Data -->
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
	<div class="row"> <!-- show -->
		<div class="col-md-12"> <!-- Broker -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Broker</label>
				<div class="col-sm-8">
					<select id="BrokerID" name="Broker" class="form-control" required >
						<option value=""></option>
						<?php
							$listBroker = new Broker();
							foreach ($listBroker->listBroker() as $row) {
								$OptValBrokerID 	= $row['BrokerID'];
								$OptNameBroker 		= $row['Broker'];
							?>
							<option value="<?php echo $OptValBrokerID;?>" <?php if ($BrokerID == $OptValBrokerID) { echo "selected='selected'";} ?>><?php echo $OptNameBroker;?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- No Akun -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">No Akun</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="NoAkunID" name="NoAkun" value="<?php echo $NoAkun;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Leverage -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Leverage</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="LeverageID" name="Leverage" value="<?php echo $Leverage;?>" placeholder="Misalnya: 1:100, 1:200"required>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} 	
	
	if (($modul == 'tambah_setting-akun' && $submodul == 'transaksi') || ($modul == 'ubah_setting-akun' && $submodul == 'transaksi')) {
	?>
	<div class="row"> <!-- hidden -->
		<div class="col-md-12"> <!-- Data -->
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
	<div class="row"> <!-- show -->
		<div class="col-md-12"> <!-- Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Tipe Transaksi</label>
				<div class="col-sm-8">
					<select id="TransaksiID" name="Transaksi" class="form-control" required >
						<option value=""></option>
						<?php
							$tipeTransaksi = new Transaksi();
							foreach ($tipeTransaksi->tipeTransaksi() as $row) {
								$OptValTransaksiID 	= $row['TransaksiID'];
								$OptNameTransaksi 	= $row['Transaksi'];
							?>
							<option value="<?php echo $OptValTransaksiID;?>" <?php if ($TransaksiID == $OptValTransaksiID) { echo "selected='selected'";} ?>><?php echo $OptNameTransaksi;?></option>
							<?php
							}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- No Akun -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Nominal</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="NominalID" name="Nominal" value="<?php echo $NominalID;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Tanggal Transaksi -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Tanggal Transaksi</label>
				<div class="col-sm-8">
					<div class="input-group date" id="TglTransaksiID" data-target-input="nearest">
						<input type="text" id="TglTransaksi" name="TglTransaksi" class="form-control datetimepicker-input" data-target="#TglTransaksiID" value="<?php echo $TglTransaksi;?>" required>
						<div class="input-group-append" data-target="#TglTransaksiID" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} 
	
	if ($modul == 'hapus_setting-akun' && $submodul == 'infoakun') {
	?>
	<div class="row"> <!-- hidden -->
		<div class="col-md-12"> <!-- Data -->
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
	<div class="row"><!-- show -->
		<div class="col-md-12 text-center"> <!-- Rangkaian -->
			Hapus Akun dengan ID : <?php echo $id;?> ?
			Proses ini akan menghapus seluruh data penambahan dan penarikan dana
		</div>
	</div>
	<?php
		
	}
	if ($modul == 'hapus_setting-akun' && $submodul == 'transaksi') {
	?>
	<div class="row"> <!-- hidden -->
		<div class="col-md-12"> <!-- Data -->
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
	<div class="row">
		<div class="col-md-12 text-center"> <!-- Tipe -->
			Hapus Data Transaksi dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php	
	}
?>
---
<?php // form submit
	if ($modul == 'tambah_setting-akun') {
	?>
	<button type="button" id="batal" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" id="submit" class="btn btn-primary">Simpan</button>
</form>
<?php 
}
if ($modul == 'ubah_setting-akun') {
?>
<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
<?php
}
if ($modul == 'lihat_setting-akun') {
}
if ($modul == 'hapus_setting-akun') {
?>
<button type="submit" class="btn btn-danger">Ya. Hapus!</button>
</form>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('#TglTransaksiID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#TglTransaksi').val(),
			sideBySide: true
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
				var modul = $('#modul').val();
				var submodul = $('#submodul').val();
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../modules/setting-akun/setting-akun.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='Akun Sudah Ada') {
							alert('Saat ini hanya mendukung 1 akun trading / user');
						}
						if (hasil=='sukses') {
							location.href = "/index.php?page=setting-akun"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
