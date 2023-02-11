<?php

require 'brokerBaze.php';
require "models/turnir.php";

$turniri = Turnir::vratiTurnire($konekcija);

foreach ($turniri as $turnir) {
    ?>
<option value="<?= $turnir->turnirID ?>"><?= $turnir->naziv?></option>
<?php
}
