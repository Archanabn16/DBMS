<?php

$stname=$_POST["stname"];
$usn=$_POST["usn"];
$fname=$_POST["fname"];
$mname=$_POST["mname"];
$mobile_no=$_POST["pno"];
$mailid=$_POST["id"];
$age=$_POST["age"];
$p_mobile_no=$_POST["parentno"];
$course=$_POST["course"];
$year=$_POST["year"];
$sem=$_POST["sem"];


if(!empty($stname)||!empty($usn)||!empty($fname)||!empty($mname)||!empty($age)||
!empty($course)||!empty($year)||!empty($sem)){
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="user";

$_conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
if(mysqli_connect_error()){
    die('Connect ERROR('.mysqli_connect_errorno().')'.mysqli_connect_error());
}else{
   $SELECT="SELECT usn from student where usn=? Limit 1";
  
    $INSERT="INSERT Into student(stname,usn,fname,mname,mobile_no,mailid,age,p_mobile_no,course,year,sem)values(?,?,?,?,?,?,?,?,?,?,?)";
$stmt=$_conn->prepare($SELECT);
$stmt->bind_param("s",$usn);
$stmt->execute();
$stmt->bind_result($usn);
$stmt->store_result();
$rnum=$stmt->num_rows;
if($rnum==0){
    $stmt->close();
    $stmt=$_conn->prepare($INSERT);

    $stmt->bind_param("ssssisiisii",$stname,$usn,$fname,$mname,$mobile_no,$mailid,$age,$p_mobile_no,$course,$year,$sem);
    $stmt->execute();
    
    include_once('room.html');
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