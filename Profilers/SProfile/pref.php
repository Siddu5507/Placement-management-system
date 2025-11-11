<?php
session_start();
if(!isset($_SESSION["username"])) {
    header("location: index.php");
    exit();
}

// Establishing Connection with Server
$connect = mysqli_connect("localhost", "root", "", "placement"); 
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) { 
    $fname = mysqli_real_escape_string($connect, $_POST['Fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['Lname']);
    $USN = mysqli_real_escape_string($connect, $_POST['USN']);
    $sun = mysqli_real_escape_string($connect, $_SESSION["username"]);
    $phno = mysqli_real_escape_string($connect, $_POST['Num']);
    $email = mysqli_real_escape_string($connect, $_POST['Email']);
    $date = mysqli_real_escape_string($connect, $_POST['DOB']);
    $cursem = mysqli_real_escape_string($connect, $_POST['Cursem']);
    $branch = mysqli_real_escape_string($connect, $_POST['Branch']);
    $per = mysqli_real_escape_string($connect, $_POST['Percentage']);
    $puagg = mysqli_real_escape_string($connect, $_POST['Puagg']);
    $beaggregate = mysqli_real_escape_string($connect, $_POST['Beagg']);
    $back = mysqli_real_escape_string($connect, $_POST['Backlogs']);
    $hisofbk = mysqli_real_escape_string($connect, $_POST['History']); 
    $detyear = mysqli_real_escape_string($connect, $_POST['Dety']);
    
    if($USN !='' || $email !='') {
        if($USN == $sun) {
            $query = "INSERT INTO `basicdetails` (`FirstName`, `LastName`, `USN`, `Mobile`, `Email`, `DOB`, `Sem`, `Branch`, `SSLC`, `PU/Dip`, `BE`, `Backlogs`, `HofBacklogs`, `DetainYears`, `Approve`) 
                      VALUES ('$fname', '$lname', '$USN', '$phno', '$email', '$date', '$cursem', '$branch', '$per', '$puagg', '$beaggregate', '$back', '$hisofbk', '$detyear', '0')";
            if(mysqli_query($connect, $query)) {
                echo "<center>Details have been received successfully...!!</center>";
            } else {
                echo "<center>FAILED</center>";
            }
        } else {
            echo "<center>Enter your USN only...!!</center>";
        }
    }
}

if(isset($_POST['update'])) { 
    $fname = mysqli_real_escape_string($connect, $_POST['Fname']);
    $lname = mysqli_real_escape_string($connect, $_POST['Lname']);
    $USN = mysqli_real_escape_string($connect, $_POST['USN']);
    $sun = mysqli_real_escape_string($connect, $_SESSION["username"]);
    $phno = mysqli_real_escape_string($connect, $_POST['Num']);
    $email = mysqli_real_escape_string($connect, $_POST['Email']);
    $date = mysqli_real_escape_string($connect, $_POST['DOB']);
    $cursem = mysqli_real_escape_string($connect, $_POST['Cursem']);
    $branch = mysqli_real_escape_string($connect, $_POST['Branch']);
    $per = mysqli_real_escape_string($connect, $_POST['Percentage']);
    $puagg = mysqli_real_escape_string($connect, $_POST['Puagg']);
    $beaggregate = mysqli_real_escape_string($connect, $_POST['Beagg']);
    $back = mysqli_real_escape_string($connect, $_POST['Backlogs']);
    $hisofbk = mysqli_real_escape_string($connect, $_POST['History']); 
    $detyear = mysqli_real_escape_string($connect, $_POST['Dety']);

    if($USN !='' || $email !='') {
        if($USN == $sun) {
            $sql = mysqli_query($connect, "SELECT * FROM `basicdetails` WHERE `USN`='$USN'");
            if(mysqli_num_rows($sql) > 0) {
                $query = "UPDATE `basicdetails` SET `FirstName`='$fname', `LastName`='$lname', `Mobile`='$phno', `Email`='$email', `DOB`='$date', `Sem`='$cursem', `Branch`= '$branch', `SSLC`='$per', `PU/Dip`='$puagg', `BE`='$beaggregate', `Backlogs`='$back', `HofBacklogs`='$hisofbk', `DetainYears`='$detyear', `Approve`='0'
                          WHERE `basicdetails`.`USN` = '$USN'";
                if(mysqli_query($connect, $query)) {
                    echo "<center>Data Updated successfully...!!</center>";
                } else {
                    echo "<center>FAILED</center>";
                }
            } else {
                echo "<center>NO record found for update</center>";
            }
        } else {
            echo "<center>Enter your USN only</center>";
        }
    }
}

// Close the connection
mysqli_close($connect);
?>
