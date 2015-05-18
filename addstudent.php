<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="dbstyle.css">

<title>Add Student</title>
</head>

<body>
<div id="wrapper">
<header>
<h2>Insert a student:</h2>
<form action="<?php $_PHP_SELF ?>" method="get">
  <label>ID #:</label>
  <input type="text" name="id" placeholder="12345" >

  <label>Student name:</label>
  <input type="text" name="name" placeholder="Doe" required>

  
  <input type="submit">
</form>
<header>

<?php
   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   if($_GET["id"] !== NULL && $_GET["id"] != "" &&
      $_GET["name"] !== NULL && $_GET["name"] != "" )
   {
       include 'sunapeedb.php';
       print("here0");
       $db = new SunapeeDB();
       print("here");
       $db->connect();

     

       $db->disconnect();
   } else { print("Please provide student information."); }
?>
</div>
</body>
</html>
