<?php
$db_username = 'root';
$db_password = '';
$db_name = 'huynd006';
$db_host = 'localhost';
################
 
//check we have username post var
if(isset($_POST["username"]))
{
    //check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }  
 
        //try connect to db
    $connecDB = mysqli_connect($db_host, $db_username, $db_password,$db_name)or die('could not connect to database');
 
    //trim and lowercase username
    $username =  strtolower(trim($_POST["username"]));
 
    //sanitize username
    $username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
 
    //check username in db
    $results = mysqli_query($connecDB,"SELECT id FROM tbl_acc WHERE username='$username'");
 
    //return total count
    $username_exist = mysqli_num_rows($results); //total records
 
     $true=true;
    $false=false;
    if($username_exist) {
        echo "0";
    }else{
        // echo "<i class='fa fa-check'> </i>";
        echo "1";
    }
 
    //close db connection
    mysqli_close($connecDB);
}

?>