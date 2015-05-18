

<?php



   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   
       include 'sunapeedb.php';
       $db = new SunapeeDB();
       $db->connect();
       $flight_id = $_GET["flight_id"];
        $customer_id = $_GET["customer_id"];
       	if($db->book_flight($flight_id,$customer_id) == 1){
       		 print("<script type=\"text/javascript\">window.location.href=\"home.php?customer_id=$customer_id\" ;</script>");
       		 $db->disconnect();
       	}
       	else{
       		echo "<script type='text/javascript'>alert('Duplicate Booking. Returning to booking');</script>"; 

       		print("<script type=\"text/javascript\">window.location.href=\"flights.php?customer_id=$customer_id\" ;</script>");
       		 $db->disconnect();
       	}
        

 

    
  

?>

