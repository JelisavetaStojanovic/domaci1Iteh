<?php
require 'brokerBaze.php';
require "models/mec.php";

$mec = trim($_POST['mec']);
$datum = trim($_POST['datum']);
$datum2 = date("Y-m-d", strtotime($datum));

if(Mec::izmeniMec($mec , $datum2, $konekcija)){
    echo "Uspesno izmenjen datum meca";
}else{
    echo "Doslo je do greske";
}
