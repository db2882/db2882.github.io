<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Almost There Airlines</title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="css/layouts/flights.css">
<script src="jquery-2.1.4.min.js" type="text/javascript"></script>

</head>

<div class="wrapper" id="button_wrap">
  
 <button class="pure-button pure-button-primary" id="back">Back</button>


</div>


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
<script type"text/javascript">

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

$("a").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  var customer_id = getParameterByName("customer_id");
  window.location.href = "booking.php?flight_id=" + flight_id +"&customer_id=" + customer_id;
})

$("#back").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  var customer_id = getParameterByName("customer_id");
  window.location.href = "home.php?customer_id=" + customer_id;
})
</script>



</div>
</body>
</html>
