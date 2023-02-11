<?php

require "brokerBaze.php";
require "models/korisnik.php";

$poruka= "";

session_start();
if(isset($_POST['username']) && isset($_POST['password'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    
    $korisnik = new Korisnik(1, $u, $p);
    $odgovor = Korisnik::login($korisnik, $konekcija);
    
    if($odgovor->num_rows==1){
        $_SESSION['user_id'] = $korisnik->korisnikID;
        setcookie("korisnik", $korisnik->username, time() + 3600);
        header('Location: home.php');
        exit();
    }else{
        $poruka = "Pogrešni kredencijali, pokusajte ponovo!";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Tenis</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <div style="height: 50px; background-color: teal;"></div>
    

    <div class="login-form">
        <div class="main-div">
            <form method="post" action="">
                <br><br><br><br>
                <br>
                <div class="container" style="width: 30%; margin: auto;">
                    <h5><?= $poruka; ?></h5>
                    <label class="username">Korisničko ime</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <br>
                    <button type="submit" class="btn btn-primary" style="background-color: teal; border: 1px teal;" name="submit">Prijavi se</button>
                </div>
            </form>
        </div>
    </div>

    <br>

    <div style="height: 100px; background-color: teal; margin-top:250px"></div>

</body>
</html>