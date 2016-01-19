<?php 

require_once 'configuration.class.php';

print_r(Configuration::getParameters());

echo '<br>' . __DIR__ . "/configuration/prod.ini";
