<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
				<button class="btn btn-primary float-right" href="" alt="Tambah Member" title="Tambah Member"
                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                    data-action="tambah" data-header="Tambah Member" data-sub-header="" data-module="members"
                    data-submodule="" data-form="members" data-folder="setting" data-id=""
                    data-UserID="<?php echo $UserID;?>">Buat Member</button>
                <h1 class=" card-title">Daftar Member</h1>
            </div>
            <div class="card-body">
                <table id="list-member" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nama Lengkap</th>
                            <th class="text-center align-middle">Username</th>
                            <th class="text-center align-middle">Email</th>
                            <th class="text-center align-middle">No. Telp</th>
                            <th class="text-center align-middle">Tanggal<br />Pendaftaran</th>
                            <th class="text-center align-middle">Level</th>
                            <th class="text-center align-middle">Status<br />Membership</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$no = 1;
							$member = new members_data();
							foreach($member->members('') as $row){
								$UserID		    =	$row['UserID'];
								$Nama	        =	$row['Nama'];
								$Username		=	$row['Username'];
								$Email	        =	$row['Email'];
								$NoTelp     	=	$row['NoTelp'];
                                $TglDaftar		=	$row['TglDaftar'];
								$UserLevel		=	$row['UserLevel'];
                                $StatusID		=	$row['StatusID'];
                                $Status		    =	$row['Status'];
							?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $Nama;?></td>
                            <td><?php echo $Username;?></td>
                            <td><?php echo $Email;?></td>
                            <td><?php echo $NoTelp;?></td>
                            <td><?php echo $TglDaftar;?></td>
                            <td><?php echo $UserLevel;?></td>
                            <td>
                                <?php 
									if ($StatusID == '') {
									echo '<span class="badge badge-warning">'.$Status.'</span>';
									}
									else if ($StatusID == '11') {
									echo '<span class="badge badge-success">'.$Status.'</span>';
									}
								?>
                            </td>
                            <td>
							<a class="align-middle text-center" href="" alt="Detail Member"
                                    title="Detail Member" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="lihat"
                                    data-header="Detail Member"
                                    data-sub-header="" data-module="member"
                                    data-submodule="" data-form="member"
                                    data-folder="main" data-id="<?php echo $row['UserID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="zoom-in"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Ubah Member"
                                    title="Ubah Member" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="ubah"
                                    data-header="Ubah Member"
                                    data-sub-header="" data-module="member"
                                    data-submodule="" data-form="member"
                                    data-folder="main" data-id="<?php echo $row['UserID'];?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Hapus Member"
                                    title="Hapus Member" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="hapus"
                                    data-header="Hapus Member"
                                    data-sub-header="" data-module="member"
                                    data-submodule="" data-form="member"
                                    data-folder="main" data-id="<?php echo $row['UserID'];?>"
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