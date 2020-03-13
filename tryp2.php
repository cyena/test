 <?php  
 class Crud  
 {  
      //crud class  
      public $connect;  
      private $host = "localhost";  
      private $username = 'root';  
      private $password = '';  
      private $database = 'contacts';  
      function __construct()  
      {  
           $this->database_connect();  
      }  
      public function database_connect()  
      {  
           $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
      }  
      public function execute_query($query)  
      {  
           return mysqli_query($this->connect, $query);  
      }  
      public function get_data_in_table()  
      {  
           $output = '';  
           $result = $this->execute_query("SELECT * FROM contactinfo ORDER BY id DESC");  
           $output .= '  
           <table class="table table-bordered table-striped">  
                <tr>  
                     <th width="40%">Name</th>  
                     <th width="40%">Number</th>  
                     <th width="10%">Update</th>  
                     <th width="10%">Delete</th>  
                </tr>  
           ';  
           while($row = mysqli_fetch_object($result))  
           {  
                $output .= '  
                <tr>       
                     <td>'.$row->ContactName.'</td>  
                     <td>'.$row->ContactNumber.'</td>  
                     <td><button type="button" id="'.$row->id.'" class="btn btn-info btn-xs update">Update</button></td>  
                     <td><button type="button" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button></td>  
                </tr>  
                ';  
           }  
           $output .= '</table>';  
           echo $output;  
      }       
 }  
 ?>  