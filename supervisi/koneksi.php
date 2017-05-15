<?php  
    $server= "localhost";  
    $username = "santoyos_spv";   
    $password = "supervisi";   
    $database = "santoyos_supervisi";  
      
    mysql_connect($server,$username,$password) or die ("Koneksi Gagal"); 
    mysql_select_db($database) or die ("Database Tidak Bisa Di Buka " );  
    $con=mysqli_connect($server,$username,$password,$database);  
?>
