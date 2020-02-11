<?php
$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="user";

$_conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
$query="select * from student";
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
<th colspan="11"><h2>student records</h2><th>
</tr>
<tr>
<th>student name</th>
<th>USN</th>
<th>father name</th>
<th>mother name</th>
<th>mobile number</th>
<th>email id</th>
<th>age</th>
<th>parent mobile number</th>
<th>course</th>
<th>year</th>
<th>sem</th>
</tr>
<?php

while($rows=$result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $rows['stname']?></td>
    <td><?php echo $rows['usn']?></td>
    <td><?php echo $rows['fname']?></td>
    <td><?php echo $rows['mname']?></td>
    <td><?php echo $rows['mobile_no']?></td>
    <td><?php echo $rows['mailid']?></td>
    <td><?php echo $rows['age']?></td>
    <td><?php echo $rows['p_mobile_no']?></td>
    <td><?php echo $rows['course']?></td>
    <td><?php echo $rows['year']?></td>
    <td><?php echo $rows['sem']?></td>
    </tr>


<?php
}
?>
</table>
</body>
</html>

