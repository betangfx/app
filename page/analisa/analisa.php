<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<button class="btn btn-primary float-right" href="" data-target="#globalModal" data-toggle="modal" data-id="New" data-UserID="<?php echo $UserID;?>"  data-size="lg" data-action="tambah" data-folder="analisa" data-page="analisa" data-header="Analisa" alt="Buat Analisa" title="Buat Analisa" data-backdrop="static">Buat Analisa</button>
				<h1 class="card-title">Daftar Analisa</h1>
			</div>
			<div class="card-body">
				<table id="list-analisa" class="table table-striped" style="width:100%">
					<thead>
						<tr>
							<th class="text-center align-middle">No</th>
							<th class="text-center align-middle">No. Analisa</th>
							<th class="text-center align-middle">Symbol</th>
							<th class="text-center align-middle">Jangka<br/>Waktu</th>
							<th class="text-center align-middle">Arah<br/>Dominan</th>
							<th class="text-center align-middle">Rangkaian</th>
							<th class="text-center align-middle">Struktur</th>
							<th class="text-center align-middle">Posisi</th>
							<th class="text-center align-middle">Status</th>
							<th class="text-center align-middle">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$no = 1;
							$qanalisa = mysqli_query($koneksi,"	SELECT a.AnalisaID, h.Symbol, b.JangkaWaktu, c.Arah, d.Rangkaian, e.Struktur, f.Posisi, g.Status FROM analisa a
																LEFT JOIN jangkawaktu b ON a.JangkaWaktu = b.JangkaWaktuID
																LEFT JOIN wave_arah c ON a.Arah = c.ArahID
																LEFT JOIN wave_rangkaian d ON a.Rangkaian = d.RangkaianID
																LEFT JOIN wave_struktur e ON a.Struktur = e.StrukturID
																LEFT JOIN wave_posisi f ON a.Posisi = f.PosisiID
																LEFT JOIN status g ON a.StatusID = g.StatusID
																LEFT JOIN symbol h ON a.Symbol = h.SymbolID
																WHERE a.UserID = '$UserID' ORDER BY a.TglBuat DESC");
							while ($danalisa = mysqli_fetch_array($qanalisa,MYSQLI_ASSOC)) {
								$AnalisaID		=	$danalisa['AnalisaID'];
								$Symbol			=	$danalisa['Symbol'];
								$JangkaWaktu	=	$danalisa['JangkaWaktu'];
								$Arah			=	$danalisa['Arah'];
								$Rangkaian		=	$danalisa['Rangkaian'];
								$Struktur		=	$danalisa['Struktur'];
								$Posisi			=	$danalisa['Posisi'];
								$Status			=	$danalisa['Status'];
							?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $AnalisaID;?></td>
							<td><?php echo $Symbol;?></td>
							<td><?php echo $JangkaWaktu;?></td>
							<td><?php echo $Arah;?></td>
							<td><?php echo $Rangkaian;?></td>
							<td><?php echo $Struktur;?></td>
							<td><?php echo $Posisi;?></td>
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
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $AnalisaID;?>" data-UserID="<?php echo $UserID;?>"  data-size="lg" data-action="lihat" data-folder="analisa" data-page="analisa" data-header="Analisa" alt="Lihat Analisa" title="Lihat Analisa" data-backdrop="static"><i class="align-middle" data-feather="zoom-in"></i></a>
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $AnalisaID;?>" data-UserID="<?php echo $UserID;?>"  data-size="lg" data-action="ubah" data-folder="analisa" data-page="analisa" data-header="Analisa" alt="Ubah Analisa" title="Ubah Analisa" data-backdrop="static"><i class="align-middle" data-feather="edit-3"></i></a>
												<a href="" data-target="#globalModal" data-toggle="modal" data-id="<?php echo $AnalisaID;?>" data-UserID="<?php echo $UserID;?>"  data-size="sm" data-action="hapus" data-folder="analisa" data-page="analisa" data-header="Analisa" alt="Hapus Analisa" title="Hapus Analisa" data-backdrop="static"><i class="align-middle" data-feather="trash"></i></a>
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

