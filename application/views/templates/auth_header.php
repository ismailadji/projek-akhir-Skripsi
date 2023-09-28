<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $judul; ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?= base_url()?>assets/plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif] -->

        <!-- Google Font -->
        <link rel="stylesheet" href="<?= base_url()?>assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            <style>
                .box_tengah{
                    height:100%;
                    width:200px;
                    border:solid 0px red;
                    margin:0 auto;
                    display: table;
                }
                .login{
                    font-size: 30px;
                    font-weight: bold;
                    color: black;
                }
                .body{
                    background :url(<?= base_url()?>assets/image/profil_perpus/profil3.jpg) no-repeat;
                    /* background :; */
                    background-size: cover;
                    height: 100%;  

                }
            </style>

            <style>
		        .sidebar{ width: 350px; margin:auto; padding: 10px }
		        .camera{ width: 850px; margin:auto; }
	        </style>
            
	        <script src="<?= base_url()?>assets/js/jquery-3.4.1.min.js"></script>
            <!-- scanner -->
            <script src="<?= base_url()?>assets/scanner/vendor/modernizr/modernizr.js"></script>
            <script src="<?= base_url()?>assets/scanner/vendor/vue/vue.min.js"></script>
    </head>

    <body class="hold-transition login-page">