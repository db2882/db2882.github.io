

	<?php

   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   
       include 'sunapeedb.php';
       $db = new SunapeeDB();
       $db->connect();
       $flight = $_GET["flight_id"];
        $id = $_GET["customer_id"];
       $db->cancel_flight($id,$flight);
        $db->disconnect();

 

     	print("<script type=\"text/javascript\">window.location.href=\"home.php?customer_id=$id\" ;</script>");
  
?>
