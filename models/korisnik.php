<?php

class Korisnik{

    public $korisnikID;
    public $username;
    public $password;
    

    public function __construct($korisnikID=null,$username=null,$password=null)
    {
        $this->korisnikID = $korisnikID;
        $this->username=$username;
        $this->password=$password;
    }

    public static function login($korisnik, mysqli $konekcija)
    {
        $query = "SELECT * FROM korisnik WHERE username='$korisnik->username' and password='$korisnik->password'";
        return $konekcija->query($query);
    }

}

