$(document).ready(function(){

	$(".dropdown-button").dropdown();

	if($('#flash-overlay-modal')[0]){
		$('#flash-overlay-modal').openModal();   
	}
	$('.modal-trigger').leanModal();
	$('select').material_select();

});