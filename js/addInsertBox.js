$('#close').css('visibility','hidden');
$('#open').click(function(){
	$('html body div#box').css('display','block');
	$('#close').css('visibility','visible');
});
$('#close').click(function(){
	$('html body div#box').css('display','none');
	$('#close').css('visibility','hidden');
});

