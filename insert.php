<?php
include 'conect.php';

$cname=$_POST['firstname'];
$number=$_POST['number'];

 	function insert_data($cname,$number){
 		$query= "INSERT INTO contactinfo(ContactName,ContactNumber) VALUES ('$cname',$number)";

		$result=mysqli_query($conn,$query);
 	}

 	 echo insert_data($cname,$number);
 	

?>