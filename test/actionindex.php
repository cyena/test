<?php  
 //action.php  
include 'indexclass.php';
$class = new Crud();

$action = $_POST['action'];

if($_POST["action"] == "Load")  
{  
 $class->get_data_in_table();  
}  
else if($action == "Insert")  
{
  if($class->insert($_POST['name'],$_POST['number']))
  {

    echo 'Data Inserted';
  }
}
else if($action == "Delete")
{
  if($class->delete(intval($_POST['id'])))
  {
    echo 'Data Deleted';
  }else{
    echo "No contact information";
  }
}   
else  if($action == "Update")  
{  
 $output = array();
 $query = "SELECT * FROM contactinfo WHERE id ='".$_POST['id']."'";  
 $result = $class->execute_query($query);  
 while($row = mysqli_fetch_array($result))  
 {  
  $output["name"] = $row['ContactName'];  
  $output["number"] = $row['ContactNumber']; 
  $output["id"]=$row['id']; 
  }  
/*echo json_encode($output); */ 
}  
/*else if($action == "Edit")  
{  
 $name = mysqli_real_escape_string($class->connect, $_POST["name"]);  
 $number = mysqli_real_escape_string($class->connect, $_POST["number"]);  
 $query = "UPDATE contactinfo SET ContactName = '".$name."', ContactNumber = '".$number."' WHERE id = '".$_POST['id']."'";  
 $class->execute_query($query);  
 echo 'Data Updated';  
}  */
?>  