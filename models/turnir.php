<?php

class Turnir {

    public $turnirID;
    public $naziv;

    public function __construct($turnirID=null,$naziv=null)
    {
        $this->turnirID = $turnirID;
        $this->naziv=$naziv;
    }

    public static function vratiTurnire(mysqli $konekcija)
    {
        $sql = "SELECT * FROM turnir";
        $resultSet = $konekcija->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

}

