$(document).ready(function(){
	/*function isString(event){
		var key=event.keyCode;
		if(key>48 && key <57)
		{
			return false;
		}
		return true;
	}*/

	$('#save').click(function(event){
		$.post('insert.php', {firstname:$('#firstname').val(),number:$('#number').val()},
			function(data){
				$('#example').html(data);
			})
	})
});