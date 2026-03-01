<?php
$wgShowExceptionDetails = true;
$wgShowDBErrorBacktrace = true;
error_reporting(E_ALL);
ini_set('display_errors', 1);

$wgUsePrivateIPs = true; //为便于在localhost:80调试