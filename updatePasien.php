<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Pasien.class.php");
include("model/TabelPasien.class.php");
include("view/TampilUpdatePasien.php");


$tp = new TampilUpdatePasien();
// $tp2 = new TampilUpdatePasien();


if (isset($_POST['submit'])) {
    //memanggil add
    $data = $tp->updatePasien($_POST);
    header("location:index.php");
}else{
    $data = $tp->tampil($_GET['idupdate']);
}
