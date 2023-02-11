<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$cookie="";

if (isset($_COOKIE["korisnik"])){
    $cookie="Zdravo, " . $_COOKIE["korisnik"] . "!";
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
 
    </head>
    
    <body>

    <div style="height: 50px; background-color: teal;"></div>
        <section class="section" id="pretraga" style="padding-top: 100px">
            <div class="container" style="margin-top: 20px">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <h2 style="color: white; text-shadow: 3px 5px grey; font-size: 40px">Teniski mecevi</h2>
                            <h4 id="cookie"><?= $cookie; ?></h4>
                            <h5 id="info"></h5>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-3 text-center">
                <button id="btn-dodaj" type="button" class="btn btn-success" style="background-color: teal; border: 1px teal;" data-toggle="modal" data-target="#myModal-D">Dodaj mec</button>
                <button id="btn-izmeni" type="button" class="btn btn-success" style="background-color: teal; border: 1px teal;" data-toggle="modal" data-target="#myModal-I">Izmeni mec</button>
                <button id="btn-obrisi" type="button" class="btn btn-success" style="background-color: teal; border: 1px teal;" data-toggle="modal" data-target="#myModal-O">Obrisi mec</button>
            </div>
            
            <div class="row" style="width:30%; margin:auto; margin-top: 5%">
                <label for="turnir-P">Turnir</label>
                <select class="form-control" id="turnir-P"></select>
                <label for="sort-P">Datum</label>
                <select class="form-control" id="sort-P">
                    <option value="asc">Rastuci poredak</option>
                    <option value="desc">Opadajuci poredak</option>
                </select>
            </div>
            <br><br>
            <div class="col-lg-4 offset-lg-4 text-center">
                <button class="btn btn-primary" style="background-color: teal; border: 1px teal;" onclick="pretraga()">Pretrazi</button>
            </div>
            
            <div class="row" id="rezultat" style="padding-top: 10px; width: 90%; margin: auto;"></div>
        </section>

<!------------------ DODAJ -------------------------------->
    <div class="modal fade" id="myModal-D" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <h2 style="color: black; text-align: left; width: 500px;">Dodaj mec</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="teniser-D">Prvi teniser</label>
                                        <select name="teniser-D" id="teniser-D" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="protivnik-D">Drugi teniser</label>
                                        <select name="protivnik-D" id="protivnik-D" style="border: 1px solid black" class="form-control">
                                            <option value="Carlos Alcaraz">Carlos Alcaraz</option>
                                            <option value="Rafael Nadal">Rafael Nadal</option>
                                            <option value="Stefanos Tsitsipas">Stefanos Tsitsipas</option>
                                            <option value="Casper Ruud">Casper Ruud</option>
                                            <option value="Daniil Medvedev">Daniil Medvedev</option>
                                            <option value="Felix Auger-Aliassime">Felix Auger-Aliassime</option>
                                            <option value="Anrdey Rublev">Anrdey Rublev</option>
                                            <option value="Novak Djokovic">Novak Djokovic</option>
                                            <option value="Taylor Fritz">Taylor Fritz</option>
                                            <option value="Holger Rune">Holger Rune</option>
                                        </select>

                                        <label for="turnir-D">Turnir</label>
                                        <select name="turnir-D" id="turnir-D" style="border: 1px solid black" class="form-control"></select>
                                        
                                        <label for="faza-D">Faza</label>
                                        <select class="form-control" id="faza-D">
                                            <option value="1. faza">1. faza</option>
                                            <option value="2. faza">2. faza</option>
                                            <option value="Cetvrtfinale">Cetvrtfinale</option>
                                            <option value="Polufinale">Polufinale</option>
                                            <option value="Finale">Finale</option>
                                        </select>

                                        <label for="datum-D">Datum</label>
                                        <input type="date" class="form-control" id="datum-D">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button id="btnDodaj" type="button" class="btn btn-success btn-block" style="background-color: teal; border: 1px teal;" onclick="dodajMec()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 50px; background-color: teal; margin-top: 100px"></div>


<!------------------ IZMENI -------------------------------->
    <div class="modal fade" id="myModal-I" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <h2 style="color: black; text-align: left; width: 500px;">Izmeni mec</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="mec-I">Odaberi mec</label>
                                        <select name="mec-I" id="mec-I" style="border: 1px solid black" class="form-control"></select><br>

                                        <label for="datum-I">Datum</label>
                                        <input type="date" class="form-control" id="datum-I">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: teal; border: 1px teal;" onclick="izmeniMec()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!------------------ OBRISI -------------------------------->
    <div class="modal fade" id="myModal-O" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <h2 style="color: black; text-align: left; width: 500px;">Obrisi mec</h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="mec-O">Odaberi mec</label>
                                        <select name="mec-O" id="mec-O" style="border: 1px solid black" class="form-control"> </select>
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: teal; border: 1px teal;" onclick="obrisiMec()">Obrisi</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>

        function popuniTurnire() {
            $.ajax({
                url: 'server_turniri.php',
                success: function (data) {
                    let t = "<option value='0'>Svi</option>" + data;
                    $("#turnir-P").html(t);
                }
            })
        }

        function popuniTurnireD() {
            $.ajax({
                url: 'server_turniri.php',
                success: function (data) {
                    $("#turnir-D").html(data);
                }
            })
        }

        function popuniMeceve() {
            $.ajax({
                url: 'server_mecevi.php',
                success: function (data) {
                    $("#mec-I").html(data);
                    $("#mec-O").html(data);
                }
            })
        }

        function popuniTenisere() {
            $.ajax({
                url: 'server_teniseri.php',
                success: function (data) {
                    $("#teniser-D").html(data);
                    $("#teniser-O").html(data);
                    
        
                }
            })
        }
        
        function pretraga() {
        

            let turnir = $("#turnir-P").val();
            let sort = $("#sort-P").val();

            $.ajax({
                url: 'server_pretraga.php',
                data: {
                    turnir: turnir,
                    sort: sort
                },
                success: function (data) {

                    $("#rezultat").html(data);
                }
            })
        }
        popuniTurnireD();
        popuniTurnire();
        popuniTenisere();
        popuniMeceve();

        function dodajMec() {
            let teniser = $("#teniser-D").val();
            let protivnik = $("#protivnik-D").val();
            let datum = $("#datum-D").val();
            let faza = $("#faza-D").val();
            let turnir = $("#turnir-D").val();
            
            $.ajax({
                url: 'server_unos_meca.php',
                method: 'post',
                data: {
                    teniser: teniser,
                    protivnik: protivnik,
                    datum: datum,
                    faza: faza,
                    turnir: turnir
                },
                success: function (data) {
                    $("#info").html(data);
                    popuniMeceve();
                    pretraga();
                }
            })
        }

        function izmeniMec() {
            let mec = $("#mec-I").val();
            let datum = $("#datum-I").val();
            $.ajax({
                url: 'server_izmena_meca.php',
                method: 'post',
                data: {
                    mec: mec,
                    datum: datum
                },
                success: function (data) {

                    $("#info").html(data);
                    popuniMeceve();
                    pretraga();
                }
            })
        }

        function obrisiMec() {
            let mec = $("#mec-O").val();
            $.ajax({
                url: 'server_brisanje_meca.php',
                method: 'post',
                data: {
                    mec: mec
                },
                success: function (data) {

                    $("#info").html(data);
                    popuniMeceve();
                    pretraga();
                }
            })
        }

    </script>
  </body>
</html>