$('#isi').load('content/dashboard.php');
$('.navigasi').click(function(){
	var link=$(this).attr('href')
	$('#isi').hide().load(link).fadeIn('normal');
	return false;
});

function navigasi2(link){
	$('#isi').hide().load(link).fadeIn('normal');	
}


	
