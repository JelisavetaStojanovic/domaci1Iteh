<?php
require 'brokerBaze.php';
require "models/mec.php";

$turnir = trim($_GET['turnir']);
$sort = trim($_GET['sort']);

$mecevi = Mec::pretraziMeceve($turnir, $sort, $konekcija);
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Igraci</th>
            <th>Turnir</th>
            <th>Faza</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tbody>



<?php

foreach ($mecevi as $mec) {
    ?>
    <tr>
        <td><?= $mec->ime . " " . $mec->prezime . " - " . $mec->protivnik?></td>
        <td><?= $mec->naziv ?></td>
        <td><?= $mec->faza ?></td>
        <td><?= $mec->datum ?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
