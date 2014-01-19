<?php

define("mysql_host", "localhost");
define("mysql_user", "root");
define("mysql_pass", "root");
define("mysql_tabl", "hack");

$link = mysqli_connect(mysql_host, mysql_user, mysql_pass, mysql_tabl);
if (!$link) {
    die('Not connected : ' . mysql_error());
}

?>