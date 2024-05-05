<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilPasien.php");


$tp = new TampilPasien();
// $tp2 = new TampilUpdatePasien();
if (!empty($_GET['idhapus'])) {
    //memanggil add
    $data = $tp->deletePasien($_GET['idhapus']);
    header("location:index.php");
}
else{
    $data = $tp->tampil();
}