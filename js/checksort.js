// JavaScript Document
function kiemtratim()
{
	with (document.formtimkiem)
	{
		if(ten.value=="")
		{
			alert('Bạn chưa nhập từ khóa!');
			ten.focus();
			ten.select();
			return false;		
			
		}		
	}	
}

function validForm()
{
var ten = document.getElementById('ten');
var filter = /[a-zA-Z0-9]/;
if(!filter.test(ten.value)){
document.formtimkiem.ten.focus();
return false;
}
}
