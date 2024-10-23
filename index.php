<?php
session_start();
require_once "_config/config.php"; 

if ($_SESSION['hak_akses']==="manajer")
{
	echo "<script>window.location='".base_url('manajer/analisis_asosiasi')."';</script>";
}
else if ($_SESSION['hak_akses']==="admin")
{
	echo "<script>window.location='".base_url('admin/transaksi_penjualan')."';</script>";
}
else
{
	echo "<script>window.location='".base_url('_auth/login.php')."';</script>";
}
?>