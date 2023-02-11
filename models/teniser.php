<?php

class Teniser{

    public $teniserID;
    public $ime;
    public $prezime;
    public $zemlja;

    public function __construct($teniserID=null,$ime=null,$prezime=null,$zemlja=null)
    {
        $this->teniserID = $teniserID;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->zemlja = $zemlja;
    }
   
    public static function vratiTenisera($teniserID, mysqli $konekcija)
    {
        $sql = "SELECT * FROM teniser WHERE teniserID = ". $teniserID;
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function vratiTenisere(mysqli $konekcija)
    {
        $sql = "SELECT * FROM teniser";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }
}


?>