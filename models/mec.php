<?php


class Mec{

   public $mecID;
   public $teniserID;
   public $protivnik;
   public $faza;
   public $turnirID;
  
    public function __construct($mecID=null, $teniserID=null, $protivnik=null, $faza=null, $turnirID=null)
    {
        $this->mecID = $mecID;
        $this->teniserID=$teniserID;
        $this->protivnik=$protivnik;
        $this->faza=$faza;
        $this->turnirID=$turnirID;
    }

    public static function pretraziMeceve($turnir, $sort, mysqli $konekcija)
    {
        $sql = "SELECT * FROM mec m join teniser t on m.teniserID = t.teniserID join turnir tur on m.turnirID = tur.turnirID";
        
        if($turnir != "0"){
            $sql .= " WHERE m.turnirID = " . $turnir;
        }
        $sql.= " ORDER BY m.datum " . $sort;


        $resultSet = $konekcija->query($sql);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    
    public static function vratiMeceve(mysqli $konekcija)
    {
        $sql = "SELECT * FROM mec m join teniser t on m.teniserID = t.teniserID join turnir tur on m.turnirID = tur.turnirID";
        $resultSet = $konekcija->query($sql);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }


    public static function unesiMec($teniser, $protivnik, $datum, $faza, $turnir, mysqli $konekcija)
    {
        return $konekcija->query("INSERT INTO mec VALUES(null, '$teniser' , '$protivnik', '$datum' , '$faza', '$turnir' )");  
    }

    public static function izmeniMec($mecID, $datum, mysqli $konekcija)
    {
        return $konekcija->query("UPDATE mec SET datum = '$datum' WHERE mecID = $mecID");
    }

    public static function obrisiMec($mecID, mysqli $konekcija)
    {
        return $konekcija->query("DELETE FROM mec WHERE mecID = $mecID");
    }
}