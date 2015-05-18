<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Almost There Airlines</title>


<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
<link rel="stylesheet" href="css/layouts/new_customer.css">
<script src="jquery-2.1.4.min.js" type="text/javascript"></script>

</head>

<div class="splash-container">
    <div class="splash">
       <i></i>
        <h1 class="splash-head" id="continue">
       
           Your new id is <?php
           mb_internal_encoding('UTF-8');
          mb_http_output('UTF-8');

   
        include 'sunapeedb.php';
        $db = new SunapeeDB();
       $db->connect();


       $id = $db->create_user($_GET["first_name"],$_GET["last_name"]);
       print ($id);
        $db->disconnect();
        
  
?>
</h1>
 <p class="splash-subhead">
        Remember This! <br> You will need this ID to login in the future
        </p>
</div>
</div>

<script type"text/javascript">
$("#continue").mouseover(function(){
  document.getElementById("continue").innerHTML = "Continue";
});
$("#continue").mouseleave(function(){
  var id= <?php 
          
        echo json_encode($id); 
        ?>;
  document.getElementById("continue").innerHTML = "Your new id is " + id;
});

$("#continue").click(function(){
  var id= <?php 
          
        echo json_encode($id); 
        ?>;
  window.location.href="home.php?customer_id=" + id  ;
});

</script>


  







</div>
</body>
</html>
