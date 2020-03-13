 $(document).ready(function(){  
           load_data();  
           $('#action').val("Insert");  
           function load_data()  
           {  
           	var action = "Load";  
           	$.post("action.php",  
           		{action:action},  
           		function(data)  
           		{  
           			$('#user_table').html(data);

           		}  
           		);  
           }  
          /*document.getElementById("name").onkeypress = function() {myFunction()};*/

          function myFunction(event) {
          	var key = event.keyCode;
          	if((key>=48 && key <=57)||(key>=96 && key <=105))
          	{
          		alert("Invalid input");

          	}
          	return true;
          }
          $('#user_form').on('submit', function(event){ 

          	event.preventDefault();  
          	var Name = $('#name').val();  
          	var pNumber = $('#number').val(); 
          	var id = $('#id').val(); 
          	if(Name != '' && pNumber != '')  
          	{ 

          		$.ajax({  
          			url:"action.php",  
          			method:"POST",  
          			data:new FormData(this),  
          			contentType:false,  
          			processData:false,  
          			success:function(data)  
          			{  
          				/*alert(data);  */
          				$('#user_form')[0].reset();  
          				load_data();  
          			}  
          		}); 
          	}  
          	else  
          	{  
          		alert("Both Fields are Required");  
          	}  
          }); 
          $(document).on('click', '.update', function(){
          	var id = $(this).attr("id");
          	var action = "Update";
          	$.post("action.php",
          			{id:id, action:action},
          			function(data)
          			{
          				
          				jresult = JSON.parse(data);
          				console.log(jresult);

          				 $("#name").val(jresult.name);
          				 $("#number").val(jresult.number);
          				  $("#id").val(jresult.id);
          				$("#action").val("Edit");
          				$("#button_action").val("Edit");


          			});
          		$('#user_form').on('submit', function(){
          			$("#button_action").val("Insert");
          		});
          });
          $(document).on('click', '.delete', function(){
          	var id = $(this).attr("id");
          	var action = "Delete";
          	if(confirm("Are you sure you want to delete this?"))
          	{
          		$.post("action.php",
          			{id:id, action:action},
          			function(data)
          			{
          				/*alert(data);*/
          				load_data();
          			}
          			);
          	}
          	else
          	{
          		return false;
          	}
          });


      });   