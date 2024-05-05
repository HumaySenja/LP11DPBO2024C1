<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilUpdatePasien implements KontrakView 
{
    private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        //konstruktor
        $this->prosespasien = new ProsesPasien();
    }

    function tampil($id)
    {
        $this->prosespasien->prosesDataPasienbyID($id);
        $data = null;

        //semua terkait tampilan adalah tanggung jawab view
        $data .= '<div class="form-group">
        <input type="hidden" class="form-control" id="id" name="id" value="'.$this->prosespasien->getIDSatu().'" required>
      </div>
        <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" id="nik" name="nik" value="'.$this->prosespasien->getNikSatu().'" required>
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="'.$this->prosespasien->getNamaSatu().'" required>
      </div>
      <div class="form-group">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat" value="'.$this->prosespasien->getTempatSatu().'" required>
      </div>
      <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tl" value="'.$this->prosespasien->getTlSatu().'" required>
      </div>
      <div class="form-group">
    <label for="gender">Gender</label>
    <select name="gender" class="form-control" required> 
                <option value="Laki-laki" '. ($this->prosespasien->getGenderSatu() == "Laki-laki" ? "selected" : "") .'>Laki-laki</option>
                <option value="Perempuan" '. ($this->prosespasien->getGenderSatu() == "Perempuan" ? "selected" : "") .'>Perempuan</option>
            </select>
</div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="'.$this->prosespasien->getEmailSatu().'" required>
      </div>
      <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="tel" class="form-control" id="telepon" name="telp" value="'.$this->prosespasien->getTelpSatu().'" required>
      </div>';

        // Membaca template skin.html
        $this->tpl = new Template("templates/update.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_FORM", $data);
        // Menampilkan ke layar
        $this->tpl->write();
    }

    function updatePasien($data)
    {
        $this->prosespasien->updateDataPasien($data);
    }
}