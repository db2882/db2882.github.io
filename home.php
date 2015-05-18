<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Almost There Airlines</title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="css/layouts/home.css">
<script src="jquery-2.1.4.min.js" type="text/javascript"></script>
<script type"text/javascript">
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
</script>
</head>

<body>
	<div class="pure-menu pure-menu-horizontal">
    <ul class="pure-menu-list">
    	<li class="pure-menu-item pure-menu-has-children pure-menu-allow-hover">
            <a href="#" id="menuLink1" class="pure-menu-link">Lookup ID</a>
            <ul class="pure-menu-children">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="customer_id"></a></li>
                <script type="text/javascript">document.getElementById("customer_id").innerHTML = "Customer ID: " +getParameterByName("customer_id");</script>
            </ul>
        </li>
    	
        <li class="pure-menu-item"><a href="index.html" class="pure-menu-link">Logout</a></li>


    </ul>
</div>	<div class="banner">
    <h1 class="banner-head">
        Welcome 
        <?php 
       include 'sunapeedb.php';
       $d = new SunapeeDB();
       $d->connect();
       $d->customer_name($_GET["customer_id"]); 
       $d->disconnect();
       ?>
        
    </h1>
</div>

<div class="wrapper" id="button_wrap">
  
 <button class="pure-button pure-button-primary">Book A Flight!</button>


</div>

<div id="wrapper">

<?php
   mb_internal_encoding('UTF-8');
   mb_http_output('UTF-8');

   
       
       $db = new SunapeeDB();
       $db->connect();

       $db->get_customer_flights_future($_GET["customer_id"]);
       $db->get_customer_flights_past($_GET["customer_id"]);
        $db->disconnect();
  
?>

<script type="text/javascript">
$("a").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  
  
	var customer_id = getParameterByName("customer_id");	
  window.location.href = "cancel.php?customer_id=" + customer_id + "&flight_id=" + flight_id ;
})

$("button").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  
  
	var customer_id = getParameterByName("customer_id");	
  window.location.href = "flights.php?customer_id=" + customer_id;
})
</script>



</div>
</body>
</html>
