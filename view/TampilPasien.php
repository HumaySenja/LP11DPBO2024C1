<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil($id = null)
    {
        $this->prosespasien->prosesDataPasien();
        $data = null;

        //semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
            <td>" . $no . "</td>
            <td>" . $this->prosespasien->getNik($i) . "</td>
            <td>" . $this->prosespasien->getNama($i) . "</td>
            <td>" . $this->prosespasien->getTempat($i) . "</td>
            <td>" . $this->prosespasien->getTl($i) . "</td>
            <td>" . $this->prosespasien->getGender($i) . "</td>
            <td>" . $this->prosespasien->getEmail($i) . "</td>
            <td>" . $this->prosespasien->getTelp($i) . "</td>
            <td><a href='updatePasien.php?idupdate=" . $this->prosespasien->getId($i) . "' class='btn btn-success'>Edit</a>
			<a href='index.php?idhapus=" . $this->prosespasien->getId($i) . "' class='btn btn-danger'>Delete</a></td>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menambahkan tombol "Tambah Pasien" di luar tabel
        $tombolTambahPasien = "<a href='tambahPasien.php' class='btn btn-primary'>Tambah Pasien</a>";
        $this->tpl->replace("TAMBAH_PASIEN", $tombolTambahPasien);

        // Menampilkan ke layar
        $this->tpl->write();
    }

	function deletePasien($id)
    {
        $this->prosespasien->deleteDataPasien($id);
    }
	function updatePasien($id)
    {
        $this->prosespasien->updateDataPasien($id);
    }
}