$(document).ready(function(){

	$('.btn-modal').on( "click", function() {
		var idmod = $(this).attr('idmodal');
		$(idmod).modal('show');
	});
});