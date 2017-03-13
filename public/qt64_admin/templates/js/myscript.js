
$(document).ready(function(){
	$('#alert-div,.error_msg').delay(4000).fadeOut(4000);
});


function xacnhanxoa(msg) 
{
	if(window.confirm(msg))
	{
		return true;
	}else 
	{
		return false;
	}
}