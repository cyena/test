 $(document).ready(function(){  
      load_data();  
      $('#action').val("Insert");

      function load_data()  
      {  
        var action = "Load";  
        $.post("actionindex.php",  
                {action:action},  
            function(data)  
            {  
              $('#user_table').html(data);  
            }  
        );  
      }  //load the data
    $('#add').click(function(){
        $('#name').removeAttr('disabled');
        $('#number').removeAttr('disabled');
        $('#name').on('keypress keydown keyup',function(){
           if (!$(this).val().match(/^([a-zA-Z]{1,16})$/)) 
           {
              $('#name').val("");
           }
          else{ // else, do not display message
                     $('.emsg').addClass('hidden');
               }
        });
    });//add button function
    $('#user_form').on('submit', function(event){  
         event.preventDefault();  
         var Name = $('#name').val();  
         var pNumber = $('#number').val(); 
         var id = $('#id').val(); 
         if(Name !== '' && pNumber !== '')  
         { 
            $.ajax({  
             url:"actionindex.php",  
             method:"POST",  
             data:new FormData(this),  
             contentType:false,  
             processData:false,  
             success:function(data)  
             {  
                alert(data);  
                $('#user_form')[0].reset();
                  /*$('#name').attr('disabled','disabled');
                  $('#number').attr('disabled','disabled');*/  
                  load_data();  
              }  
              }); 
          }  
          else  
          {  
            alert("Both Fields are Required");  
          }  
    }); //submit data
    $(document).on('click', '.update', function(){
          	/*$('#name').removeAttr('disabled');
            $('#number').removeAttr('disabled');*/
      var id = $(this).data("id");
      var action = "Update";
      $.post("actionindex.php",
       {id:id, action:action},
       function(data)
       {
          jresult = JSON.parse(data);
          $("#name").val(jresult.name);
          $("#number").val(jresult.number);
          $("#id").val(jresult.id);
          $("#action").val("Edit");
          $("#button_action").val("Edit");
        });
    });//update 
    $(document).on('click', '.delete', function(){
       var id = $(this).attr("id");
       var action = "Delete";
       if(confirm("Are you sure you want to delete this?"))
       {
          $.post("actionindex.php",
            {id:id, action:action},
            function(data)
            {
              alert(data);
              load_data();
            }
          );
        }
        else
        {
         return false;
        }
    });//delete
});   