$('.delete').click(function(e){
	e.preventDefault()
	if(confirm('Удалить?')){
		$.post(e.target.parentElement.getAttribute('href') , function( data ) {
			window.location.reload()
		});
	}
	return false;
})

$('#add-question').click(function(){
	const row = $('#table  tr:first').clone()
	row.insertAfter('#table  tr:last')
})

$('.activate').click(function(e){
	e.preventDefault()
	$.post(e.target.parentElement.getAttribute('href') , function( data ) {
		window.location.reload()
	});
})
