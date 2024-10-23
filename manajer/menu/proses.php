<?php
require_once "../../_config/config.php";

if (isset($_POST['add']))
{
	$kd_menu = trim(mysqli_real_escape_string($con, $_POST['kd_menu']));
	$menu = trim(mysqli_real_escape_string($con, $_POST['menu']));
	$sejakk = $_POST['sejak'];
	$sejak = date('Y-m-d', strtotime($sejakk));
	$harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
	$kd_kategori = trim(mysqli_real_escape_string($con, $_POST['kd_kategori']));

	$pict = $_FILES['gambar']['name'];
	$extensi = explode(".", $_FILES['gambar']['name']);
	$gambar = 'menu-'.round(microtime(true)).".".end($extensi);
	$sumber = $_FILES['gambar']['tmp_name'];

	if ($pict == '') {
		mysqli_query($con, "INSERT INTO tb_menu (kd_menu, menu, harga, sejak, kd_kategori) VALUES ('$kd_menu', '$menu', '$harga', '$sejak', '$kd_kategori')") or die (mysqli_error($con));
		echo "<script>alert('Data berhasil diinput'); window.location='data.php';</script>";
	} else {

	$location = "../../_assets/img/menu/";
	$upload = move_uploaded_file($sumber, $location.$gambar);
		if($upload) {
			$cek = mysqli_query($con, "INSERT INTO tb_menu (kd_menu, menu, harga, sejak, kd_kategori, gambar) VALUES ('$kd_menu', '$menu', '$harga', '$sejak', '$kd_kategori', '$gambar')");
				echo "<script>alert('Data berhasil diinput. '); window.location='data.php';</script>";
		} else {
			echo "<script>alert('Data gagal diinput. Pastikan gambar yang di input, maksimal berukuran 1.5 MB'); window.location='data.php';</script>";
		}
	}
}

else if (isset($_POST['edit']))

{
	$kd_menu = $_POST['kd_menu'];
	$menu = trim(mysqli_real_escape_string($con, $_POST['menu']));
	$sejakk = $_POST['sejak'];
	$sejak = date('Y-m-d', strtotime($sejakk));
	$harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
	$kd_kategori = trim(mysqli_real_escape_string($con, $_POST['kd_kategori']));

	$pict = $_FILES['gambar']['name'];
	$extensi = explode(".", $_FILES['gambar']['name']);
	$gambar = 'menu-'.round(microtime(true)).".".end($extensi);
	$sumber = $_FILES['gambar']['tmp_name'];

	if ($pict == '') {
		mysqli_query($con, "UPDATE tb_menu SET menu = '$menu', harga = '$harga', sejak = '$sejak', kd_kategori = '$kd_kategori' WHERE kd_menu = '$kd_menu'") or die (mysqli_error($con));
		echo "<script>alert('Data berhasil di ubah'); window.location='data.php';</script>";
	} else {
		
		$location = "../../_assets/img/menu/";
		$upload = move_uploaded_file($sumber, $location.$gambar);
		
		if ($upload) {
			$sql = mysqli_query($con, "SELECT kd_menu, menu, harga, sejak, kd_kategori, gambar FROM tb_menu WHERE kd_menu = '$kd_menu'") or die (mysqli_error($con));
			$data = mysqli_fetch_array($sql);
			$gambar_awal = $data['gambar'];
			unlink("../../_assets/img/menu/".$gambar_awal);

			mysqli_query($con, "UPDATE tb_menu SET menu = '$menu', harga = '$harga', sejak = '$sejak', kd_kategori = '$kd_kategori', gambar = '$gambar' WHERE kd_menu = '$kd_menu'") or die (mysqli_error($con));
			echo "<script>alert('Data berhasil di ubah'); window.location='data.php';</script>";
		} else {
			echo "<script>alert('Data gagal diubah. Pastikan gambar yang di input, maksimal berukuran 1.5 MB'); window.location='data.php';</script>";
		}
	}
	
}
?>