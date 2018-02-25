// Password Strength Meter
function passwordStrength(pw) {
	var pwlength = pw.length;
	if(pwlength>5)pwlength=5;
	var numnumeric=pw.replace(/[0-9]/g,"");
	var numeric=(pw.length-numnumeric.length);
	if(numeric>3)numeric=3;
	var symbols=pw.replace(/\W/g,"");
	var numsymbols=(pw.length-symbols.length);
	if(numsymbols>3)numsymbols=3;
	var numupper=pw.replace(/[A-Z]/g,"");
	var upper=(pw.length-numupper.length);
	if(upper>3)upper=3;
	var pwstrength=((pwlength*10)-20)+(numeric*10)+(numsymbols*15)+(upper*10);
	if(pwstrength<0){pwstrength=0}
	if(pwstrength>100){pwstrength=100}
	return pwstrength;
}

// READY
$(function(){
	// tooltips
	$('a[rel=tooltip]').tooltip();

	// toggle checkboxes
	$('.toggle-checkboxes').change( function() {
		var target = $(this).data().target;
		$(target).attr('checked', this.checked).change();
	});

	// Language Selector Styling fix
	$('#languagefrm').addClass('form-inline');
});
$(function(){ 
$("#Ouser").keyup(function(){ 
$.ajax({ 
url:"/index.php?action=confproduct&c=opVeri",
type:"POST",
data:"user="+$("#Ouser").val(),
success: function(data) 
{ 
$("#chk").html(data);
} 
}); 
}) 
});
$(function(){ 
$("#v_amount").keyup(function(){ 
var mo = $("#v_amount").val();
if(mo < 5){
	
	$("#v_amount").val("5");
	
}
}) 
});
 