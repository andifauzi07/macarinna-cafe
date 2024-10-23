<?php
session_start();
require_once '../_config/config.php';


// Hapus semua sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman utama
echo "<script>window.location='".base_url('_auth/login.php')."';</script>";
?>
