<?php
	error_reporting(E_ALL);
	include ('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Trading Management Systems">
    <meta name="author" content="BetangFX">
    <link rel="icon" href="<?php echo $site_url;?>/assets/img/Icon.png" type="image/icon type">
    <title><?php echo $appname . ' '. $vendors;?></title>

    <link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">

    <link href="<?php echo $site_url;?>/assets/css/classic.css" rel="stylesheet">
    <style>
    body {
        opacity: 0;
    }

    #mytable.table-sm td,
    #mytable.table-sm th {
        padding: 0rem;
    }
    }
    </style>
</head>

<body>
    <?php
			session_start();
			$Username	= isset($_SESSION['Username']) ? $_SESSION['Username'] : NULL;
			$UserID		= isset($_SESSION['UserID']) ? $_SESSION['UserID'] : NULL;
			$UserLevel	= isset($_SESSION['UserLevel']) ? $_SESSION['UserLevel'] : NULL;
			if ($Username = NULL || empty($Username) && $UserID = NULL || empty($UserID) ){
			?>
    <main class="main d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2"><?php echo $appname;?></h1>
                            <p class="lead">
                                <?php echo $vendors;?>
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="<?php echo $site_url;?>/images/avatars/user-login.jpg" alt=""
                                            class="img-fluid rounded-circle" width="132" height="132">
                                    </div>
                                    <form id="login" name="login" method="POST" action="">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control form-control-lg" type="text" name="Username"
                                                placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password"
                                                placeholder="">
                                            <small>
                                                <a href="pages-reset-password.html">Lupa Password?</a>
                                            </small>
                                            <br />
                                            <small>
                                                <a href="register.php">Belum punya akun? Klik untuk mendaftar.</a>
                                            </small>
                                        </div>
                                        <div>
                                            <div class="custom-control custom-checkbox align-items-center">
                                                <input type="checkbox" class="custom-control-input" value="remember-me"
                                                    name="remember-me" checked="">
                                                <label class="custom-control-label text-small">Ingatkan Saya
                                                    Nanti!</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" name="mode" value="login"
                                                class="btn btn-lg btn-primary">Masuk</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="<?php echo $site_url;?>/assets/js/app.js"></script>
    <script src="<?php echo $site_url;?>/assets/js/auth.js"></script>
    <?php 
			}
			else {
				$Username	= isset($_SESSION['Username']) ? $_SESSION['Username'] : NULL;
				$UserID		= isset($_SESSION['UserID']) ? $_SESSION['UserID'] : NULL;
				$UserLevel	= isset($_SESSION['UserLevel']) ? $_SESSION['UserLevel'] : NULL;
                $UAPage     = isset($_GET['page']) ? $_GET['page'] : NULL;
			?>

    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content ">
                <a class="sidebar-brand" href="index.php">
                    <i class="align-middle" data-feather="briefcase"></i>
                    <span class="align-middle"><?php echo $appname;?></span>
                </a>
                <!-- Sidebar Menu -->
                <?php include ('includes/left_menu.php');?>
                <!-- EOF Sidebar Menu -->
            </div>
        </nav>
        <div class="main">

            <?php include ('includes/top_menu.php');?>

            <main class="content" style="padding:1rem;">
                <div class="container-fluid p-0">
                    <?php
					if($UAPage) {
                        $ModuleProperty = new module();
                        $UserAccessPage = $UAPage;
                        foreach ($ModuleProperty->getusermodul($UserAccessPage) as $row) {
                            $ModuleID   = $row['ModulID'];
                            $ModuleNM   = $row['Modul'];
                            $Lokasi 	= explode('/', $row['Lokasi']);
                            $Folder		= $Lokasi[1];
                            $Module		= $Lokasi[2];
                            $Page		= $Lokasi[2] . '.php';
                        }
						    if(file_exists($mod_folder . $Folder . '/' . $Module . '/'. $Page)) {
								include($mod_folder . $Folder . '/' . $Module . '/'. $Page);
							}
							else {
								echo '<div class="col-md-12"><div class="alert alert-danger"><i class="fa fa-warning"></i> File not found ('.$site_url.'/'. $mod_folder . $Folder . '/' . $Module . '/'. $Page.')</div></div>';
							}
					}
					else { 
                    ?>
                    <div class="row">
                        <div class="col-12 col-lg-8 d-flex">
                            <div id="smartwizard-arrows-success" class="col-12 wizard wizard-success mb-4">
                                <h1 class="h3 mt-3 mb-3 text-center">4 Langkah Sukses</h1>
                                <ul>
                                    <li><a href="#arrows-success-step-1">Analisa</a></li>
                                    <li><a href="#arrows-success-step-2">Rencana</a></li>
                                    <li><a href="#arrows-success-step-3">Jurnal</a></li>
                                    <li><a href="#arrows-success-step-4">Evaluasi</a></li>
                                </ul>
                                <div>
                                    <div id="arrows-success-step-1" class="">
                                        <blockquote class="blockquote-reverse m-b-0">
                                            <p>
                                                Tanpa adanya analisa, trading hanya akan menjadi seperti ajang
                                                perjudian. Dimana trader hanya akan menebak – nebak langkah selanjutnya
                                                dan bergantung pada keberuntungan untuk mendapatkan keuntungan.
                                            </p>
                                            <footer>
                                                Revanny R. Tristia <cite title="Source Title">CAT Institute - Astronacci
                                                    Internasional</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                    <div id="arrows-success-step-2" class="">
                                        <blockquote class="blockquote-reverse m-b-0">
                                            <p>
                                                "Jika kamu gagal dalam merencanakan, berarti kamu sendiri yang
                                                merencanakan kegagalan itu sendiri"
                                            </p>
                                            <footer>
                                                Benjamin Franklin <cite title="Source Title">Salah satu pendiri Negara
                                                    Amerika Serikat</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                    <div id="arrows-success-step-3" class="">
                                        <blockquote class="blockquote-reverse m-b-0">
                                            <p>
                                                Melacak kesuksesan sekaligus kegagalan bertrading sangatlah penting bagi
                                                seorang trader. Karenanya, jurnal trading forex dibutuhkan agar trading
                                                makin efektif.
                                            </p>
                                            <footer>
                                                Parmadita <cite title="Source Title">SeputarForex.com</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                    <div id="arrows-success-step-4" class="">
                                        <blockquote class="blockquote-reverse m-b-0">
                                            <p>
                                                Evaluasi trading dapat membuat Anda menuju ke arah yang lebih benar.
                                                Dengan memperbaiki kekurangan di posisi sebelumnya, maka Anda dapat
                                                membuat peningkatan target di posisi berikutnya. Namun, jika Anda tidak
                                                melakukan perbaikan, Anda dapat mengulangi kesalahan lama yang membuat
                                                Anda kehilangan banyak profit.
                                            </p>
                                            <footer>
                                                Alwin Ng <cite title="Source Title">TradeYourEdge.com</cite>
                                            </footer>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 d-flex">
                            <div class="card flex-fill w-100">
                                <div class="card-header">
                                    <span class="badge badge-info float-right">Hari Ini</span>
                                    <h5 class="card-title mb-0">Info Penting!</h5>
                                </div>
                                <div class="card-body">

                                    <hr>
                                    <a href="#" class="btn btn-primary btn-block">Lebih banyak</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="float-right text-info">
                                        0
                                    </div>
                                    <h4 class="mb-2">Analisa</h4>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Masih Terbuka</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Paling Banyak</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="float-right text-success">
                                        0
                                    </div>
                                    <h4 class="mb-2">Rencana</h4>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Masih Terbuka</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Paling Banyak</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="float-right text-info">
                                        0
                                    </div>
                                    <h4 class="mb-2">Transaksi</h4>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Masih Terbuka</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Paling Banyak</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-xl d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="float-right text-info">
                                        0
                                    </div>
                                    <h4 class="mb-2">Untung / Rugi</h4>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Keuntungan</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 px-0">
                                        <div class="row m-0">
                                            <div class="col-md-6 text-left px-0">Kerugian</div>
                                            <div class="col-md-6 text-right px-0">(0)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
					}
					?>
                </div>
            </main>
            <?php include $inc_folder . 'footer.php'; ?>
        </div>
        <div class="modal fade" id="globalModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="myform" class="form-horizontal" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title">Default modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body m-0">
                            <div id="globalModal" class="modal-body-data"></div>
                        </div>
                        <div class="modal-footer">
                            <div id="globalModal" class="modal-footer-data"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="newModal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="newForm" class="form-horizontal" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title">New Modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body m-0">
                            <div id="newModal" class="modal-body-data"></div>
                        </div>
                        <div class="modal-footer">
                            <div id="newModal" class="modal-footer-data"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo $site_url;?>/assets/js/app.js"></script>
    <script src="<?php echo $site_url;?>/assets/js/datatable.data.js"></script>
    <script src="<?php echo $site_url;?>/assets/js/form.js"></script>
    <script>
    $(function() {
        $("#smartwizard-arrows-success").smartWizard({
            theme: "arrows",
            showStepURLhash: false
        });
    });
    </script>
    <?php
			}
		?>
</body>

</html>