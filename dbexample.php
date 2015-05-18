<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="dbstyle.css"> 
<title>Display Tables</title>
</head>

<body>
<div id="wrapper">
<header>
<h2>Select a table to display:</h2>
<form action="<?php $_PHP_SELF ?>" method="get">
<input type="radio" name="table" value="Flights" checked>Flights
<input type="radio" name="table" value="instructor">Instructor<br>
<input type="submit">
</form>
<header>

<?php
   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   
       include 'sunapeedb.php';
       $db = new SunapeeDB();
       $db->connect();

       $db->get_table("Flights");
   
       $db->disconnect();
  
?>
</div>
</body>
</html>
