<?php
session_start();
	if (isset($_SESSION['username'])==false) {          
        header('Location: logout.php');
}
include('koneksi.php');
 ?>
<html>
<head>
  <title>Supervisi Guru YPII Semarang</title>
  <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="jquery.dataTables.css">
        <!-- jQuery -->
        <script type="text/javascript" charset="utf8" src="jquery-1.11.1.min.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="jquery.dataTables.js"></script>
  <script src="jquery-1.12.0.min.js"></script>
  <script src="ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="path/to/jquery.ntm.js"></script>
  <link rel="stylesheet" href="sexybuttons.css" type="text/css" />
  <style>
	
  body {
    background: url('gambar/background.png');
    font-family: "open sans";
    font-size: 11pt;
  }
  #kiri {
    position: fixed;
    top: 0px;
    left: 40px;
    width: 200px;
    border-right: 1px solid #aaa;
  }
  #kanan {
    margin: 0 40px 40px 280px;
  }
  #menu {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  #menu li {
    padding-bottom: 10px;
    border-bottom: 1px solid #fff499;
  }
  #kiri p {
    font-size: 11px;
  }
  h1 {
    font-family: Verdana;
    color: #930808;
    font-size: 24pt;
  }
  #header {
    text-align: center;
  }
  #header img {
    width: 100%;
	height:200px;
  }
  .gallery {
    list-style-type: none;
    margin: 0;
    padding: 0;
  }
  .gallery li {
    padding-bottom: 10px;
    display: inline-block;
  }
  .gallery img {
    width: 100px;
    margin-right:35px;
    margin-bottom:15px;
    margin-top:5px;   
    border: 5px solid #fcfcfc;
    border-radius: 4px;
  }
  .gallery img:hover{
    border: 5px solid #42C5BB;
    cursor:pointer;
  }
  #footer {
    border-top: 1px solid #dccbcb;
    padding-top: 10px;
    margin-top: 25px;
    text-align: center;
  }
  
  $("#browser").treeview({
 animated:"normal",
 persist: "cookie"
});
var defaults = {
  autoParentDetection: true,
  autoActiveDetection: true,
  itemsUniqueClasses: true,
  parentClass: 'parent',
  activeClass: 'active',
  selectedClass: 'selected',
  expandClass: 'opened',
  collapseClass: 'closed',
  spoilerButtonClickMinX: 4,
  spoilerButtonClickMaxX: 20,
  spoilerButtonClickMinY: 8,
  spoilerButtonClickMaxY: 24,
  slideEffect: true
};
.tree-menu ul { list-style: none; }
.tree-menu > ul { padding: 0; }
.tree-menu a {
  display: block;
  vertical-align: middle;
  text-decoration: none;
  padding: 6px;
  background-color: #efefef;
  border-radius: 4px;
  margin-bottom: 1px;
  color: #002888;
  -moz-transition: background-color 0.25s linear;
  -webkit-transition: background-color 0.25s linear;
  -o-transition: background-color 0.25s linear;
  transition: background-color 0.25s linear;
  -moz-transition-delay: 0.15s;
  -webkit-transition-delay: 0.15s;
  -o-transition-delay: 0.15s;
  transition-delay: 0.15s;
}

.tree-menu a:hover {
  color: #f53d3e;
  -moz-transition: background-color 0.1s linear;
  -webkit-transition: background-color 0.1s linear;
  -o-transition: background-color 0.1s linear;
  transition: background-color 0.1s linear;
}

.tree-menu .active > a:hover,
.tree-menu .selected > a,
.tree-menu a:hover { background-color: #c6cdde; }

.tree-menu .selected > a {
  color: #f53d3e;
  font-weight: bold;
  text-decoration: none;
}

.tree-menu .active > a { background-color: #e1e3e9; }

.tree-menu .closed > a,
.tree-menu .opened > a {
  padding-left: 24px;
  background-position: 4px 8px;
  background-repeat: no-repeat;
}

.tree-menu .closed > a { background-image: url(../img/icon-expand.gif); }

.tree-menu .opened > a { background-image: url(../img/icon-collapse.gif); }
$(document).ready(function() {
  $('.demo').ntm();
});


</style>
<style>
input[type=text], select {
    width: 40%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 20%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}
}
</style>
</head>
<body>
  <div id="kiri" >
   <h3>Menu Utama</h3>
	<div class="tree-menu demo" id="tree-menu">
	  <ul>
	    <li><a href="data.php">HOME</a></li>
		<li><a href="nilai.php">NILAI SUPERVISI</a></li>		
	  </ul>
	  <a href="logout.php"><div><button class="sexybutton sexysimple sexylarge" id="button2">Logout / Exit Program</button></div></a>
	</div>	
    <p>
      Jl. Wotgandul Dalam  <br>
      No 252 Semarang Kota<br>
      Phone: 085643221232<br>
      Email: atanasiustendy@hotmail.com
    </p> 
  </div>
  <div id="kanan">
    <div id="header">
      <img src="/gambar/header.jpg" />
	  <h1>Silahkan Pilih Unit</h1>  
	  
    </div>
    <div id="content">
	<div id="printme">
	<?php 
            //$con=mysqli_connect("localhost","root","","logon");
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result2 = mysqli_query($con,"SELECT * FROM unit");
                 
        ?>	
       <table style="width:100%">
		<form action="controller.php" method="POST">
    <tr>
    <td><label for="unitnya">Unit Kerja</label></td>
    <td><select id="unitnya" name="unitnya">
      <?php 
                    while($row = mysqli_fetch_array($result2)) {
                        echo "<option value=".$row['idunit'].">".$row['namaunit']."</option>";                        
                    }
			
                ?>
    </select></td>	
  </tr>
  <?php /* echo "<input type='hidden' id='guru' name='agen' value='".$idagennya."'>" */?>
  <tr><td></td><td><input type="submit" value="Pilih"></td></tr>
   </form>
</table>
		<?php
            mysqli_close($con);
        ?>
    <div id="footer">
      &copy; 2015 - Tendy Developer
    </div>
  </div>  
<script type="text/javascript">
  var win=null;
  function printIt(printThis)
  {
    win = window.open();
    self.focus();
    win.document.open();
    win.document.write('<'+'html'+'><'+'head'+'><'+'style'+'>');
    win.document.write('body, td { font-family: Verdana; font-size: 10pt;}');
    win.document.write('<'+'/'+'style'+'><'+'/'+'head'+'><'+'body'+'>');
    win.document.write(printThis);
    win.document.write('<'+'/'+'body'+'><'+'/'+'html'+'>');
    win.document.close();
    win.print();
    win.close();
  }
</script>
  <script>
$(document).ready(function(){
var div = document.getElementById('myDiv');
div.style.visibility = "hidden";
div.style.display = "none";
    $("#hide").click(function(){
        $("div").hide();
    });
    $("#show").click(function(){
        $("div").show();
    });
});
</script>
  <script type="text/javascript">
            $(document).ready( function () {
                $('#table_id').DataTable();
            });
        </script>
<script>
  $document.ready(function){
  $("#button2").click(function(){
        $("hide").show();
    });  
  }
  </script>
</body>
<a href="http://multisoftdeveloper.worepress.com" src=""></a>
</html>