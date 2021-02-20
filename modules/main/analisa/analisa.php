<div class="row">
    <div class="col-12 text-center">
        <h1 class="card-title">Daftar <?php echo $ModuleNM;?></h1>
    </div>
    <div class="col-12">
        <div id="tab-<?php echo $Module;?>" class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <?php
                    $sub_analisa = new sub_analisa();
                    foreach ($sub_analisa->tab($ModuleID) as $key => $val) {
                        $SubModule        = $val['SubModul'];
                        $SubModuleSlug      = $val['Slug'];
                    ?>
                <li class="nav-item"><a class="nav-link <?php if($key==0){ echo 'active'; }?>"
                        href="#tab-analisa-<?php echo $SubModuleSlug;?>" data-toggle="tab"
                        role="tab"><?php echo $SubModule;?></a>
                </li>
                <?php
                    }
                    ?>
            </ul>

            <div class="tab-content">
                <?php 
                foreach ($sub_analisa->tab($ModuleID) as $key => $val) {
                    $SubModulID         = $val['SubModulID'];
                    $SubModule          = $val['SubModul'];
                    $SubModuleSlug      = $val['Slug'];

                ?>
                <div class="tab-pane <?php if($key==0){ echo "active"; }?>"
                    id="tab-analisa-<?php echo $SubModuleSlug;?>" role="tabpanel">
                    <div class="row">
                        <table id="analisa_<?php echo $SubModuleSlug;?>" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Analisa</th>
                                    <th>Pasar</th>
                                    <th>Symbol</th>
                                    <th>Jangka<br />Waktu</th>
                                    <th>Arah<br />Dominan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $table_data = new analisa_data();
                                $table_analisa = 'analisa_'.$SubModuleSlug;
                                foreach ($table_data->$table_analisa('', $UserID) as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td><?php echo $row['AnalisaID'];?></td>
                                    <td><?php echo $row['Pasar'];?></td>
                                    <td><?php echo $row['Symbol'];?></td>
                                    <td><?php echo $row['JangkaWaktu'];?></td>
                                    <td><?php echo $row['Arah'];?></td>
                                    <td><?php echo $row['Status'];?></td>
                                    <td>
                                        <div class="row">
                                            <a class="col-sm-6 align-middle text-center" href=""
                                                alt="Ubah <?php echo $ModuleNM;?>" title="Ubah <?php echo $ModuleNM;?>"
                                                data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                                data-size="lg" data-action="ubah"
                                                data-header="Ubah <?php echo $ModuleNM;?>"
                                                data-sub-header="- <?php echo $SubModule;?>"
                                                data-module="<?php echo $Module;?>"
                                                data-submodule="<?php echo $SubModuleSlug;?>"
                                                data-form="<?php echo $Module;?>" data-folder="<?php echo $Folder;?>"
                                                data-id="<?php echo $row['AnalisaID'];?>"
                                                data-UserID="<?php echo $UserID;?>">
                                                <i class="align-middle" data-feather="edit-3"></i>
                                            </a>
                                            <a class="col-sm-6 align-middle text-center" href="" 
                                                alt="Hapus <?php echo $ModuleNM;?>" title="Hapus <?php echo $ModuleNM;?>"
                                                data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                                data-size="sm" data-action="hapus"
                                                data-header="Hapus <?php echo $ModuleNM;?>"
                                                data-sub-header="- <?php echo $SubModule;?>"
                                                data-module="<?php echo $Module;?>"
                                                data-submodule="<?php echo $SubModuleSlug;?>"
                                                data-form="<?php echo $Module;?>" data-folder="<?php echo $Folder;?>"
                                                data-id="<?php echo $row['AnalisaID'];?>"
                                                data-UserID="<?php echo $UserID;?>">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                                <?php   
                                }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" href="" alt="Tambah <?php echo $ModuleNM;?>" title="Tambah <?php echo $ModuleNM;?>"
                                                data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                                data-size="lg" data-action="tambah"
                                                data-header="Tambah <?php echo $ModuleNM;?>"
                                                data-sub-header="- <?php echo $SubModule;?>"
                                                data-module="<?php echo $Module;?>"
                                                data-submodule="<?php echo $SubModuleSlug;?>"
                                                data-form="<?php echo $Module;?>" data-folder="<?php echo $Folder;?>"
                                                data-id=""
                                                data-UserID="<?php echo $UserID;?>">
                                Buat <?php echo $ModuleNM;?>
                            </button>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>