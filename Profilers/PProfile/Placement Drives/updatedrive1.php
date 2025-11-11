<?php
$connect = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
mysql_select_db("placement"); // Selecting Database from Server
if(isset($_POST['submit']))
{ 
$usn = $_POST['usn'];
$name = $_POST['sname'];
$comname = $_POST['comname'];
$date = $_POST['Date'];
$attend = $_POST['Attendance'];
$wt = $_POST['WrittenTest'];
$gd = $_POST['GD'];
$tech = $_POST['Tech'];
$placed = $_POST['Placed'];



$query = mysql_query("INSERT INTO updatedrive(USN, Name, CompanyName, Date, Attendence, WT, GD, Techical, Placed)
VALUES('$usn', '$name', '$comname', '$date', '$attend', '$wt', '$gd', '$tech', '$placed')");



if($query)
        {
                      echo "<center>Data Inserted successfully...!!</center>";
		}
		else
		{ 
			echo "<center>Failed to insert data: " . mysql_error() . "</center>";
	    }
}
?>