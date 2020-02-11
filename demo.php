<?php
$username=$_POST["username"];
$pass=$_POST["password"];
$pass1="abc123";

    if(!empty($username)){
        
if(!empty($pass)){
        if($username=="admin"){
        if($pass==$pass1){
        include_once ('hostel.html');
        }
        else{
            echo "<h1>..incorrect password...<h1>";
        }
    }
    else{
        echo "<h1>...!!incorrect user name!!...</h1>";
    }
}
    else{
        echo "<h1>...please enter the  password!!!...</h1>";
    }
}
    else{
        echo "<h1>....please enter the details!!...</h1>";
    }

?>
