<?php

use chillerlan\QRCode\QRCode;

require_once("vendor/autoload.php");

$data = 'https://www.hak-imst.ac.at/';

// quick and simple:
echo '<img width="200px" src="'.(new QRCode)->render($data).'" alt="QR Code" />';