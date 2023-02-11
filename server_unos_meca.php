<?php
require 'brokerBaze.php';
require "models/mec.php";

$teniser = trim($_POST['teniser']);
$protivnik = trim($_POST['protivnik']);
$datum = trim($_POST['datum']);
$faza = trim($_POST['faza']);
$turnir = trim($_POST['turnir']);

$datum2 = date("Y-m-d", strtotime($datum));


if(Mec::unesiMec($teniser, $protivnik , $datum2 , $faza , $turnir, $konekcija)){
    echo "Uspesno unet novi mec";
}else{
    echo "Doslo je do greske";
}
