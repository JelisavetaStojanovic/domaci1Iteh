<?php

$konekcija = new mysqli("localhost", "root", "" , "tenis");

if ($konekcija->connect_errno){
    exit("Nije moguce povezivanje na bazu");
}
?>