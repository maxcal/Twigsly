<?php
require_once __DIR__.'/lib/Twigsly.php';
$Twigsly = new Twigsly($Twigpress, __DIR__);
$Twigsly->display($wp_query, array());