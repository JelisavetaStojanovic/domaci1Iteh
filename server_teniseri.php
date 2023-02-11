<?php

require 'brokerBaze.php';
require "models/teniser.php";

$teniseri = Teniser::vratiTenisere($konekcija);

foreach ($teniseri as $teniser) {
    ?>
<option value="<?= $teniser->teniserID ?>"><?= $teniser->ime . " " . $teniser->prezime?></option>

<?php
}