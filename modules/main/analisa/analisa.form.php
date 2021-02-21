<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	// Mulai SET Variable
	if ($modul == 'tambah_analisa') {
		$BuatNo = new No();
		if ($submodul == 'simple') {
			$NoAnalisa = $BuatNo->NoAnalisa('simple',$id, $UserID);
		} else if ($submodul == 'snd') {
			$NoAnalisa = $BuatNo->NoAnalisa('snd',$id, $UserID);
		} else if ($submodul == 'snr') {
			$NoAnalisa = $BuatNo->NoAnalisa('snr',$id, $UserID);
		} else if ($submodul == 'elliott') {
			$NoAnalisa = $BuatNo->NoAnalisa('elliott',$id, $UserID);
		}
			$SymbolID 		= '';
			$JangkaWaktuID 	= '';
			$ArahID 		= '';
        if ($submodul == 'simple') {
            $AnalisaSimple  = '';
        } else if ($submodul == 'snd') {
            $AreaSupply     = '';
            $TglAreaSupply  = '';
            $TestAreaSupply = '';
            $AreaDemand     = '';
            $TglAreaDemand  = '';
            $TestAreaDemand = '';
        } else if ($submodul == 'snr') {
            $AreaResisten    = '';
            $TglAreaResisten = '';
            $TestAreaResisten= '';
            $AreaSupport     = '';
            $TglAreaSupport  = '';
            $TestAreaSupport = '';
        } else if ($submodul == 'elliott') {
            $RangkaianID       = '';
            $Rangkaian         = '';
            $StrukturID        = '';
            $Struktur          = '';
            $TipeID            = '';
            $Tipe              = '';
            $PolaID            = '';
            $Pola              = '';
            $PosisiID          = '';
            $Posisi            = '';
            $DerajatID         = '';
            $Derajat           = '';
            $KondisiAturan     = '';
            $Nilai             = '';
        } 
		
            $CatatanSebelum    = '';
            $CatatanSesudah    = '';
            $CaptureSebelum    = '';
            $CaptureSesudah    = '';
            $StatusID          = '1';
	}
	else if ($modul == 'ubah_analisa' || $modul == 'lihat_analisa') {
        $analisa_data = new analisa_data();
        if ($submodul == 'simple') {
            foreach ($analisa_data->analisa_simple($id, $UserID) as $row) {
                $NoAnalisa          = $row['AnalisaID'];
                $Pasar 		        = $row['Pasar'];
                $SymbolID 		    = $row['SymbolID'];
                $Symbol 		    = $row['Symbol'];
                $JangkaWaktuID 	    = $row['JangkaWaktuID'];
                $JangkaWaktu 	    = $row['JangkaWaktu'];
                $ArahID 		    = $row['ArahID'];
                $Arah		        = $row['Arah'];
                $AnalisaSimple      = $row['AnalisaSimple'];
                $CatatanSebelum     = $row['CatatanSebelum'];
                $CatatanSesudah     = $row['CatatanSesudah'];
                $CaptureSebelum     = $row['CaptureSebelum'];
                $CaptureSesudah     = $row['CaptureSesudah'];
                $TglBuat            = $row['TglBuat'];
                $StatusID           = $row['StatusID'];
                $Status             = $row['Status'];
            }
        } else if ($submodul == 'snd') {
            foreach ($analisa_data->analisa_snd($id, $UserID) as $row) {
                $NoAnalisa          = $row['AnalisaID'];
                $Pasar 		        = $row['Pasar'];
                $SymbolID 		    = $row['SymbolID'];
                $Symbol 		    = $row['Symbol'];
                $JangkaWaktuID 	    = $row['JangkaWaktuID'];
                $JangkaWaktu 	    = $row['JangkaWaktu'];
                $ArahID 		    = $row['ArahID'];
                $Arah		        = $row['Arah'];
                $AreaSupply         = $row['AreaSupply'];
                $TglAreaSupply      = $row['TglAreaSupply'];
                $TestAreaSupply     = $row['TestAreaSupply'];
                $AreaDemand         = $row['AreaDemand'];
                $TglAreaDemand      = $row['TglAreaDemand'];
                $TestAreaDemand     = $row['TestAreaDemand'];
                $CatatanSebelum     = $row['CatatanSebelum'];
                $CatatanSesudah     = $row['CatatanSesudah'];
                $CaptureSebelum     = $row['CaptureSebelum'];
                $CaptureSesudah     = $row['CaptureSesudah'];
                $TglBuat            = $row['TglBuat'];
                $StatusID           = $row['StatusID'];
                $Status             = $row['Status'];
            }
        } else if ($submodul == 'snr') {
            foreach ($analisa_data->analisa_snr($id, $UserID) as $row) {
                $NoAnalisa          = $row['AnalisaID'];
                $Pasar 		        = $row['Pasar'];
                $SymbolID 		    = $row['SymbolID'];
                $Symbol 		    = $row['Symbol'];
                $JangkaWaktuID 	    = $row['JangkaWaktuID'];
                $JangkaWaktu 	    = $row['JangkaWaktu'];
                $ArahID 		    = $row['ArahID'];
                $Arah		        = $row['Arah'];
                $AreaResisten       = $row['AreaResisten'];
                $TglAreaResisten    = $row['TglAreaResisten'];
                $TestAreaResisten   = $row['TestAreaResisten'];
                $AreaSupport        = $row['AreaSupport'];
                $TglAreaSupport      = $row['TglAreaSupport'];
                $TestAreaSupport     = $row['TestAreaSupport'];
                $CatatanSebelum     = $row['CatatanSebelum'];
                $CatatanSesudah     = $row['CatatanSesudah'];
                $CaptureSebelum     = $row['CaptureSebelum'];
                $CaptureSesudah     = $row['CaptureSesudah'];
                $TglBuat            = $row['TglBuat'];
                $StatusID           = $row['StatusID'];
                $Status             = $row['Status'];
            }
        } else if ($submodul == 'elliott'){
            foreach ($analisa_data->analisa_elliott($id, $UserID) as $row) {
                $NoAnalisa          = $row['AnalisaID'];
                $Pasar 		        = $row['Pasar'];
                $SymbolID 		    = $row['SymbolID'];
                $Symbol 		    = $row['Symbol'];
                $JangkaWaktuID 	    = $row['JangkaWaktuID'];
                $JangkaWaktu 	    = $row['JangkaWaktu'];
                $ArahID 		    = $row['ArahID'];
                $Arah		        = $row['Arah'];
                $RangkaianID        = $row['RangkaianID'];
                $Rangkaian          = $row['Rangkaian'];
                $StrukturID         = $row['StrukturID'];
                $Struktur           = $row['Struktur'];
                $TipeID             = $row['TipeID'];
                $Tipe               = $row['Tipe'];
                $PolaID             = $row['PolaID'];
                $Pola               = $row['Pola'];
                $PosisiID           = $row['PosisiID'];
                $Posisi             = $row['Posisi'];
                $DerajatID          = $row['DerajatID'];
                $Derajat            = $row['Derajat'];
                $KondisiAturan      = json_decode($row['Aturan']);
                $Nilai              = $row['Nilai'];
                $CatatanSebelum     = $row['CatatanSebelum'];
                $CatatanSesudah     = $row['CatatanSesudah'];
                $CaptureSebelum     = $row['CaptureSebelum'];
                $CaptureSesudah     = $row['CaptureSesudah'];
                $TglBuat            = $row['TglBuat'];
                $StatusID           = $row['StatusID'];
                $Status             = $row['Status'];
            }
        }
    }
	?>
<div class="row">
    <!-- Analisa Form Hidden Value -->
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
    if ($modul == 'tambah_analisa' || $modul == 'ubah_analisa') {
?>
<div class="row">
    <!-- Analisa Form Standar Value -->
    <div class="col-md-6">
        <!-- No. Analisa -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">No. Analisa</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="AnalisaID" name="AnalisaID"
                        value="<?php echo $NoAnalisa;?>" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- SymbolID -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Symbol</label>
            <div class="col-sm-8">
                <select id="SymbolID" name="Symbol" class="form-control select2" data-toggle="select2" required>
                    <option value=""></option>
                    <?php
						$ObjPasar  = new pasar();
						foreach ($ObjPasar->data() as $row){
						?>
                    <optgroup label="<?php echo $row['Pasar'];?>">
                        <?php
							$ObjSymbol  = new symbol();
							foreach ($ObjSymbol->data($row['PasarID']) as $row) {
							?>
                        <option value="<?php echo $row['SymbolID'];?>" <?php if ($SymbolID == $row['SymbolID']) { echo 'selected="selected"';} ?>><?php echo $row['Symbol'];?></option>
                        <?php
							}
							?>
                    </optgroup>
                    <?php
						}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Jangka Waktu -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Jangka Waktu</label>
            <div class="col-sm-8">
                <select id="JangkaWaktuID" name="JangkaWaktu" class="form-control" required>
                    <option value=""></option>
                    <?php
						$ObjJangkaWaktu = new jangkawaktu();
						foreach ($ObjJangkaWaktu->data() as $row) {
					?>
                    <option value="<?php echo $row['JangkaWaktuID'];?>"
                        <?php if ($JangkaWaktuID == $row['JangkaWaktuID']) { echo 'selected="selected"';} ?>>
                        <?php echo $row['JangkaWaktu'];?>
                    </option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Arah -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Arah Dominan</label>
            <div class="col-sm-8">
                <select id="ArahID" name="Arah" class="form-control" required>
                    <option value=""></option>
                    <?php
						$ObjArah = new arah();
						foreach ($ObjArah->data() as $row) {
					?>
                    <option value="<?php echo $row['ArahID'];?>"
                        <?php if ($ArahID == $row['ArahID']) { echo "selected='selected'";} ?>>
                        <?php echo $row['Arah'];?>
                    </option>
                    <?php 
						}
						?>
                </select>
            </div>
        </div>
    </div>
</div>

<?php
 }
	if (($modul == 'tambah_analisa' || $modul == 'ubah_analisa') && $submodul == 'simple') {
        ?>
<div class="row">
    <!-- Detail Simple -->
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-form-label col-sm-2 text-sm-left">Point Analisa</label>
            <div class="col-sm-10">
                <textarea id="AnalisaSimpleID" name="AnalisaSimple" class="form-control"><?php echo $AnalisaSimple;?></textarea>
            </div>
        </div>
    </div>
</div>
<?php
	}
	if (($modul == 'tambah_analisa' || $modul == 'ubah_analisa') && $submodul == 'snd') {
    ?>
<div class="row">
    <!-- Detail SnD -->
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Supply Area</label>
            <div class="col-sm-7">
                <input type="text" class="form-control text-center" id="AreaSupplyID" name="AreaSupply" value="<?php echo $AreaSupply;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Terbentuk</label>
            <div class="col-sm-7">
                <div class="input-group date" id="TglAreaSupplyID" data-target-input="nearest">
                    <input type="text" id="TglAreaSupply" name="TglAreaSupply" class="form-control datetimepicker-input" data-target="#TglAreaSupplyID" value="<?php echo $TglAreaSupply;?>">
                    <div class="input-group-append" data-target="#TglAreaSupplyID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Price Test</label>
            <div class="col-sm-7">
                <div class="input-group">
                    <input type="text" class="form-control text-center" id="TestAreaSupplyID" name="TestAreaSupply" value="<?php echo $TestAreaSupply;?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">Kali</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Demand Area</label>
            <div class="col-sm-7">
                <input type="text" class="form-control text-center" id="AreaDemandID" name="AreaDemand" value="<?php echo $AreaDemand;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Terbentuk</label>
            <div class="col-sm-7">
                <div class="input-group date" id="TglAreaDemandID" data-target-input="nearest">
                    <input type="text" id="TglAreaDemand" name="TglAreaDemand" class="form-control datetimepicker-input" data-target="#TglAreaDemandID" value="<?php echo $TglAreaDemand;?>">
                    <div class="input-group-append" data-target="#TglAreaDemandID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Price Test</label>
            <div class="col-sm-7">
                <div class="input-group"> 
                    <input type="text" class="form-control text-center" id="TestAreaDemandID" name="TestAreaDemand" value="<?php echo $TestAreaDemand;?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">Kali</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
	if (($modul == 'tambah_analisa' || $modul == 'ubah_analisa') && $submodul == 'snr') {
?>
<div class="row">
    <!-- Detail SnD -->
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Resisten Area</label>
            <div class="col-sm-7">
                <input type="text" class="form-control text-center" id="AreaResistenID" name="AreaResisten" value="<?php echo $AreaResisten;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Terbentuk</label>
            <div class="col-sm-7">
                <div class="input-group date" id="TglAreaResistenID" data-target-input="nearest">
                    <input type="text" id="TglAreaResisten" name="TglAreaResisten" class="form-control datetimepicker-input" data-target="#TglAreaResistenID" value="<?php echo $TglAreaResisten;?>">
                    <div class="input-group-append" data-target="#TglAreaResistenID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Price Test</label>
            <div class="col-sm-7">
                <div class="input-group"> 
                    <input type="text" class="form-control text-center" id="TesAreaResistenID" name="TestAreaResisten" value="<?php echo $TestAreaResisten;?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">Kali</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Support Area</label>
            <div class="col-sm-7">
                <input type="text" class="form-control text-center" id="AreaSupportID" name="AreaSupport" value="<?php echo $AreaSupport;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Terbentuk</label>
            <div class="col-sm-7">
                <div class="input-group date" id="TglAreaSupportID" data-target-input="nearest">
                    <input type="text" id="TglAreaSupport" name="TglAreaSupport" class="form-control datetimepicker-input" data-target="#TglAreaSupportID" value="<?php echo $TglAreaSupport;?>">
                    <div class="input-group-append" data-target="#TglAreaSupportID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-5 text-sm-left">Price Test</label>
            <div class="col-sm-7">
                <div class="input-group"> 
                    <input type="text" class="form-control text-center" id="TestAreaSupportID" name="TestAreaSupport" value="<?php echo $TestAreaSupport;?>" required>
                    <div class="input-group-append">
                        <div class="input-group-text">Kali</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
	}
	if (($modul == 'tambah_analisa' || $modul == 'ubah_analisa') && $submodul == 'elliott') {
	?>
<div class="row">
    <div class="col-md-6">
        <!-- Rangkaian -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Rangkaian</label>
            <div class="col-sm-8">
                <select id="RangkaianID" name="Rangkaian" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjRangkaian = new ewp();
                        foreach ($ObjRangkaian->rangkaian() as $row){
							?>
                    <option value="<?php echo $row['RangkaianID'];?>"
                        <?php if ($row['RangkaianID'] == $RangkaianID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Rangkaian'];?></option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Struktur -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Struktur</label>
            <div class="col-sm-8">
                <select id="StrukturID" name="Struktur" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjStruktur = new ewp();
                        foreach ($ObjStruktur->struktur() as $row){
							?>
                    <option value="<?php echo $row['StrukturID'];?>"
                        <?php if ($row['StrukturID'] == $StrukturID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Struktur'];?></option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Tipe -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Tipe</label>
            <div class="col-sm-8">
                <select id="TipeID" name="Tipe" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjTipe = new ewp();
                        foreach ($ObjTipe->tipe() as $row){
							?>
                    <option value="<?php echo $row['TipeID'];?>"
                        <?php if ($row['TipeID'] == $TipeID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Tipe'];?></option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Pola -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Pola</label>
            <div class="col-sm-8">
                <select id="PolaID" name="Pola" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjPola = new ewp();
                        foreach ($ObjPola->pola() as $row){
							?>
                    <option value="<?php echo $row['PolaID'];?>"
                        <?php if ($row['PolaID'] == $PolaID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Pola'];?></option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Posisi -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Posisi</label>
            <div class="col-sm-8">
                <select id="PosisiID" name="Posisi" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjPosisi = new ewp();
                        foreach ($ObjPosisi->posisi() as $row){
							?>
                    <option value="<?php echo $row['PosisiID'];?>"
                        <?php if ($row['PosisiID'] == $PosisiID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Posisi'];?></option>
                    <?php 
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Derajat -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Derajat</label>
            <div class="col-sm-8">
                <select id="DerajatID" name="Derajat" class="form-control" required>
                    <option value=""></option>
                    <?php
                        $ObjDerajat = new ewp();
                        foreach ($ObjDerajat->derajat() as $row){
							?>
                    <option value="<?php echo $row['DerajatID'];?>"
                        <?php if ($row['DerajatID'] == $DerajatID) { echo "selected='selected'";} ?>>
                        <?php echo $row['Derajat'];?></option>
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
			foreach ($KondisiAturan as $AturanID => $Opsi) {
			?>
        <div id="AturanShowKiri['<?php echo $AturanID;?>']" class="form-group row">
            <label class="col-form-label col-sm-9 text-sm-left">
                <?php 
                    $ObjAturan = new ewp();
                    foreach ($ObjAturan->aturan($AturanID) as $row) {}
                    if ($row['AturanKategoriID'] == '1') {
                        echo '<strong>'.$row['Aturan'].'</strong>';
                        } else {
                        echo $row['Aturan'];
                    }
                ?>
            </label>
            <div id="AturanShowKanan[<?php echo $AturanID?>]" class="col-sm-3">
                <select id="KondisiAturanID[<?php echo $AturanID;?>]" name="KondisiAturan[<?php echo $AturanID;?>]"
                    class="form-control" required>
                    <option value=""></option>
                    <option value="Sesuai" <?php if ($Opsi == 'Sesuai') {echo 'selected="selected"';}?>>Sesuai</option>
                    <option value="TidakSesuai" <?php if ($Opsi == 'TidakSesuai') {echo 'selected="selected"';}?>>Tidak
                        Sesuai</option>
                    <option value="BelumTerjadi" <?php if ($Opsi == 'BelumTerjadi') {echo 'selected="selected"';}?>>
                        Belum Terjadi</option>
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
<div class="row" id="AnalisaAttribute"
    <?php if ($modul == 'ubah_analisa') { echo 'style="display:flex"';} else { echo 'style="display:none"';}?>>
    <div class="col-md-8">
        <div class="text-sm-left">
            <p>Pembobotan:<br />
                1. Aturan Utama: 80%<br />
                2. Aturan Rasio: 10%<br />
                3. Aturan Waktu: 5%<br />
                4. Aturan Ekstensi: 5%<br /></p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group row">
            <label class="col-form-label col-sm-7 text-sm-left">Persentase Kesesuaian</label>
            <div class="input-group col-sm-5">
                <input type="text" class="form-control" id="NilaiSesuaiID" name="NilaiSesuai"
                    value="<?php if ($modul == 'ubah_analisa') { echo $Nilai;}?>" readonly>
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
    <?php	
	}
	?>
</div>
<?php 
    if ($modul == 'tambah_analisa' || $modul == 'ubah_analisa') {
?>
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
            <input class="form-check-input" type="radio" id="Status" name="Status" value="1"
                <?php if ($StatusID == '1') { echo 'checked="checked"';}?>>
            <span class="form-check-label">
                Terbuka
            </span>
        </label>
        <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="Status" name="Status" value="2"
                <?php if ($StatusID == '2') { echo 'checked="checked"';}?>>
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
    <div class="col-md-12 text-center">
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
                    <strong><?php echo $TglBuat;?></strong>
                </div>
            </div>

            <hr class="my-1">
            <?php 
            if ($submodul == 'simple') {
            ?>
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
                        <td>Arah Dominan</td>
                        <td class="text-right"><?php echo $Arah;?></td>
                    </tr>
                    <tr>
                        <td>Point Analisa</td>
                        <td class="text-left"><?php echo $AnalisaSimple;?></td>
                    </tr>
                </tbody>
            </table>   
            <?php
            } 
            if ($submodul == 'snd') {
            ?>
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
                        <td>Arah Dominan</td>
                        <td class="text-right"><?php echo $Arah;?></td>
                    </tr>
                    <tr>
                        <td>Area Supply</td>
                        <td class="text-right"><?php echo $AreaSupply;?></td>
                    </tr>
                    <tr>
                        <td>Waktu Terbentuk</td>
                        <td class="text-right"><?php echo $TglAreaSupply;?></td>
                    </tr>
                    <tr>
                        <td>Teruji</td>
                        <td class="text-right"><?php echo $TestAreaSupply;?></td>
                    </tr>
                    <tr>
                        <td>Area Demand</td>
                        <td class="text-right"><?php echo $AreaDemand;?></td>
                    </tr>
                    <tr>
                        <td>Waktu Terbentuk</td>
                        <td class="text-right"><?php echo $TglAreaDemand;?></td>
                    </tr>
                    <tr>
                        <td>Teruji</td>
                        <td class="text-right"><?php echo $TestAreaDemand;?></td>
                    </tr>
                </tbody>
            </table>   
            <?php
            } 
            if ($submodul == 'snr') {
            ?>
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
                        <td>Arah Dominan</td>
                        <td class="text-right"><?php echo $Arah;?></td>
                    </tr>
                    <tr>
                        <td>Area Resisten</td>
                        <td class="text-right"><?php echo $AreaResisten;?></td>
                    </tr>
                    <tr>
                        <td>Waktu Terbentuk</td>
                        <td class="text-right"><?php echo $TglAreaResisten;?></td>
                    </tr>
                    <tr>
                        <td>Teruji</td>
                        <td class="text-right"><?php echo $TestAreaResisten;?></td>
                    </tr>
                    <tr>
                        <td>Area Support</td>
                        <td class="text-right"><?php echo $AreaSupport;?></td>
                    </tr>
                    <tr>
                        <td>Waktu Terbentuk</td>
                        <td class="text-right"><?php echo $TglAreaSupport;?></td>
                    </tr>
                    <tr>
                        <td>Teruji</td>
                        <td class="text-right"><?php echo $TestAreaSupport;?></td>
                    </tr>
                </tbody>
            </table>   
            <?php
            } 
            if ($submodul == 'elliott') { 
            ?>
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
                        <td>Arah Dominan</td>
                        <td class="text-right"><?php echo $Arah;?></td>
                    </tr>
                    <tr>
                        <td>Rangkaian</td>
                        <td class="text-right"><?php echo $Rangkaian;?></td>
                    </tr>
                    <tr>
                        <td>Struktur</td>
                        <td class="text-right"><?php echo $Struktur;?></td>
                    </tr>
                    <tr>
                        <td>Tipe</td>
                        <td class="text-right"><?php echo $Tipe;?></td>
                    </tr>
                    <tr>
                        <td>Pola</td>
                        <td class="text-right"><?php echo $Pola;?></td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td class="text-right"><?php echo $Posisi;?></td>
                    </tr>
                    <tr>
                        <td>Derajat</td>
                        <td class="text-right"><?php echo $Derajat;?></td>
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
							foreach ($KondisiAturan as $AturanID => $Opsi) {
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
                            <?php echo $Nilai;?>%
                        </td>
                    </tr>
                </tbody>
            </table>
            <?php
            }
            ?>
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
        <div class="col-md-12 mt-3">
            <div class="text-center">
                <strong>Gambar Sebelum</strong>
            </div>
            <div class="py-2 py-md-3">
                <a href="<?php echo $CaptureSebelum;?>" target="_blank"><img src="<?php echo $CaptureSebelum;?>"
                        style="height: 100%; width: 100%"></a>
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
        <div class="col-md-12 mt-3">
            <div class="text-center">
                <strong>Gambar Sesudah</strong>
            </div>
            <div class="py-2 py-md-3">
                <a href="<?php echo $CaptureSesudah;?>" target="_blank"><img src="<?php echo $CaptureSesudah;?>"
                        style="height: 100%; width: 100%"></a>
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

    $('#AnalisaSimpleID').summernote({
        placeholder: '',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
    });

    $('#TglAreaSupplyID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#TglAreaSupply').val(),
			sideBySide: true
	});

    $('#TglAreaDemandID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#TglAreaDemand').val(),
			sideBySide: true
	});

    $('#TglAreaResistenID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#TglAreaResisten').val(),
			sideBySide: true
	});

    $('#TglAreaSupportID').datetimepicker({
			format: 'YYYY-MM-DD HH:mm',
            defaultDate: $('#TglAreaSupport').val(),
			sideBySide: true
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

    KondisiUtama = [];
    KondisiRasio = [];
    KondisiWaktu = [];
    KondisiEkstensi = [];

    $('#JangkaWaktuID').change(function() {
        var SymbolID = $("#SymbolID").val();
        if (SymbolID == '') {
            $('#JangkaWaktuID').val('');
            $('#SymbolID').focus();
        } else {
            $('#ArahID').trigger('contentchanged');
        }
    });

    $('#ArahID').change(function() {
        var JangkaWaktuID = $("#JangkaWaktuID").val();
        if (JangkaWaktuID == '') {
            $('#ArahID').val('');
            $('#JangkaWaktuID').focus();
        } else {
            $('#RangkaianID').trigger('contentchanged');
        }
    });

    $('#RangkaianID').change(function() {
        var ArahID = $("#ArahID").val();
        if (ArahID == '') {
            $('#RangkaianID').val('');
            $('#ArahID').focus();
        } else {
            $('#StrukturID').trigger('contentchanged');
        }
    });

    $('#StrukturID').change(function() {
        var RangkaianID = $("#RangkaianID").val();
        if (RangkaianID == '') {
            $('#StrukturID').val('');
            $('#RangkaianID').focus();
        } else {
            $('#TipeID').trigger('contentchanged');
        }
    });

    $('#TipeID').change(function() {
        var StrukturID = $("#StrukturID").val();
        if (StrukturID == '') {
            $('#TipeID').val('');
            $('#StrukturID').focus();
        } else {
            $('#PolaID').trigger('contentchanged');
        }
    });

    $('#PolaID').change(function() {
        var TipeID = $("#TipeID").val();
        if (TipeID == '') {
            $('#PolaID').val('');
            $('#TipeID').focus();
        } else {
            $('#PosisiID').trigger('contentchanged');
        }
    });

    $('#PosisiID').change(function() {
        var PolaID = $("#PolaID").val();
        if (PolaID == '') {
            $('#PosisiID').val('');
            $('#PolaID').focus();
        } else {
            $('#DerajatID').trigger('contentchanged');
            $('#KondisiEkstensiID').trigger('contentchanged');
            $('#AnalisaAttribute').show();
        }
    });

    $('#DerajatID').change(function() {
        var PosisiID = $("#PosisiID").val();
        if (PosisiID == '') {
            $('#DerajatID').val('');
            $('#PosisiID').focus();
        } else {
            $('#KondisiEkstensiID').trigger('contentchanged');
        }
    });

    $('#StrukturID').on('contentchanged', function() {
        var RangkaianID = $("#RangkaianID").val();
        var getData = 'Struktur';
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: {
                'ID': RangkaianID,
                'getData': getData
            },
            dataType: 'json',
            success: function(data) {
                var len = data.length;
                $("#StrukturID").empty();
                $("#StrukturID").append('<option value=""></option>');
                for (var i = 0; i < len; i++) {
                    var id = data[i]['StrukturID'];
                    var name = data[i]['Struktur'];
                    $("#StrukturID").append('<option value="' + id + '">' + name +
                        '</option>');
                }
            }
        })
    });

    $('#TipeID').on('contentchanged', function() {
        var StrukturID = $("#StrukturID").val();
        var getData = 'Tipe';
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: {
                'ID': StrukturID,
                'getData': getData
            },
            dataType: 'json',
            success: function(data) {
                var len = data.length;
                $("#TipeID").empty();
                $("#TipeID").append('<option value=""></option>');
                for (var i = 0; i < len; i++) {
                    var id = data[i]['TipeID'];
                    var name = data[i]['Tipe'];
                    $("#TipeID").append('<option value="' + id + '">' + name + '</option>');
                }
            }
        })
    });

    $('#PolaID').on('contentchanged', function() {
        var RangkaianID = $("#RangkaianID").val();
        var StrukturID = $("#StrukturID").val();
        var TipeID = $("#TipeID").val();
        var getData = 'Pola';
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: {
                'Rangkaian': RangkaianID,
                'Struktur': StrukturID,
                'ID': TipeID,
                'getData': getData
            },
            dataType: 'json',
            success: function(data) {
                var len = data.length;
                $("#PolaID").empty();
                $("#PolaID").append('<option value=""></option>');
                for (var i = 0; i < len; i++) {
                    var id = data[i]['PolaID'];
                    var name = data[i]['Pola'];
                    $("#PolaID").append('<option value="' + id + '">' + name + '</option>');
                }
            }
        })
    });

    $('#PosisiID').on('contentchanged', function() {
        var RangkaianID = $("#RangkaianID").val();
        var StrukturID = $("#StrukturID").val();
        var TipeID = $("#TipeID").val();
        var getData = 'Posisi';
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: {
                'Rangkaian': RangkaianID,
                'Struktur': StrukturID,
                'ID': TipeID,
                'getData': getData
            },
            dataType: 'json',
            success: function(data) {
                var len = data.length;
                $("#PosisiID").empty();
                $("#PosisiID").append('<option value=""></option>');
                for (var i = 0; i < len; i++) {
                    var id = data[i]['PosisiID'];
                    var name = data[i]['Posisi'];
                    $("#PosisiID").append('<option value="' + id + '">' + name +
                        '</option>');
                }
            }
        })
    });

    $('#DerajatID').on('contentchanged', function() {
        var RangkaianID = $("#RangkaianID").val();
        var StrukturID = $("#StrukturID").val();
        var TipeID = $("#TipeID").val();
        var getData = 'Aturan';
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: {
                'Rangkaian': RangkaianID,
                'Struktur': StrukturID,
                'ID': TipeID,
                'getData': getData
            },
            dataType: 'json',
            success: function(data) {
                var len = data.length;
                JumlahAturanUtama = 0;
                JumlahAturanRasio = 0;
                JumlahAturanWaktu = 0;
                JumlahAturanEkstensi = 0;

                $("#AturanShow").empty();

                for (var i = 0; i < len; i++) {
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
                        $('#AturanShow').append('<div id="AturanShowKiri' + id + '"></div>')
                            .find('#AturanShowKiri' + id + '').addClass('form-group row');
                        $('#AturanShowKiri' + id + '').append(
                            '<label class="col-form-label col-sm-9 text-sm-left"><b>' +
                            aturan + '</b></label>');
                        $('#AturanShowKiri' + id + '').append('<div id="AturanShowKanan' +
                                id + '"></div>').find('#AturanShowKanan' + id + '')
                            .addClass('col-sm-3');
                        $('#AturanShowKanan' + id + '').append(
                            '<select id="KondisiAturanID\[' + id +
                            '\]" name="KondisiAturan\[' + id +
                            '\]" class="form-control" required />');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value=""></option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Sesuai">Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="TidakSesuai">Tidak Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="BelumTerjadi">Belum Terjadi</option>');

                        JumlahAturanUtama += NilaiPerAturan;
                    }

                    // Group Aturan Beradasarkan Kategori Rasio
                    if (aturankategori == 2) {
                        AturanRasio = {};
                        AturanRasio[0] = aturankategori;
                        AturanRasio[1] = id;
                        KondisiRasio.push(AturanRasio);
                        JumlahAturanRasio += NilaiPerAturan;
                        $('#AturanShow').append('<div id="AturanShowKiri' + id + '"></div>')
                            .find('#AturanShowKiri' + id + '').addClass('form-group row');
                        $('#AturanShowKiri' + id + '').append(
                            '<label class="col-form-label col-sm-9 text-sm-left">' +
                            aturan + '</label>');
                        $('#AturanShowKiri' + id + '').append('<div id="AturanShowKanan' +
                                id + '"></div>').find('#AturanShowKanan' + id + '')
                            .addClass('col-sm-3');
                        $('#AturanShowKanan' + id + '').append(
                            '<select id="KondisiAturanID\[' + id +
                            '\]" name="KondisiAturan\[' + id +
                            '\]" class="form-control" required >');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value=""></option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Sesuai">Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="TidakSesuai">Tidak Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Belum">Belum</option>');

                    }

                    // Group Aturan Beradasarkan Kategori Waktu
                    if (aturankategori == 3) {
                        AturanWaktu = {};
                        AturanWaktu[0] = aturankategori;
                        AturanWaktu[1] = id;
                        KondisiWaktu.push(AturanWaktu);
                        JumlahAturanWaktu += NilaiPerAturan;
                        $('#AturanShow').append('<div id="AturanShowKiri' + id + '"></div>')
                            .find('#AturanShowKiri' + id + '').addClass('form-group row');
                        $('#AturanShowKiri' + id + '').append(
                            '<label class="col-form-label col-sm-9 text-sm-left">' +
                            aturan + '</label>');
                        $('#AturanShowKiri' + id + '').append('<div id="AturanShowKanan' +
                                id + '"></div>').find('#AturanShowKanan' + id + '')
                            .addClass('col-sm-3');
                        $('#AturanShowKanan' + id + '').append(
                            '<select id="KondisiAturanID\[' + id +
                            '\]" name="KondisiAturan\[' + id +
                            '\]" class="form-control" required >');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value=""></option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Sesuai">Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="TidakSesuai">Tidak Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Belum">Belum</option>');


                    }

                    // Group Aturan Beradasarkan Kategori Ekstensi
                    if (aturankategori == 4) {
                        AturanEkstensi = {};
                        AturanEkstensi[0] = aturankategori;
                        AturanEkstensi[1] = id;
                        KondisiEkstensi.push(AturanEkstensi);
                        JumlahAturanEkstensi += NilaiPerAturan;
                        $('#AturanShow').append('<div id="AturanShowKiri' + id + '"></div>')
                            .find('#AturanShowKiri' + id + '').addClass('form-group row');
                        $('#AturanShowKiri' + id + '').append(
                            '<label class="col-form-label col-sm-9 text-sm-left">' +
                            aturan + '</label>');
                        $('#AturanShowKiri' + id + '').append('<div id="AturanShowKanan' +
                                id + '"></div>').find('#AturanShowKanan' + id + '')
                            .addClass('col-sm-3');
                        $('#AturanShowKanan' + id + '').append(
                            '<select id="KondisiAturanID\[' + id +
                            '\]" name="KondisiAturan\[' + id +
                            '\]" class="form-control" required >');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value=""></option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Sesuai">Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="TidakSesuai">Tidak Sesuai</option>');
                        $('#KondisiAturanID\\[' + id + '\\]').append(
                            '<option value="Belum">Belum</option>');

                    }

                }

            }
        })
    });

    $('#KondisiEkstensiID').on('contentchanged', function() {
        $.each(KondisiEkstensi, function(index, value) {
            var id = value[1];
            $('#KondisiAturanID\\[' + id + '\\]').change(function() {
                var OpsiDipilih = $(this).val();
                if (OpsiDipilih != '') {
                    $.each(KondisiEkstensi, function(index, value) {
                        var nextid = value[1];
                        if (nextid != id) {
                            $('#KondisiAturanID\\[' + nextid + '\\]').attr(
                                'disabled', true);
                        }
                    });
                } else {
                    $.each(KondisiEkstensi, function(index, value) {
                        var nextid = value[1];
                        if (nextid != id) {
                            $('#KondisiAturanID\\[' + nextid + '\\]').attr(
                                'disabled', false);
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
        for (var i = 0; i < jau; i++) {
            var id = KondisiUtama[i][1];
            ODPUtama[i] = $('#KondisiAturanID\\[' + id + '\\]').val();
            if (ODPUtama[i] == 'Sesuai') {
                NSUTama[i] = 1;
            } else {
                NSUTama[i] = 0;
            }
            var DNAUtama = {}; // Data Nilai Aturan
            DNAUtama[0] = id;
            DNAUtama[1] = NSUTama[i];
            NAUtama.push(DNAUtama);
        }

        var NODUtama = []; // Nilai Opsi Dipilih
        for (var i = 0; i < jau; i++) {
            NODUtama[i] = NAUtama[i][1];
            TotalNilaiAturanUtama += NODUtama[i];
        }

        var NARasio = []; // NA Nilai Aturan
        var NSRasio = []; // NS Nilai Sesuai
        var ODPRasio = []; // Opsi Di Pilih
        var TotalNilaiAturanRasio = 0; // Total Nilai Aturan


        var jar = KondisiRasio.length; // Jumlah Aturan Rasio
        for (var i = 0; i < jar; i++) {
            var id = KondisiRasio[i][1];
            ODPRasio[i] = $('#KondisiAturanID\\[' + id + '\\]').val();
            if (ODPRasio[i] == 'Sesuai') {
                NSRasio[i] = 1;
            } else {
                NSRasio[i] = 0;
            }
            var DNARasio = {}; // Data Nilai Aturan
            DNARasio[0] = id;
            DNARasio[1] = NSRasio[i];
            NARasio.push(DNARasio);
        }

        var NODRasio = []; // Nilai Opsi Dipilih
        for (var i = 0; i < jar; i++) {
            NODRasio[i] = NARasio[i][1];
            TotalNilaiAturanRasio += NODRasio[i];
        }

        var NAWaktu = []; // NA Nilai Aturan
        var NSWaktu = []; // NS Nilai Sesuai
        var ODPWaktu = []; // Opsi Di Pilih
        var TotalNilaiAturanWaktu = 0; // Total Nilai Aturan


        var jaw = KondisiWaktu.length; // Jumlah Aturan Waktu
        for (var i = 0; i < jaw; i++) {
            var id = KondisiWaktu[i][1];
            ODPWaktu[i] = $('#KondisiAturanID\\[' + id + '\\]').val();
            if (ODPWaktu[i] == 'Sesuai') {
                NSWaktu[i] = 1;
            } else {
                NSWaktu[i] = 0;
            }
            var DNAWaktu = {}; // Data Nilai Aturan
            DNAWaktu[0] = id;
            DNAWaktu[1] = NSWaktu[i];
            NAWaktu.push(DNAWaktu);
        }

        var NODWaktu = []; // Nilai Opsi Dipilih
        for (var i = 0; i < jaw; i++) {
            NODWaktu[i] = NAWaktu[i][1];
            TotalNilaiAturanWaktu += NODWaktu[i];
        }

        var NAEkstensi = []; // NA Nilai Aturan
        var NSEkstensi = []; // NS Nilai Sesuai
        var ODPEkstensi = []; // Opsi Di Pilih
        var TotalNilaiAturanEkstensi = 0; // Total Nilai Aturan


        var jau = KondisiEkstensi.length; // Jumlah Aturan Ekstensi
        for (var i = 0; i < jau; i++) {
            var id = KondisiEkstensi[i][1];
            ODPEkstensi[i] = $('#KondisiAturanID\\[' + id + '\\]').val();
            if (ODPEkstensi[i] == 'Sesuai') {
                NSEkstensi[i] = 1;
            } else {
                NSEkstensi[i] = 0;
            }
            var DNAEkstensi = {}; // Data Nilai Aturan
            DNAEkstensi[0] = id;
            DNAEkstensi[1] = NSEkstensi[i];
            NAEkstensi.push(DNAEkstensi);
        }

        var NODEkstensi = []; // Nilai Opsi Dipilih
        for (var i = 0; i < jau; i++) {
            NODEkstensi[i] = NAEkstensi[i][1];
            TotalNilaiAturanEkstensi += NODEkstensi[i];
        }



        var HasilAturanUtama = ((TotalNilaiAturanUtama / JumlahAturanUtama) * Bobot_Aturan_Utama);
        var HasilAturanRasio = ((TotalNilaiAturanRasio / JumlahAturanRasio) * Bobot_Aturan_Rasio);
        var HasilAturanWaktu = ((TotalNilaiAturanWaktu / JumlahAturanWaktu) * Bobot_Aturan_Waktu);
        var HasilAturanEkstensi = ((TotalNilaiAturanEkstensi / 1) * Bobot_Aturan_Ekstensi);
        if (isNaN(HasilAturanUtama)) {
            var HasilAturanUtama = 0;
        }
        if (isNaN(HasilAturanRasio)) {
            var HasilAturanRasio = 0;
        }
        if (isNaN(HasilAturanWaktu)) {
            var HasilAturanWaktu = 0;
        }
        if (isNaN(HasilAturanEkstensi)) {
            var HasilAturanEkstensi = 0;
        }

        var HasilHitung = HasilAturanUtama + HasilAturanRasio + HasilAturanWaktu + HasilAturanEkstensi;

        $('#NilaiSesuaiID').val(parseFloat(HasilHitung.toFixed(2)));

    });

    $('#batal').click(function() {
        var ID          = $('#AnalisaID').val();
        var modul       = 'hapus_analisa';
        var submodul    = $('#submodul').val();
        var UserID      = $('#UserID').val();
        $.ajax({
            type: 'POST',
            url: '../modules/main/analisa/analisa.process.php',
            data: { 'ID': ID, 'modul': modul, 'submodul' : submodul, 'UserID': UserID },
            success: function(hasil) {
                var result = hasil.trim();
                if (result == 'sukses') {
                    location.href = "/index.php?page=analisa"
                } else {
                    $('#modal-data').html(result);
                }
            }
        })
    });
    $("#newForm").validate({
        focusInvalid: true,
        submitHandler: function(form, event) {
            event.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '../modules/main/analisa/analisa.process.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(hasil) {
                    var result = hasil.trim();
                    if (result == 'sukses'){
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