<h1 class="h3 mb-3">Global Konfigurasi Analisa Elliot Wave</h1>
<div class="row">
	<div class="col-12">
		<div class="tab">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item"><a class="nav-link active" href="#rangkaian" data-toggle="tab" role="tab">Rangkaian</a></li>
				<li class="nav-item"><a class="nav-link" href="#struktur" data-toggle="tab" role="tab">Struktur</a></li>
				<li class="nav-item"><a class="nav-link" href="#tipe" data-toggle="tab" role="tab">Tipe</a></li>
				<li class="nav-item"><a class="nav-link" href="#pola" data-toggle="tab" role="tab">Pola</a></li>
				<li class="nav-item"><a class="nav-link" href="#posisi" data-toggle="tab" role="tab">Posisi</a></li>
				<li class="nav-item"><a class="nav-link" href="#derajat" data-toggle="tab" role="tab">Derajat</a></li>
				<li class="nav-item"><a class="nav-link" href="#aturan" data-toggle="tab" role="tab">Aturan</a></li>
				<li class="nav-item"><a class="nav-link" href="#joinaturan" data-toggle="tab" role="tab">Join Aturan</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="rangkaian" role="tabpanel">
					<table id="list-rangkaian" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Rangkaian</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qrangkaian = mysqli_query($koneksi,"SELECT * FROM wave_rangkaian");
								while ($drangkaian = mysqli_fetch_array($qrangkaian,MYSQLI_ASSOC)) {
									$RRangkaianID	=	$drangkaian['RangkaianID'];
									$RRangkaian		=	$drangkaian['Rangkaian'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $RRangkaian;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $RRangkaianID;?>"  data-action="ubah" data-sub="rangkaian" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Rangkaian" alt="Ubah" title="Ubah Rangkaian" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $RRangkaianID;?>"  data-action="hapus" data-sub="rangkaian" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Rangkaian" alt="Hapus" title="Hapus Rangkaian" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="rangkaian" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Rangkaian" alt="Tambah" title="Tambah Rangkaian" data-backdrop="static">Tambah Rangkaian</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="struktur" role="tabpanel">
					<table id="list-struktur" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Struktur</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qstruktur = mysqli_query($koneksi,"SELECT * FROM wave_struktur");
								while ($dstruktur = mysqli_fetch_array($qstruktur,MYSQLI_ASSOC)) {
									$SStrukturID	=	$dstruktur['StrukturID'];
									$SStruktur		=	$dstruktur['Struktur'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $SStruktur;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $SStrukturID;?>"  data-action="ubah" data-sub="struktur" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Struktur" alt="Ubah" title="Ubah Rangkaian" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $SStrukturID;?>"  data-action="hapus" data-sub="struktur" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Struktur" alt="Hapus" title="Hapus Rangkaian" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="struktur" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Struktur" alt="Tambah" title="Tambah Struktur" data-backdrop="static">Tambah Struktur</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="tipe" role="tabpanel">
					<table id="list-tipe" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Tipe</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qtipe = mysqli_query($koneksi,"SELECT * FROM wave_tipe ORDER BY Urutan ASC");
								while ($dtipe = mysqli_fetch_array($qtipe,MYSQLI_ASSOC)) {
									$TTipeID	=	$dtipe['TipeID'];
									$TTipe		=	$dtipe['Tipe'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $TTipe;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $TTipeID;?>"  data-action="ubah" data-sub="tipe" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Tipe" alt="Ubah" title="Ubah Tipe" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $TTipeID;?>"  data-action="hapus" data-sub="tipe" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Tipe" alt="Hapus" title="Hapus Tipe" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="tipe" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Tipe" alt="Tambah" title="Tambah Tipe" data-backdrop="static">Tambah Tipe</button>
						</div>
					</div>
					
				</div>
				<div class="tab-pane" id="pola" role="tabpanel">
					<table id="list-pola" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Pola</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qpola = mysqli_query($koneksi,"SELECT * FROM wave_pola");
								while ($dpola = mysqli_fetch_array($qpola,MYSQLI_ASSOC)) {
									$PPolaID	=	$dpola['PolaID'];
									$PPola	=	$dpola['Pola'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $PPola;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $PPolaID;?>"  data-action="ubah" data-sub="pola" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Pola" alt="Ubah" title="Ubah Pola" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $PPolaID;?>"  data-action="hapus" data-sub="pola" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Pola" alt="Hapus" title="Hapus Pola" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="pola" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Pola" alt="Tambah" title="Tambah Pola" data-backdrop="static">Tambah Pola</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="posisi" role="tabpanel">
					<table id="list-posisi" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Posisi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qposisi = mysqli_query($koneksi,"SELECT * FROM wave_posisi");
								while ($dposisi = mysqli_fetch_array($qposisi,MYSQLI_ASSOC)) {
									$PPosisiID	=	$dposisi['PosisiID'];
									$PPosisi	=	$dposisi['Posisi'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $PPosisi;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $PPosisiID;?>"  data-action="ubah" data-sub="posisi" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Posisi" alt="Ubah" title="Ubah Posisi" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $PPosisiID;?>"  data-action="hapus" data-sub="posisi" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Posisi" alt="Hapus" title="Hapus Posisi" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="posisi" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Posisi" alt="Tambah" title="Tambah Posisi" data-backdrop="static">Tambah Posisi</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="derajat" role="tabpanel">
					<table id="list-derajat" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Derajat</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qderajat = mysqli_query($koneksi,"SELECT * FROM wave_derajat");
								while ($dderajat = mysqli_fetch_array($qderajat,MYSQLI_ASSOC)) {
									$DDerajatID	=	$dderajat['DerajatID'];
									$DDerajat	=	$dderajat['Derajat'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $DDerajat;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $DDerajatID;?>"  data-action="ubah" data-sub="derajat" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Derajat" alt="Ubah" title="Ubah Derajat" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $DDerajatID;?>"  data-action="hapus" data-sub="derajat" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Derajat" alt="Hapus" title="Hapus Derajat" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="derajat" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Derajat" alt="Tambah" title="Tambah Derajat" data-backdrop="static">Tambah Derajat</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="aturan" role="tabpanel">
					<table id="list-joinaturan" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Aturan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qaturan = mysqli_query($koneksi,"SELECT * FROM wave_aturan");
								while ($daturan = mysqli_fetch_array($qaturan,MYSQLI_ASSOC)) {
									$AAturanID	=	$daturan['AturanID'];
									$AAturan	=	$daturan['Aturan'];
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $AAturan;?></td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id="<?php echo $AAturanID;?>"  data-action="ubah" data-sub="aturan" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Aturan" alt="Ubah" title="Ubah Aturan" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $AAturanID;?>"  data-action="hapus" data-sub="aturan" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Aturan" alt="Hapus" title="Hapus Aturan" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="md" data-id=""  data-action="tambah" data-sub="aturan" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Aturan" alt="Tambah" title="Tambah Aturan" data-backdrop="static">Tambah Aturan</button>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="joinaturan" role="tabpanel">
					<table id="list-aturan" class="table table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Aturan</th>
								<th>Rangkaian</th>
								<th>Struktur</th>
								<th>Tipe</th>
								<th>Pola</th>
								<th>Posisi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$no = 1;
								$qaturanjoin = mysqli_query($koneksi,"SELECT * FROM wave_aturanjoin");
								while ($daturanjoin = mysqli_fetch_array($qaturanjoin,MYSQLI_ASSOC)) {
									$AAturanJoinID	=	$daturanjoin['AturanJoinID'];
									$NamaAturan	=	$daturanjoin['NamaAturan'];
									$RangkaianID	=	$daturanjoin['RangkaianID'];
									$StrukturID		=	$daturanjoin['StrukturID'];
									$TipeID			=	$daturanjoin['TipeID'];
									$PolaID			=	$daturanjoin['PolaID'];
									$PosisiID		=	$daturanjoin['PosisiID'];
									$AturanID		=	$daturanjoin['AturanID'];
									
									
								?>
								
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $NamaAturan;?></td>
									<td>
										<?php
											$qrangkaianjoin = mysqli_query($koneksi,"SELECT * FROM wave_rangkaian WHERE RangkaianID IN ($RangkaianID)");
											while ($drangkaianjoin = mysqli_fetch_array($qrangkaianjoin,MYSQLI_ASSOC)) {
												$Rangkaian = $drangkaianjoin['Rangkaian'];
												echo $Rangkaian;
											}
										?>
									</td>
									<td>
										<?php
											$qstrukturjoin = mysqli_query($koneksi,"SELECT * FROM wave_struktur WHERE StrukturID IN ($StrukturID)");
											while ($dstrukturjoin = mysqli_fetch_array($qstrukturjoin,MYSQLI_ASSOC)) {
												$Struktur = $dstrukturjoin['Struktur'];
												echo $Struktur;
											}
										?>
									</td>
									<td>
										<?php
											$qtipejoin = mysqli_query($koneksi,"SELECT * FROM wave_tipe WHERE TipeID IN ($TipeID)");
											while ($dtipejoin = mysqli_fetch_array($qtipejoin,MYSQLI_ASSOC)) {
												$Tipe = $dtipejoin['Tipe'];
												echo $Tipe;
											}
										?>
									</td>
									<td>
										<?php
											$qpolajoin = mysqli_query($koneksi,"SELECT * FROM wave_pola WHERE PolaID IN ($PolaID)");
											while ($dpolajoin = mysqli_fetch_array($qpolajoin,MYSQLI_ASSOC)) {
												$Pola = $dpolajoin['Pola'];
												echo $Pola.'</br>';
											}
										?>
									</td>
									<td>
										<?php
											$qposisijoin = mysqli_query($koneksi,"SELECT * FROM wave_posisi WHERE PosisiID IN ($PosisiID)");
											while ($dposisijoin = mysqli_fetch_array($qposisijoin,MYSQLI_ASSOC)) {
												$Posisi = $dposisijoin['Posisi'];
												echo $Posisi.'</br>';
											}
										?>
									</td>
									<td>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="lg" data-id="<?php echo $AAturanJoinID;?>"  data-action="ubah" data-sub="aturanjoin" data-folder="setting-analisa" data-page="setting-analisa" data-header="Ubah Aturan Join" alt="Ubah" title="Ubah Aturan Join" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
										<a href="" data-target="#globalModal" data-toggle="modal" data-size="sm" data-id="<?php echo $AAturanJoinID;?>"  data-action="hapus" data-sub="aturanjoin" data-folder="setting-analisa" data-page="setting-analisa" data-header="Hapus Aturan Join" alt="Hapus" title="Hapus Aturan Join" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
									</td>
								</tr>
								<?php 
								}
							?>
						</tbody>
					</table>
					<div class="row">
						<div class="col-12 text-center">
							<button class="btn btn-primary" href="" data-target="#globalModal" data-toggle="modal" data-size="lg" data-id=""  data-action="tambah" data-sub="aturanjoin" data-folder="setting-analisa" data-page="setting-analisa" data-header="Tambah Aturan Join" alt="Tambah" title="Tambah Aturan Join" data-backdrop="static">Tambah Aturan Join</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
