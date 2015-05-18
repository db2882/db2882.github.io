<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Almost There Airlines</title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="css/layouts/employee_home.css">
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
                <li class="pure-menu-item"><a href="#" class="pure-menu-link" id="employee_id"></a></li>
                <script type="text/javascript">document.getElementById("employee_id").innerHTML = "Employee ID: " +getParameterByName("employee_id");</script>
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
       $d->employee_name($_GET["employee_id"]); 
       $d->disconnect();
       ?>
        
    </h1>
</div>

<div class="wrapper" id="button_wrap1">
  <button class="pure-button pure-button-primary">Get Passenger List</button>
</div>

<div class="wrapper" id="button_wrap2">
  <button class="pure-button pure-button-primary"> Top Routes</button>
</div>




<div id="wrapper">


<script type="text/javascript">
$("a").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  
  
	var employee_id = getParameterByName("employee_id");	
  window.location.href = "cancel.php?employee_id=" + employee_id + "&flight_id=" + flight_id ;
})

$("button").click(function(){
  var flight_id = $(this).closest('tr').find('td:first').text();
  
  
	var employee_id = getParameterByName("employee_id");	
  window.location.href = "flights.php?employee_id=" + employee_id;
})
</script>



</div>
</body>
</html>
