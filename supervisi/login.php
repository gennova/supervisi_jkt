<?php
	ob_start();
    session_start();
	mysql_connect("localhost","santoyos_spv","supervisi");
    mysql_select_db("santoyos_supervisi");
    $myusername=$_POST['usernamenya'];
    $mypassword=$_POST['pass'];
	$mylevel='';
    $mysql = "SELECT * FROM usernya JOIN unit ON usernya.level=unit.idunit WHERE username='$myusername' and password='$mypassword'";
    $result = mysql_query($mysql) or die("cannot execute query");
    $count = mysql_num_rows($result);
	if($count==1)
    {
	  while($row = mysql_fetch_array($result)) {	  
      $leveluser = $row['level'];
	  $iduser = $row['id'];
	  $idunit = $row['idunit'];
	  $_SESSION["username"] = $myusername;
	  $_SESSION["password"] =$mypassword;
	  $_SESSION["level"] = $leveluser;
	  $_SESSION["iduser"] = $iduser;
	  $_SESSION["idunit"] = $idunit;
	  if($myusername=='admin' && $leveluser==25){
		  header('Location: halamanadmin.php');	
	  }else{
	  header('Location: data.php?idunit='.$leveluser);	
	  }
	}	
	} else {
        echo "login gagal, cek username dan password anda \n";
		echo "Ulangi Login  <a href=index.html>Klik disini</a>\n";
		echo $myusername;
		echo  $mypassword;
		echo '\n level : '.$mylevel;
		echo '\n count : '.$count;
     }
?>