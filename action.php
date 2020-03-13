<?php  
 //action.php  
 include 'tryp2.php';  
 $object = new Crud();  
if(isset($_POST['id'])){
      $id = $_POST['id'];
      $action = $_POST['action'];
      if($action == "Insert")  
        {  
           
           $name = mysqli_real_escape_string($object->connect, $_POST["name"]);  
           $number = mysqli_real_escape_string($object->connect, $_POST["number"]);   
           $query = "  
           INSERT INTO contactinfo  
           (ContactName, ContactNumber)   
           VALUES ('".$name."', '".$number."')  
           ";  
           $object->execute_query($query);  
           echo 'Data Inserted';  
      }  
        else  if($action == "Update")  
      {  
          
           $output = array();
           $query = "SELECT * FROM contactinfo WHERE id =$id";  
           $result = $object->execute_query($query);  
           while($row = mysqli_fetch_array($result))  
           {  
                $output["name"] = $row['ContactName'];  
                $output["number"] = $row['ContactNumber']; 
                $output["id"]=$row['id']; 
           }  
           echo json_encode($output);  
      }  
      else if($action == "Edit")  
      {  
           $name = mysqli_real_escape_string($object->connect, $_POST["name"]);  
           $number = mysqli_real_escape_string($object->connect, $_POST["number"]);  
           $query = "UPDATE contactinfo SET ContactName = '".$name."', ContactNumber = '".$number."' WHERE id = $id";  
           $object->execute_query($query);  
           echo 'Data Updated';  
      }  
       else if($action == "Delete")
      {
       $query = "DELETE FROM contactinfo WHERE id = '".$_POST["id"]."'";
       $object->execute_query($query);
       echo 'Data Deleted';
     }   
} else {
  $object->get_data_in_table(); 
}
 ?>  