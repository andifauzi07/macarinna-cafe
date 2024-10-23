<?php
session_start();
require_once "../../_config/config.php";

if (!isset($_SESSION['username']))
{
  echo "<script>window.location='".base_url('_auth/login.php')."';</script>";
}
else if ($_SESSION['hak_akses']!="admin")
{
  echo "<script>window.location='".base_url()."';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Maccarinna Kaffe</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">
    <link href="<?=base_url('_assets/libs/alert/css/sweetalert.css')?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/datepicker/css/bootstrap-datepicker.css')?>" rel="stylesheet">
    <link href="<?=base_url('_assets/libs/DataTables/datatables.min.css')?>" rel="stylesheet">
    <link rel="icon" href="<?=base_url('_assets/title.png')?>">
    <script src="<?=base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('_assets/js/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/alert/js/sweetalert.min.js')?>"></script>
    <script src="<?=base_url('_assets/libs/alert/js/qunit-1.18.0.js')?>"></script>
    <script src="<?=base_url('_assets/libs/datepicker/js/bootstrap-datepicker.js')?>"></script>
    <script src="<?=base_url('_assets/libs/DataTables/datatables.min.js')?>"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="#" style="color: #ffff;"><strong><em>Maccarinna Kaffe</em></strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="<?=base_url('admin/transaksi_penjualan/data.php')?>""><i class="fa fa-fw fa-shopping-cart"></i>&nbsp; Transaksi Penjualan <span class="sr-only">(current)</span></a></li>
            <li><a href="<?=base_url('admin/menu/data.php')?>""><i class="fa fa-fw fa-book"></i>&nbsp; Data Menu <span class="sr-only">(current)</span></a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #ffff;"><i class="fa fa-user"></i> &nbsp;<?=$_SESSION['username'];?> as <?=$_SESSION['hak_akses'];?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#" id="<?=$_SESSION['username']; ?>" data-target="#ModalPass" data-toggle="modal"><i class="fa fa-fw fa-key"></i> Ubah Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?=base_url('_auth/logout.php')?>"><i class="fa fa-fw fa-power-off"></i> Keluar</a>
                        </li>
                    </ul>
                </li>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">

