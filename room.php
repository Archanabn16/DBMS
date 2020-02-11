<?php
if(isset($_POST["stname"])||isset($_POST["usn"])||isset($_POST["flno"])||isset($_POST["rno"])||isset($_POST["tmno"])){
   $stname=$_POST["stname"];
    $usn=$_POST["usn"];
$flno=$_POST["flno"];
$rno=$_POST["rno"];
$tmno=$_POST["tmno"];
}


if(!empty($stname)||!empty($usn)||!empty($flno)||!empty($rno)||!empty($tmno)){
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="user";

$_conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connect ERROR('.mysqli_connect_errorno().')'.mysqli_connect_error());
}else{
   $SELECT="SELECT usn from room where usn=? Limit 1";
  
    $INSERT="INSERT Into room(stname,usn,floor_no,room_no,total_members)values(?,?,?,?,?)";
$stmt=$_conn->prepare($SELECT);
$stmt->bind_param("s",$usn);
$stmt->execute();
$stmt->bind_result($usn);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0){
    $stmt->close();
    $stmt=$_conn->prepare($INSERT);

    $stmt->bind_param("ssiii",$stname,$usn,$flno,$rno,$tmno);
    $stmt->execute();
    
    echo "new record inserted sucessfully";
}else{
    
    echo "some already registerd";

}
$stmt->close();
$_conn->close();
}
}
else{
    echo "fill the required field";
}

?>