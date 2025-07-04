<?php

@define('DB_SERVER', 'localhost');
@define('DB_USERNAME', 'webtechscom_ParecalPro');
@define('DB_PASSWORD', '?dK^[XP;s=R)');
@define('DB_NAME', 'webtechscom_ParecalPro');

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>

