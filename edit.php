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

if (isset($_POST['edit'])) {
	$otask->editTask($_POST['id'], $_POST['tname'], $_POST['tnohp'], $_POST['tjumlah'], $_POST['tdeadline'], $_POST['tdetails'], $_POST['tstatus']);
    header('Location: index.php');
}

// Memanggil method getTask di kelas Task
if(isset($_POST['sort'])) {
	$otask->getTask($_POST['sort']);
}
else {
	$otask->getTask('', $_GET['id']);
}

// Proses mengisi tabel dengan data
$data = null;
$no = 1;

list($id, $tname, $tnohp, $tjumlah, $tdeadline, $tdetails, $tstatus) = $otask->getResult();

if ($tstatus == "Lunas") {
    $lunas_checked = "checked";
    $belum_lunas_checked = "";
}
else {
    $lunas_checked = "";
    $belum_lunas_checked = "checked";
}

$data = '
    <form action="edit.php?id='.$id.'" method="POST">
        <input type="hidden" class="form-control" name="id" value="'. $id.'" required />
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tname">Nama</label>
                <input type="text" class="form-control" name="tname" value="'. $tname.'" required />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tjumlah">Jumlah</label>
                <input class="form-control" type="number" name="tjumlah" name="tjumlah" value="'. $tjumlah.'"  min="0" required />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tnohp">No HP</label>
                <input class="form-control" type="text" name="tnohp" name="tnohp" value="'. $tnohp.'" required />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tdeadline">Deadline</label>
                <input class="form-control" type="date" name="tdeadline" name="tdeadline" value="'. $tdeadline.'" required />
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-2">
                <label for="tdetail">Detail</label>
                <textarea class="form-control" name="tdetails" rows="3" required>'. $tdetails.'</textarea>
            </div>
        </div>
        <div class="form-check">
            <div class="form-group col-md-2">
                <input class="form-check-input" type="radio" value="Belum Lunas" name="tstatus" id="tstatus1"
                '.$belum_lunas_checked.'>
                <label class="form-check-label" for="tstatus1">
                    Belum Lunas
                </label>
            </div>
            <div class="form-group col-md-2">
                <input class="form-check-input" type="radio" value="Lunas" name="tstatus" id="tstatus2"
                '.$lunas_checked.'>
                <label class="form-check-label" for="tstatus2">
                    Lunas
                </label>
            </div>
        </div>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
    </form>
    ';

// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin_edit.html");

// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_FORM", $data);

// Menampilkan ke layar
$tpl->write();