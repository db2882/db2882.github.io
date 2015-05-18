<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Landing Page </title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="css/layouts/index.css">
</head>

<body>
<div id="wrapper">

<?php
   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   
       include 'sunapeedb.php';
       $db = new SunapeeDB();
       $db->connect();

       $db->get_flights();
   
       $db->disconnect();
  
?>
</div>
</body>
</html>
