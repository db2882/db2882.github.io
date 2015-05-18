<?php
class SunapeeDB
{
    const HOST = "sunapee.cs.dartmouth.edu";
    const USER = "dbain";
    const PASS = "19a18s";
    const DB   = "dbain_db";
    private $con = NULL;

   
    public function connect()
    {
        $this->con = mysql_connect(self::HOST, self::USER, self::PASS);
	if(!$this->con) { die("SQL Error: " . mysql_error()); }
	mysql_select_db(self::DB, $this->con);
	mysql_set_charset("utf8mb4");
    }

    public function get_table($table)
    {
	if($this->con === NULL) { return; }
	
	$result = mysql_query("SELECT * FROM $table;");

	if(!$result) { die("SQL Error: " . mysql_error()); }

	$this->print_table($result);

	mysql_free_result($result);
    }

    

    public function get_flights()
    {
    if($this->con === NULL) { return; }
    
    $result = mysql_query("Call customer_booking()");

    if(!$result) { die("SQL Error: " . mysql_error()); }

    $this->print_flights($result);

    mysql_free_result($result);
    }

    public function cancel_flight($customer_id, $flight_id){
        if($this->con === NULL) { return; }
       mysql_query("Set @flight_id = $flight_id");
       mysql_query("Set @customer_id = $customer_id");
       mysql_query("Set @success = 3");
        $result = mysql_query("Call cancel_booking(@customer_id, @flight_id, @success)");
        
       
        mysql_free_result($result);
    }

    public function book_flight($flight_id,$customer_id){
        if($this->con === NULL) { return; }
           
       mysql_query("Set @f_id = $flight_id");
       mysql_query("Set @c_id = $customer_id");
       mysql_query("Set @succ = 3");
      
    
        mysql_query("call book_flight(@c_id,@f_id,@succ);");
       $result =  mysql_query("select @succ;");
       $row = mysql_fetch_row($result);

       
        mysql_free_result($result);
        return $row[0];

    }


    public function get_customer_flights_future($id)
    {
    if($this->con === NULL) { return; }
    
    
    $result_future = mysql_query("select flight_id as Flight_ID, depart_time as Departure_Time, land_time as Land_Time, status as Status from Bookings
    inner join Flights
    on Flights_flight_id = flight_id
    where Customers_customer_id = $id and depart_time > now() order by depart_time desc;");

    

     

    if(!$result_future ) { die("SQL Error: " . mysql_error()); }

    $this->print_customer_flights_future($result_future);


    

    mysql_free_result($result_future);
   
    }

     public function get_customer_flights_past($id)
    {
    if($this->con === NULL) { return; }
    
    
    
     $result_past = mysql_query("select flight_id as Flight_ID, depart_time as Departure_Time, land_time as Land_Time, status as Status from Bookings
    inner join Flights
    on Flights_flight_id = flight_id
    where Customers_customer_id = $id and depart_time < now() order by depart_time desc;");

     

    if(!$result_past) { die("SQL Error: " . mysql_error()); }

    


    $this->print_customer_flights_past($result_past);

  
    mysql_free_result($result_past);
    }


    public function insert_student($id, $name, $dept, $credits)
    {
        if($this->con === NULL) { return false; }

	$result = mysql_query("INSERT INTO student (ID, name, dept_name, tot_cred) VALUES (" . $id . ",\"" . $name . "\",\"" . $dept . "\"," . $credits . ");");

	if(!$result) { die("SQL Error: " . mysql_error()); }

	mysql_free_result($result);

	return true;
    }

    public function login($id)
    {
       $result = mysql_query("Select * from Customers where customer_id = $id");
        $row = mysql_fetch_array($result); 
        $num_results = mysql_num_rows($result); 
        if ($num_results > 0){ 
        return true;
        }   
        else{ 
            return false;
        }
    }   

    public function customer_name($id){
        $result = mysql_query("Select first_name, last_name from Customers where customer_id = $id");
        $row = mysql_fetch_array($result);
        print($row[0]." ". $row[1]);
    }
    public function employee_name($id){
        $result = mysql_query("Select first_name, last_name from Employees where employee_id = $id");
        $row = mysql_fetch_array($result);
        print($row[0]." ". $row[1]);
    }



    private function print_flights($result)
    {
     	print('<table class="pure-table pure-table-horizontal" id="flights"><thead id="head"><tr>');
	for($i=0; $i < mysql_num_fields($result); $i++) {
	    print("<th>" . mysql_field_name($result, $i) . "</th>");

	}
        print("<th>Book</th>");
	print("</tr></thead>\n");
	
	while ($row = mysql_fetch_assoc($result)) {
    	      print("\t<tr>\n");
    	      foreach ($row as $col) {
       	          print("\t\t<td>$col</td>\n");
                  
    	      }
                print("\t\t<td>");
                print('<a  class="pure-button pure-button-primary">Book This Flight</a>');
    	      print("\t</tr>\n");
	}
	print("</table>\n");    

    }	


    private function print_customer_flights_future($result)
    {
        print ('<h2> Future Flights </h2>');
        print('<table class="pure-table pure-table-horizontal" id="future_flights"><thead id="head"><tr>');
    for($i=0; $i < mysql_num_fields($result); $i++) {
        print("<th>" . mysql_field_name($result, $i) . "</th>");

    }
        print("<th>Cancel</th>");
    print("</tr></thead>\n");
    
    while ($row = mysql_fetch_assoc($result)) {
              print("\t<tr>\n");
              foreach ($row as $col) {
                  print("\t\t<td>$col</td>\n");
                  
              }
                print("\t\t<td>");
                print('<a  class="pure-button pure-button-primary">Cancel this Flight</a>');
              print("\t</tr>\n");
    }
    print("</table>\n");    

    }   

    private function print_customer_flights_past($result)
    {

        print ('<h2> Past Flights </h2>');
        print('<table class="pure-table pure-table-horizontal" id="past_flights"><thead id="head"><tr>');
    for($i=0; $i < mysql_num_fields($result); $i++) {
        print("<th>" . mysql_field_name($result, $i) . "</th>");

    }
       
    print("</tr></thead>\n");
    
    while ($row = mysql_fetch_assoc($result)) {
              print("\t<tr>\n");
              foreach ($row as $col) {
                  print("\t\t<td>$col</td>\n");
                  
              }
                
    }
    print("</table>\n");    

    }  

    public function create_user($first_name, $last_name){
       
        if($this->con === NULL) { return; }

       
        $sql = "INSERT INTO Customers (first_name, last_name) VALUES ('$first_name', '$last_name')";
       $result =  mysql_query($sql);
       if ($result){
        return mysql_insert_id();
       }
       else{
        return 0;
       }
         
    }



    public function disconnect()
    {
	if($this->con != NULL) { mysql_close($this->con);}
    }
}
?>