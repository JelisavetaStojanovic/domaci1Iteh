<?php

require 'brokerBaze.php';
require "models/mec.php";

$mecevi = Mec::vratiMeceve($konekcija);

foreach ($mecevi as $mec) {
    ?>
<option value="<?= $mec->mecID ?>"><?= $mec->ime . " " . $mec->prezime . " - " . $mec->protivnik . " (" . $mec->naziv . ") "?></option>
<?php
}
