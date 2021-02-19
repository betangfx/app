<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<button class="btn btn-primary float-right" href="" data-target="#globalModal" data-toggle="modal" data-id="New" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="tambah" data-folder="rencana" data-page="rencana" data-header="Rencana" alt="Buat Rencana" title="Buat Rencana" data-backdrop="static">Buat Rencana</button>
				<h1 class="card-title">Daftar Rencana</h1>
			</div>
			<div class="card-body">
				<table id="list-rencana" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th class="text-center align-middle">No</th>
							<th class="text-center align-middle">No. Rencana</th>
							<th class="text-center align-middle">Rencana<br/>Transaksi</th>
							<th class="text-center align-middle">Symbol</th>
							<th class="text-center align-middle">Jangka<br/>Waktu</th>
							<th class="text-center align-middle">Dasar<br/>Rencana</th>
							<th class="text-center align-middle">Status</th>
							<th class="text-center align-middle">Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php
							$no = 1;
							$qrencana = mysqli_query($koneksi,"	SELECT a.RencanaID, b.RencanaAksi, c.Symbol, d.JangkaWaktu, a.AnalisaID, e.Status FROM rencana a
																LEFT JOIN rencana_aksi b ON a.RencanaAksiID = b.RencanaAksiID
																LEFT JOIN symbol c ON a.SymbolID = c.SymbolID
																LEFT JOIN jangkawaktu d ON a.JangkaWaktuID = d.JangkaWaktuID
																LEFT JOIN status e ON a.StatusID = e.StatusID
																WHERE a.UserID = '$userid' ORDER BY a.TglBuat DESC");
							while ($drencana = mysqli_fetch_array($qrencana,MYSQLI_ASSOC)) {
								$RencanaID		=	$drencana['RencanaID'];
								$RencanaAksi	=	$drencana['RencanaAksi'];
								$Symbol			=	$drencana['Symbol'];
								$JangkaWaktu	=	$drencana['JangkaWaktu'];
								$AnalisaID		=	$drencana['AnalisaID'];
								$Status		=	$drencana['Status'];
							?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $RencanaID;?></td>
							<td><?php echo $RencanaAksi;?></td>
							<td><?php echo $Symbol;?></td>
							<td><?php echo $JangkaWaktu;?></td>
							<td><?php echo $AnalisaID;?></td>
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
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $RencanaID;?>" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="lihat" data-folder="rencana" data-page="rencana" data-header="Rencana" alt="Lihat Rencana" title="Lihat Rencana" data-backdrop="static"><i class="align-middle" data-feather="zoom-in"></i></a>
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $RencanaID;?>" data-userid="<?php echo $userid;?>"  data-size="lg" data-action="ubah" data-folder="rencana" data-page="rencana" data-header="Rencana" alt="Ubah Rencana" title="Ubah Rencana" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $RencanaID;?>" data-userid="<?php echo $userid;?>"  data-size="sm" data-action="hapus" data-folder="rencana" data-page="rencana" data-header="Rencana" alt="Hapus Rencana" title="Hapus Rencana" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
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

