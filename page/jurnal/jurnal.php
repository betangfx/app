<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<button class="btn btn-primary float-right" href="" data-target="#globalModal" data-toggle="modal" data-id="New" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="tambah" data-folder="jurnal" data-page="jurnal" data-header="Jurnal" alt="Buat Jurnal" title="Buat Jurnal" data-backdrop="static">Buat Jurnal</button>
				<h1 class="card-title">Daftar Jurnal</h1>
			</div>
			<div class="card-body">
				<table id="list-jurnal" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th class="text-center align-middle">No</th>
							<th class="text-center align-middle">No. Jurnal</th>
							<th class="text-center align-middle">Aksi</th>
							<th class="text-center align-middle">Symbol</th>
							<th class="text-center align-middle">Jangka<br/>Waktu</th>
							<th class="text-center align-middle">Status<br/>Transaksi</th>
							<th class="text-center align-middle">Status<br/>Jurnal</th>
							<th class="text-center align-middle">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$qjurnal = mysqli_query($koneksi,"	SELECT a.JurnalID, b.RencanaAksi, c.Symbol, d.JangkaWaktu, a.AlasanKeluar, e.Status FROM jurnal a
							LEFT JOIN rencana_aksi b ON a.AksiID = b.RencanaAksiID
							LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
							LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
							LEFT JOIN status e ON a.StatusID = e.StatusID
							WHERE a.UserID = '$userid' ORDER BY a.TglBuat DESC");
							while ($djurnal = mysqli_fetch_array($qjurnal,MYSQLI_ASSOC)) {
								$JurnalID		=	$djurnal['JurnalID'];
								$RencanaAksi	=	$djurnal['RencanaAksi'];
								$Symbol			=	$djurnal['Symbol'];
								$JangkaWaktu	=	$djurnal['JangkaWaktu'];
								$StatusTRX		=	$djurnal['AlasanKeluar'];
								$Status			=	$djurnal['Status'];
							?>
							<tr>
								<td><?php echo $no++;?></td>
								<td><?php echo $JurnalID;?></td>
								<td><?php echo $RencanaAksi;?></td>
								<td><?php echo $Symbol;?></td>
								<td><?php echo $JangkaWaktu;?></td>
								<td>
								<?php 
									if ($StatusTRX == 'Impas') {
									echo '<span class="badge badge-warning">'.$StatusTRX.'</span>';
									}
									else if ($StatusTRX == 'Rugi') {
									echo '<span class="badge badge-danger">'.$StatusTRX.'</span>';
									}
									else if ($StatusTRX == 'Untung') {
									echo '<span class="badge badge-success">'.$StatusTRX.'</span>';
									}
								?>	
								</td>
								<td>
								<?php
									if ($Status == 'Terbuka') {
									echo '<span class="badge badge-warning">'.$Status.'</span>';
									}
									if ($Status == 'Ditutup') {
									echo '<span class="badge badge-success">'.$Status.'</span>';
									}
								?>
							</td>
								<td>
									<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $JurnalID;?>" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="lihat" data-folder="jurnal" data-page="jurnal" data-header="Jurnal" alt="Lihat Jurnal" title="Lihat Jurnal" data-backdrop="static"><i class="align-middle" data-feather="zoom-in"></i></a>
									<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $JurnalID;?>" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="ubah" data-folder="jurnal" data-page="jurnal" data-header="Jurnal" alt="Ubah Jurnal" title="Ubah Jurnal" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
									<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $JurnalID;?>" data-userid="<?php echo $userid;?>"  data-size="sm" data-action="hapus" data-folder="jurnal" data-page="jurnal" data-header="Jurnal" alt="Hapus Jurnal" title="Hapus Jurnal" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
								</td>
							</tr>
							<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

