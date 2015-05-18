<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Almost There Airlines </title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
 <link rel="stylesheet" href="css/layouts/index.css"> 
</head>

<body>
<div class="splash-container">
    <div class="splash">
        
        <form class="pure-form pure-form-stacked" action="<?php $_PHP_SELF ?>" method="get">
    	<fieldset>
        <legend>Login</legend>

        <label for="customer_id">Customer ID</label>
        <input id="customer_id" name="customer_id" type="text" placeholder="Customer ID">

        <label for="password">Password</label>
        <input id="password" name="password" type="password" placeholder="Password">

       

        <button type="submit" name="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
	</form>
    </div>
</div>


<?php
	error_reporting (E_ALL);
	mb_internal_encoding('UTF-8');
   	mb_http_output('UTF-8');

	if($_GET["customer_id"] !== NULL && $_GET["customer_id"] != "" &&
      $_GET["password"] !== NULL && $_GET["password"] != "" ){
   	
   		

    $HOST = "sunapee.cs.dartmouth.edu";
  	$USER = "dbain";
    $PASS = "19a18s";
    $DB   = "dbain_db";
   $con = NULL;

     $con = mysql_connect($HOST, $USER, $PASS);
	if(!$con) { die("SQL Error: " . mysql_error()); }
	mysql_select_db($DB, $con);
	mysql_set_charset("utf8mb4");
   	
   	$id = $_GET["customer_id"];
   	$result = mysql_query("Select * from Customers where customer_id = $id");
   	$row = mysql_fetch_array($result); 
	$num_results = mysql_num_rows($result); 
	if ($num_results > 0){ 
		print("<script type=\"text/javascript\">window.location.href=\"home.php?customer_id=$id\" ;</script>");
		exit();
	}else{ 
		echo "<script type='text/javascript'>alert('Invalid ID');</script>";
	}

     
   }
   else { 
   	if (isset($_GET['submit'])){
   		echo "<script type='text/javascript'>alert('Please enter valid Customer ID and Password');</script>"; 
   	}
   }
   
?>




</body>
</html>