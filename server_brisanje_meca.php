<?php
require 'brokerBaze.php';
require "models/mec.php";

$mec = trim($_POST['mec']);

if(Mec::obrisiMec($mec, $konekcija)){
    echo "Uspesno brisanje meca";
}else{
    echo "Doslo je do greske";
}