<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilAddPasien implements KontrakView
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
        $data = null;

        //semua terkait tampilan adalah tanggung jawab view
        $data .= '<div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
      </div>
      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat" placeholder="Masukkan Tempat Lahir" required>
      </div>
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tl" required>
      </div>
      <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="tel" class="form-control" id="telepon" name="telp" placeholder="Masukkan Nomor Telepon" required>
      </div>';

        // Membaca template skin.html
        $this->tpl = new Template("templates/tambah.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_FORM", $data);
        // Menampilkan ke layar
        $this->tpl->write();
    }

    function addPasien($data)
    {
        $this->prosespasien->addDataPasien($data);
    }
}