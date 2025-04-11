<?php
session_start();
echo "<h1>Pagina3 </h1>";
echo "ID: " . session_id() . "<br>";


$_SESSION['username'] = "gabriel";
$_SESSION['senha'] = "123456";


?>