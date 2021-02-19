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
    <link rel="icon" href="<?php echo $site_url;?>/Icon.png" type="image/icon type">
    <title><?php echo $appname . ' '. $vendors;?> - Daftar</title>

    <link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">

    <link href="<?php echo $site_url;?>/assets/css/classic.css" rel="stylesheet">
    <style>
    body {
        opacity: 0;
    }

    /* Tombol Menuju Chat Langsung ke Messaging App Ala Igniel
			Dilarang keras mengubah nama atribut yang ada di dalam kode ini */
    :root {
        --Kontak-WA: #25D366;
        /* Warna WhatsApp */
        --Kontak-Tele: #0088CC;
        /* Warna Line */
        --Kontak-WA-uname: "6282237540250";
        /* Nomor WhatsApp */
        --Kontak-WA-text: "Hallo admin,%20mohon%20aktivasi%20*username: *%20";
        /* Pesan WhatsApp */
        --Kontak-Tele-uname: "KarismaTM";
        /* Username Telegram */
    }

    #Kontak {
        text-align: center;
        width: 100%;
        line-height: 0px
    }

    #Kontak svg {
        width: 24px;
        height: 24px
    }

    #Kontak a {
        text-decoration: none
    }

    #Kontak .WA svg path {
        fill: var(--Kontak-WA)
    }

    #Kontak .Tele svg path {
        fill: var(--Kontak-Tele)
    }

    #Kontak .WA,
    #Kontak .Tele {
        display: inline-block;
        width: 90px;
        text-align: center;
        margin: 0 5px
    }

    #Kontak .onoffswitch {
        position: relative;
        width: 90px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        margin-top: 5px;
    }

    #Kontak .onoffswitch-checkbox {
        display: none;
    }

    #Kontak .onoffswitch-inner {
        display: block;
        width: 200%;
        margin-left: -100%;
        transition: margin 0.3s ease-in 0s;
    }

    #Kontak .onoffswitch-inner:before,
    .onoffswitch-inner:after {
        display: block;
        float: left;
        width: 50%;
        height: 25px;
        padding: 0;
        line-height: 25px;
        color: white;
        font-family: Trebuchet, Arial, sans-serif;
        font-weight: bold;
        text-align: center;
        box-sizing: border-box;
    }

    #Kontak .WA .onoffswitch-label {
        display: block;
        overflow: hidden;
        border: 2px solid var(--Kontak-WA);
        border-radius: 20px;
    }

    #Kontak .WA .onoffswitch-inner:before {
        content: var(--Kontak-WA-uname);
        background-color: var(--Kontak-WA);
        color: #FFFFFF;
        font-size: 11px;
    }

    #Kontak .WA .onoffswitch-inner:after {
        content: "WhatsApp";
        color: var(--Kontak-WA);
        font-size: 14px;
    }

    #Kontak .WA:hover .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    #Kontak .Tele .onoffswitch-label {
        display: block;
        overflow: hidden;
        border: 2px solid var(--Kontak-Tele);
        border-radius: 20px;
    }

    #Kontak .Tele .onoffswitch-inner:before {
        content: var(--Kontak-Tele-uname);
        background-color: var(--Kontak-Tele);
        color: #FFFFFF;
        font-size: 11px;
    }

    #Kontak .Tele .onoffswitch-inner:after {
        content: "Telegram";
        color: var(--Kontak-Tele);
        font-size: 14px;
    }

    #Kontak .Tele:hover .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }
    </style>
</head>

<body>
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
                        <?php 
							if (isset($_GET['status']) == 'sukses') {
								?>
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12 text-center">
                                    Terima kasih telah mendaftar,<br />
                                    <p><strong>Untuk aktivasi bisa hubungi admin di Whatsapp / Telegram
                                            Berikut:</strong>
                                    </p>
                                </div>
                                <div id="Kontak">
                                    <div class="WA">
                                        <a href="javascript:void(0);"
                                            onclick="window.open('https://api.whatsapp.com/send?phone='+getComputedStyle(document.querySelector('#Kontak .WA .onoffswitch-inner'), ':before').getPropertyValue('content').replace('&quot;','').replace('&quot;','')+'&text='+getComputedStyle(document.querySelector('html'), ':root').getPropertyValue('--Kontak-WA-text').replace('&quot;','').replace('&quot;',''))"
                                            title="WhatsApp" target="_blank">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z">
                                                </path>
                                            </svg>
                                            <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                    id="myonoffswitch" checked>
                                                <label class="onoffswitch-label" for="myonoffswitch">
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="Tele">
                                        <a href="javascript:void(0);"
                                            onclick="window.open('https://telegram.me/'+getComputedStyle(document.querySelector('#Kontak .Tele .onoffswitch-inner'), ':before').getPropertyValue('content').replace('&quot;','').replace('&quot;',''))"
                                            title="Telegram" target="_blank">
                                            <svg viewBox="0 0 24 24">
                                                <path
                                                    d="M9.78,18.65L10.06,14.42L17.74,7.5C18.08,7.19 17.67,7.04 17.22,7.31L7.74,13.3L3.64,12C2.76,11.75 2.75,11.14 3.84,10.7L19.81,4.54C20.54,4.21 21.24,4.72 20.96,5.84L18.24,18.65C18.05,19.56 17.5,19.78 16.74,19.36L12.6,16.3L10.61,18.23C10.38,18.46 10.19,18.65 9.78,18.65Z">
                                                </path>
                                            </svg>
                                            <div class="onoffswitch">
                                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"
                                                    id="myonoffswitch" checked>
                                                <label class="onoffswitch-label" for="myonoffswitch">
                                                    <span class="onoffswitch-inner"></span>
                                                </label>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <big>
                                        <a href="index.php">Klik Disini. Untuk mencoba aplikasi</a>
                                    </big>
                                    </br>
                                    username: demo<br />
                                    password: demo<br />
                                </div>
                            </div>
                        </div>
                        <?php 	
							} else {
								?>
                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form id="register" name="register" method="POST" action="">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control form-control-lg" type="text" id="NamaID"
                                                name="Nama" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg" type="email" id="EmailID"
                                                name="Email" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control form-control-lg" type="text" id="UsernameID"
                                                name="Username" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control form-control-lg" type="password" id="PasswordID"
                                                name="Password" required />
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telp</label>
                                            <input class="form-control form-control-lg" type="text" id="NoTelpID"
                                                name="NoTelp" required />
                                            <small>
                                                <a href="index.php">Sudah punya akun? Klik untuk login.</a>
                                            </small>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" name="mode" value="register"
                                                class="btn btn-lg btn-primary">Daftar</button>
                                        </div>
                                    </form>
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
    </main>
    <script src="<?php echo $site_url;?>/assets/js/app.js"></script>
    <script src="<?php echo $site_url;?>/assets/js/auth.js"></script>
</body>

</html>