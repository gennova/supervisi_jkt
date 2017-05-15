<?php 
include "koneksi.php";
$idguru   = $_GET['idg'];
mysql_query("delete from tblinsertrincian where idsuprandom='$idguru'") or die(mysql_error());
mysql_query("delete from tblrincianisian where idsuprandom='$idguru'") or die(mysql_error());
header('location:logout.php');
?>