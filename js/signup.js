$(document).ready(function(){
    // Floating Labels
	//==============================================================
    $('[data-toggle="floatLabel"]').attr('data-value', $(this).val()).on('keyup change', function() {
		$(this).attr('data-value', $(this).val());
	});
});