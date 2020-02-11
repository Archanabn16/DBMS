<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="user";

$_conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query="select * from room";
$result=$_conn->query($query);
?>

<!DOCTYPE html>
<html>
<title>
<head>
featch from database
</head>
</title>
<body>
<table align="center" border="1px" style="width:1200px; line-height:30px;">
<tr>
<th colspan="11"><h2>room records</h2><th>
</tr>
<tr>
<th>student name</th>
<th>USN</th>
<th>floor no</th>
<th>room no</th>
<th>total members</th>
</tr>
<?php

while($rows=$result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $rows['stname']?></td>
    <td><?php echo $rows['usn']?></td>
    <td><?php echo $rows['floor_no']?></td>
    <td><?php echo $rows['room_no']?></td>
    <td><?php echo $rows['total_members']?></td>
    
    </tr>


<?php
}
?>
</table>
</body>
</html>

