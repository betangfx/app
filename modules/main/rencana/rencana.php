<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary float-right" href="" alt="Tambah Rencana" title="Tambah Rencana"
                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="lg"
                    data-action="tambah" data-header="Tambah Rencana" data-sub-header="" data-module="rencana"
                    data-submodule="" data-form="rencana" data-folder="main" data-id=""
                    data-UserID="<?php echo $UserID;?>">Buat Rencana</button>
                <h1 class=" card-title">Daftar Rencana</h1>
            </div>
            <div class="card-body">
                <table id="list-rencana" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">No. Rencana</th>
                            <th class="text-center align-middle">Rencana<br />Transaksi</th>
                            <th class="text-center align-middle">Symbol</th>
                            <th class="text-center align-middle">Jangka<br />Waktu</th>
                            <th class="text-center align-middle">Dasar<br />Rencana</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$no = 1;
							$rencana = new rencana_data();
							foreach($rencana->rencana('',$UserID) as $row){
							?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $row['RencanaID'];?></td>
                            <td><?php echo $row['RencanaAksi'];?></td>
                            <td><?php echo $row['Symbol'];?></td>
                            <td><?php echo $row['JangkaWaktu'];?></td>
                            <td><?php echo $row['AnalisaID'];?></td>
                            <td>
                                <?php
									if ($row['Status'] == 'Terbuka') {
									echo '<span class="badge badge-warning">'.$row['Status'].'</span>';
									}
									if ($row['Status'] == 'Ditutup') {
									echo '<span class="badge badge-success">'.$row['Status'].'</span>';
									}
								?>
                            </td>
                            <td>
                                <a class="align-middle text-center" href="" alt="Detail Rencana"
                                    title="Detail Rencana" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="lg" data-action="lihat"
                                    data-header="Detail Rencana"
                                    data-sub-header="" data-module="rencana"
                                    data-submodule="" data-form="rencana"
                                    data-folder="main" data-id="<?php echo $row['RencanaID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="zoom-in"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Ubah Rencana"
                                    title="Ubah Rencana" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="lg" data-action="ubah"
                                    data-header="Ubah Rencana"
                                    data-sub-header="" data-module="rencana"
                                    data-submodule="" data-form="rencana"
                                    data-folder="main" data-id="<?php echo $row['RencanaID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Hapus Rencana"
                                    title="Hapus Rencana" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="hapus"
                                    data-header="Hapus Rencana"
                                    data-sub-header="" data-module="rencana"
                                    data-submodule="" data-form="rencana"
                                    data-folder="main" data-id="<?php echo $row['RencanaID'];?>"
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