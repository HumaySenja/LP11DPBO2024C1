<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function getPasienbyID($id)
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien WHERE id = $id";
		// Mengeksekusi query
		return $this->execute($query);
	}


	public function addPasien($data)
	{
		// Ekstrak nilai-nilai dari data
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat'];
		$tanggal_lahir = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telp'];

		// Membuat query SQL untuk menambahkan pasien ke dalam tabel pasien
		$query = "INSERT INTO pasien (id, nik, nama, tempat, tl, gender, email, telp) 
                  VALUES ('', '$nik', '$nama', '$tempat_lahir', '$tanggal_lahir', '$gender', '$email', '$telepon')";
		return $this->execute($query);
	}

	public function deletePasien($id)
	{
		$query = "DELETE FROM pasien WHERE id = $id";
		return $this->execute($query);
	}

	public function updatePasien($data)
	{
		$id = $data['id'];
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat_lahir = $data['tempat'];
		$tanggal_lahir = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telepon = $data['telp'];

		// Membuat query SQL untuk mengupdate pasien dalam tabel pasien
		$query = "UPDATE pasien 
              SET nik='$nik', nama='$nama', tempat='$tempat_lahir', tl='$tanggal_lahir', gender='$gender', email='$email', telp='$telepon' 
              WHERE id='$id'";

		// Jalankan query update
		return $this->execute($query);
	}
}
