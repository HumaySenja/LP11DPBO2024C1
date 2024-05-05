<?php

include ("KontrakPresenter.php");


class ProsesPasien implements KontrakPresenter
{
	private $tabelpasien;
	private $data = [];

	private $datasingle;

	function __construct()
	{
		//konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "mvp_php"; // nama basis data
			$this->tabelpasien = new TabelPasien($db_host, $db_user, $db_password, $db_name); //instansi TabelPasien
			$this->data = array(); //instansi list untuk data Pasien
			//data = new ArrayList<Pasien>;//instansi list untuk data Pasien
		} catch (Exception $e) {
			echo "wiw error" . $e->getMessage();
		}
	}

	function prosesDataPasien()
	{
		try {
			//mengambil data di tabel pasien
			$this->tabelpasien->open();
			$this->tabelpasien->getPasien();
			while ($row = $this->tabelpasien->getResult()) {
				//ambil hasil query
				$pasien = new Pasien(); //instansiasi objek pasien untuk setiap data pasien
				$pasien->setId($row['id']); //mengisi id
				$pasien->setNik($row['nik']); //mengisi nik
				$pasien->setNama($row['nama']); //mengisi nama
				$pasien->setTempat($row['tempat']); //mengisi tempat
				$pasien->setTl($row['tl']); //mengisi tl
				$pasien->setGender($row['gender']); //mengisi gender
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']);


				$this->data[] = $row; //tambahkan data pasien ke dalam list
			}
			//tutup koneksi
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function prosesDataPasienbyID($id)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->getPasienbyID($id);
			if ($row = $this->tabelpasien->getResult()) {
				// Jika data ditemukan, proses data pasien
				$pasien = new Pasien();
				$pasien->setId($row['id']);
				$pasien->setNik($row['nik']);
				$pasien->setNama($row['nama']);
				$pasien->setTempat($row['tempat']);
				$pasien->setTl($row['tl']);
				$pasien->setGender($row['gender']);
				$pasien->setEmail($row['email']);
				$pasien->setTelp($row['telp']);

				$this->datasingle = $pasien; // Tambahkan data pasien ke dalam list jika diperlukan
			}
			$this->tabelpasien->close();
		} catch (Exception $e) {
			// Memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}


	function addDataPasien($data)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->addPasien($data);
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function deleteDataPasien($id)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->deletePasien($id);
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function updateDataPasien($data)
	{
		try {
			$this->tabelpasien->open();
			$this->tabelpasien->updatePasien($data);
			$this->tabelpasien->close();
		} catch (Exception $e) {
			//memproses error
			echo "wiw error part 2" . $e->getMessage();
		}
	}

	function getId($i)
	{
		//mengembalikan id Pasien dengan indeks ke i
		return $this->data[$i]['id'];
	}
	function getNik($i)
	{
		//mengembalikan nik Pasien dengan indeks ke i
		return $this->data[$i]['nik'];
	}
	function getNama($i)
	{
		//mengembalikan nama Pasien dengan indeks ke i
		return $this->data[$i]['nama'];
	}
	function getTempat($i)
	{
		//mengembalikan tempat Pasien dengan indeks ke i
		return $this->data[$i]['tempat'];
	}
	function getTl($i)
	{
		//mengembalikan tanggal lahir(TL) Pasien dengan indeks ke i
		return $this->data[$i]['tl'];
	}
	function getGender($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['gender'];
	}
	function getEmail($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['email'];
	}
	function getTelp($i)
	{
		//mengembalikan gender Pasien dengan indeks ke i
		return $this->data[$i]['telp'];
	}

	function getIdSatu()
	{
		return $this->datasingle->getId();
	}
	function getNikSatu()
	{
		return $this->datasingle->getNik();
	}
	function getNamaSatu()
	{
		return $this->datasingle->getNama();
	}
	function getTempatSatu()
	{
		return $this->datasingle->getTempat();
	}
	function getTlSatu()
	{
		return $this->datasingle->getTl();
	}
	function getGenderSatu()
	{
		return $this->datasingle->getGender();
	}
	function getEmailSatu()
	{
		return $this->datasingle->getEmail();
	}
	function getTelpSatu()
	{
		return $this->datasingle->getTelp();
	}

	function getSize()
	{
		return sizeof($this->data);
	}
}
