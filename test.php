<?php
require_once('SainteLague.php');

use App\Libraries\SainteLague;


$result = [
    ['party_name' => 'partai gaul',     'votes' => 32000],
    ['party_name' => 'partai kece',     'votes' => 5000],
    ['party_name' => 'partai ganteng',  'votes' => 15000],
    ['party_name' => 'partai keren',    'votes' => 20000],
    ['party_name' => 'partai syantiq',  'votes' => 7500],
];

print_r(SainteLague::calculate($result, 7, 0.04));
