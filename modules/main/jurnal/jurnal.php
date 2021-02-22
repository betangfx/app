<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
				<button class="btn btn-primary float-right" href="" alt="Buat Jurnal" title="Buat Jurnal"
                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="lg"
                    data-action="tambah" data-header="Tambah Jurnal" data-sub-header="" data-module="jurnal"
                    data-submodule="" data-form="jurnal" data-folder="main" data-id=""
                    data-UserID="<?php echo $UserID;?>">Buat Jurnal</button>
                <h1 class=" card-title">Daftar Jurnal</h1>
            </div>
            <div class="card-body">
                <table id="list-jurnal" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">No. Jurnal</th>
                            <th class="text-center align-middle">Aksi</th>
                            <th class="text-center align-middle">Symbol</th>
                            <th class="text-center align-middle">Jangka<br />Waktu</th>
                            <th class="text-center align-middle">Status<br />Transaksi</th>
                            <th class="text-center align-middle">Status<br />Jurnal</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$no = 1;
							$jurnal = new jurnal_data();
							foreach($jurnal->jurnal('',$UserID) as $row){
								$JurnalID		=	$row['JurnalID'];
								$RencanaAksi	=	$row['RencanaAksi'];
								$Symbol			=	$row['Symbol'];
								$JangkaWaktu	=	$row['JangkaWaktu'];
								$AlasanKeluar	=	$row['AlasanKeluar'];
								$Status			=	$row['Status'];
							?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $JurnalID;?></td>
                            <td><?php echo $RencanaAksi;?></td>
                            <td><?php echo $Symbol;?></td>
                            <td><?php echo $JangkaWaktu;?></td>
                            <td>
                                <?php 
									if ($AlasanKeluar == 'Impas') {
									echo '<span class="badge badge-warning">'.$AlasanKeluar.'</span>';
									}
									else if ($AlasanKeluar == 'Rugi') {
									echo '<span class="badge badge-danger">'.$AlasanKeluar.'</span>';
									}
									else if ($AlasanKeluar == 'Untung') {
									echo '<span class="badge badge-success">'.$AlasanKeluar.'</span>';
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
							<a class="align-middle text-center" href="" alt="Detail Jurnal"
                                    title="Detail Jurnal" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="lg" data-action="lihat"
                                    data-header="Detail Jurnal"
                                    data-sub-header="" data-module="jurnal"
                                    data-submodule="" data-form="jurnal"
                                    data-folder="main" data-id="<?php echo $row['JurnalID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="zoom-in"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Ubah Jurnal"
                                    title="Ubah Jurnal" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="lg" data-action="ubah"
                                    data-header="Ubah Jurnal"
                                    data-sub-header="" data-module="jurnal"
                                    data-submodule="" data-form="jurnal"
                                    data-folder="main" data-id="<?php echo $row['JurnalID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Hapus Jurnal"
                                    title="Hapus Jurnal" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="hapus"
                                    data-header="Hapus Jurnal"
                                    data-sub-header="" data-module="jurnal"
                                    data-submodule="" data-form="jurnal"
                                    data-folder="main" data-id="<?php echo $row['JurnalID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="trash"></i>
                                </a>
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