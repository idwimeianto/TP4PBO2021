<?php 

/******************************************
PRAKTIKUM RPL
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask($sort = "", $id = ""){
		// Query mysql select data ke tb_to_do
		if ($id != "") {
			$query = "SELECT * FROM list_penghutang WHERE id='$id'";
		}
		else if ($sort == "" || $sort == "reset") {
			$query = "SELECT * FROM list_penghutang";
		}
		else {
			$query = "SELECT * FROM list_penghutang ORDER BY $sort ASC";
		}

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	// function 

	function setTask($tname, $tnohp, $tjumlah, $tdeadline, $tdetails) {
		$query = "INSERT INTO list_penghutang (nama, no_hp, jumlah, deadline, detail, status) ";
		$query .= "VALUES ('$tname', '$tnohp', '$tjumlah', '$tdeadline', '$tdetails', 'Belum Lunas')";

		return $this->execute($query);
	}

	function editTask($id, $tname, $tnohp, $tjumlah, $tdeadline, $tdetails, $tstatus) {
		$query = "UPDATE list_penghutang SET nama='$tname', no_hp='$tnohp', jumlah='$tjumlah', deadline='$tdeadline',";
		$query .= "detail='$tdetails', status='$tstatus' WHERE id='$id'";

		return $this->execute($query);
	}


	function delTask($id) {
		$query = "DELETE FROM list_penghutang WHERE id = '$id'";

		return $this->execute($query);
	}

	function statusTask($id) {
		$query = "UPDATE list_penghutang set status = 'Lunas' WHERE id = '$id'";

		return $this->execute($query);
	}
}



?>
