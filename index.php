<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

if (isset($_POST['add'])) {
	$otask->setTask($_POST['tname'], $_POST['tnohp'], $_POST['tjumlah'], $_POST['tdeadline'], $_POST['tdetails']);
}

if (isset($_GET['id_hapus'])) {
	if ($_GET['id_hapus'] !== '') {
		$otask->delTask($_GET['id_hapus']);
	}
}

if (isset($_GET['id_status'])) {
	if ($_GET['id_status'] !== '') {
		$otask->statusTask($_GET['id_status']);
	}
}

// Memanggil method getTask di kelas Task
if(isset($_POST['sort'])) {
	$otask->getTask($_POST['sort']);
}
else {
	$otask->getTask();
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

while (list($id, $tname, $tnohp, $tjumlah, $tdeadline, $tdetails, $tstatus) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if($tstatus == "Lunas"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tname . "</td>
		<td>" . $tnohp . "</td>
		<td>Rp" . number_format($tjumlah,2,",",".") . "</td>
		<td>" . $tdeadline . "</td>
		<td>" . $tdetails . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-info' ><a href='edit.php?id=" . $id .  "' style='color: white; font-weight: bold;'>Edit</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status task nya belum dikerjakan
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $tname . "</td>
		<td>" . $tnohp . "</td>
		<td>Rp" . number_format($tjumlah,2,",",".") . "</td>
		<td>" . $tdeadline . "</td>
		<td>" . $tdetails . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		<button class='btn btn-info' ><a href='edit.php?id=" . $id .  "' style='color: white; font-weight: bold;'>Edit</a></button>
		</td>
		</tr>";
		$no++;
	}
}

// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();